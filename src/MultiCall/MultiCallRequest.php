<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\MultiCall;

use MerchantAPI\Collection;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Http\HttpHeaders;
use MerchantAPI\Client;
use MerchantAPI\Request;
use MerchantAPI\RequestInterface;

/**
 * Class MultiCallRequest. Handles a MultiCallRequest API Call allowing you to send many in one shot.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/multicall
 */
class MultiCallRequest extends Request
{
    /** @var \MerchantAPI\Collection */
    protected $requests = [];

    /** @var bool */
    protected $autoTimeoutContinue = false;

    /** @var MutliCallResponse */
    public $_initialResponse = null;

    /** @var int */
    protected $completed = 0;

    /** @var int */
    protected $total = 0;

    /**
     * Constructor.
     *
     * @param array $requests
     * @throws \InvalidArgumentException
     */
    public function __construct(Client $client = null, array $requests = [])
    {
        parent::__construct($client);

        $this->requests = new Collection();

        foreach ($requests as $request) {
            if ($request instanceof RequestInterface) {
                $this->addRequest($request);
            } else if ($request instanceof MultiCallOperation) {
                $this->addOperation($request);
            }
        }
    }

    /**
     * Add a request to be sent.
     *
     * @param RequestInterface $request
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function addRequest(RequestInterface $request)
    {
        if ($request instanceof MultiCallRequest) {
            foreach ($request->getRequests() as $req) {
                $this->addRequest($req);
            }
        } else {
            $this->requests->insert($request);
        }

        return $this;
    }

    /**
     * Get the requests to be sent.
     *
     * @return \MerchantAPI\Collection
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set and override the requests to be sent.
     *
     * @param array $requests
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setRequests(array $requests)
    {
        $this->requests = new Collection();

        foreach ($requests as $request) {
            $this->addRequest($request);
        }

        return $this;
    }

    /**
     * Create and insert a MultiCallOperation into the request.
     *
     * @param RequestInterface|RequestInterface[]|null $request
     * @param array $sharedData
     * @return MultiCallOperation
     */
    public function operation($request = null, array $sharedData = [])
    {
        $operation = new MultiCallOperation($request, $sharedData);

        $this->addOperation($operation);

        return $operation;
    }

    /**
     * Add a MultiCallOperation into the request.
     *
     * @param MultiCallOperation $operation
     * @return $this
     */
    public function addOperation(MultiCallOperation $operation)
    {
        $this->requests->insert($operation);
        return $this;
    }

    /**
     * @return bool
     */
    public function hasOperations()
    {
        foreach ($this->requests as $request) {
            if ($request instanceof  MultiCallOperation) {
                return true;
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [
            'Operations' => []
        ];

        foreach ($this->getRequests() as $i => $request) {
            if ($request instanceof MultiCallOperation) {
                $data['Operations'][$i] = $request->toArray();
            } else {
                $data['Operations'][$i] = array_replace($request->toArray(), [
                    'Function' => $request->getFunction()
                ]);
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        $response = new MultiCallResponse($this, $httpResponse, $data);

        if ($response->isTimeout() && $this->autoTimeoutContinue) {
            $this->processContinue($response);
        }

        return $response;
    }

    /**
     * Handles processing the auto continue functionality.
     * Retries to get the next data set until completed or error
     */
    protected function processContinue(MultiCallResponse $initialResponse)
    {
        if ($this->_initialResponse)          return;
        if (!$initialResponse)                return;
        if (!$initialResponse->isTimeout())   return;

        $this->_initialResponse = $initialResponse;

        $range = $initialResponse->readRange();

        $this->completed = $range['completed'];
        $this->total = $range['total'];

        if (!$this->total) {
            throw new MultiCallException('Unexpected format', $this, $initialResponse);
        } else if ($this->completed > $this->total) {
            throw new  MultiCallException('Completed exceeds total', $this, $initialResponse);
        } else if ($this->total != count($this->getRequests())) {
            throw new  MultiCallException('Total does not match request count', $this, $initialResponse);
        }

        while ($this->completed != $this->total) {
            $response = $this->send();

            foreach($response->getResponses() as $chunkResponse) {
                $initialResponse->addResponse($chunkResponse);
            }

            $ranges = $response->readRange();

            if ($ranges['completed'] > 0) {
                $this->completed += $ranges['completed'];
            }  else {
                if ($this->total - $this->completed == count($initialResponse->getResponses())) {
                    $this->compelted = $this->total;
                }
                break;
            }
        }

        $initialResponse->timeout = false;
        $this->_initialResponse = null;
    }

    /**
     * @inheritDoc
     */
    public function processRequestHeaders(HttpHeaders $headers)
    {
        if ($this->_initialResponse && $this->_initialResponse->isTimeout())
        {
            $headers->add('RANGE', sprintf('Operations=%d-%d',
                $this->completed+1, $this->total));
        }
    }

    /**
     * Get the auto timeout continue flag.
     */
    public function getAutoTimeoutContinue()
    {
        return $this->autoTimeoutContinue;
    }

    /**
     * Set the auto timeout continue flag. When set, timeouts that are encounted
     * will continue until all data is completed or an error is encounted.
     *
     * @oaram bool
     */
    public function setAutoTimeoutContinue($state)
    {
        $this->autoTimeoutContinue = $state;
        return $this;
    }
}

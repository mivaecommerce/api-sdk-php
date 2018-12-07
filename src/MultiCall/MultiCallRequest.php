<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: MultiCallRequest.php 71879 2018-12-07 01:17:17Z gidriss $
 */

namespace MerchantAPI\MultiCall;

use MerchantAPI\Collection;
use MerchantAPI\Http\HttpResponse;
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

    /**
     * Constructor.
     *
     * @param array $requests
     * @throws \InvalidArgumentException
     */
    public function __construct(array $requests = [])
    {
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
        return new MultiCallResponse($this, $httpResponse, $data);
    }
}
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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\RequestInterface;
use MerchantAPI\Response;
use MerchantAPI\ResponseInterface;

/**
 * Class MultiCallResponse.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/multicall
 */
class MultiCallResponse extends Response
{
    /** @var array[ResponseInterface] */
    protected $responses = [];


    /** @var bool */
    public $timeout = false;

    /**
     * MultiCallResponse constructor.
     *
     * @param MultiCallRequest $request
     * @param HttpResponse $response
     * @param array $data
     * @throws \Exception
     */
    public function __construct(MultiCallRequest $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if ($response->getStatus() == 206) {
            $this->timeout = true;
        }

        $requests = $request->getRequests();
        $requestStartIndex = 0;

        if ($request->_initialResponse)
        {
            $requestStartIndex = count($request->_initialResponse->getResponses());
        }

        foreach($this->data as $index => $rdata) {
            $requestIndex = $requestStartIndex + $index;

            if (!isset($requests[$requestIndex])) {
                throw new MultiCallException('Unable to match response data chunk to request object', $request, $this);
            }

            $crequest = $requests[$requestIndex];

            if ($crequest instanceof MultiCallOperation) {
                foreach($crequest->getRequests() as $opindex => $oprequest) {
                    $this->addResponse($oprequest->createResponse($response, $rdata[$opindex]));
                }
            } else {
                $this->addResponse($crequest->createResponse($response, $rdata));
            }
        }
    }

    /**
     * Read the header range into its parts
     *
     * @param $range
     * @return array
     */
    public function readRange()
    {
        $range = $this->getHttpResponse()->getHeaders()->get('Content-Range');

        $result  = [ 'completed' => 0, 'total' => 0 ];

        $ranges = explode('/', $range);

        if (count($ranges) == 2) {
            $result['completed'] = (int)$ranges[0];
            $result['total']     = (int)$ranges[1];
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function isSuccess()
    {
        return !isset($this->data['success']);
    }

    /**
     * Check if the request timed out
     */
    public function isTimeout()
    {
        return $this->timeout;
    }

    /**
     * Get the responses.
     *
     * @return array[ResponseInterface]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add a response.
     *
     * @param ResponseInterface $response
     * @return $this
     */
    public function addResponse(ResponseInterface $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Set and overwrite the responses.
     *
     * @param array[ResponseInterface]
     * @return $this
     */
    public function setResponses(array $responses)
    {
        foreach ($responses as $response) {
            if (!$response instanceof ResponseInterface) {
                throw new \InvalidArgumentException('Expected an array of ResponseInterface but got %s',
                    is_object($response) ? get_class($response) : gettype($response));
            }
        }

        $this->responses = array_values($responses); // align keys

        return $this;
    }
}

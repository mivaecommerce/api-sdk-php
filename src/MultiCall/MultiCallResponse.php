<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: MultiCallResponse.php 71878 2018-12-07 01:04:23Z gidriss $
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

        foreach ($request->getRequests() as $i => $request) {
            if (!isset($data[$i])) {
                throw new \Exception(sprintf('Unexpected Response. Expected response for request %d',
                    $i+1));
            }

            if ($request instanceof MultiCallOperation) {
                foreach ($request->getRequests() as $i2 => $iterationRequest) {
                    if (!isset($data[$i][$i2])) {
                        throw new \Exception(sprintf('Unexpected Response. Expected response for request %d iteration %d',
                            $i+1, $i2+1));
                    }

                    $this->addResponse($iterationRequest->createResponse($response, $data[$i][$i2]));
                }
            } else {
                $this->addResponse($request->createResponse($response, $data[$i]));
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function isSuccess()
    {
        return !isset($this->data['success']);
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
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

/**
 * Class MultiCallException
 */
class MultiCallException extends \Exception
{
    /** @var MultiCallRequest */
	protected MultiCallRequest $request;

	/** @var MultiCallResponse */
	protected MultiCallResponse $response;

    /**
     * MultiCallException constructor.
     * @param string $message
     * @param MultiCallRequest $request
     * @param MultiCallResponse $response
     */
	public function __construct(string $message, MultiCallRequest $request, MultiCallResponse $response)
	{
		parent::__construct($message);

		$this->request = $request;
		$this->response = $response;
	}

    /**
     * @return MultiCallRequest
     */
	public function getRequest() : MultiCallRequest
	{
		return $this->request;
	}

    /**
     * @return MultiCallResponse
     */
	public function getResponse() : MultiCallResponse
	{
		return $this->response;
	}
}
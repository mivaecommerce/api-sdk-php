<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Logger;

use MerchantAPI\RequestInterface;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Http\HttpHeaders;

/**
 * @package MerchantAPI\Logger
 */
abstract class Logger
{
	/**
	 * logRequest
	 *
	 * @param RequestInterface $request
	 * @param HttpHeaders $headers
	 * @param array $data
	 */
	public function logRequest(RequestInterface $request, HttpHeaders $headers, array $data) : void
	{
		if ($headers->count()) {
			$this->writeLine(sprintf("\r\n============= Request: %s [HEADERS] =============\r\n", $request->getFunction()));

			foreach($headers->all() as $key => $value) {
				$this->writeLine(sprintf("%s = %s", $key, $value));
			}
		}

		$this->writeLine(sprintf("\r\n============= Request: %s [BODY] =============\r\n", $request->getFunction()));
		$this->writeLine(json_encode($data));
	}

	/**
	 * logResponse
	 *
	 * @param ResponseInterface $response
	 */
	public function logResponse(ResponseInterface $response) : void
	{
		if ($response->getHttpResponse()->getHeaders()->count()) {
			$this->writeLine(sprintf("\r\n============= Response: %s [HEADERS] =============\r\n", $response->getRequest()->getFunction()));

			foreach($response->getHttpResponse()->getHeaders()->all() as $key => $value) {
				$this->writeLine(sprintf("%s = %s", $key, $value));
			}
		}

		$this->writeLine(sprintf("\r\n============= Response: %s [BODY] =============\r\n", $response->getRequest()->getFunction()));
		$this->writeLine($response->getHttpResponse()->getContent());
	}

	/**
	 * Writes the data to the log
	 *
	 * @param string $data
	 */
	abstract public function write(string $data) : void;

	/**
	 * Writes the data to the log, terminated by EOL
	 *
     * @param string $data
	 */
	abstract public function writeLine(string $data) : void;
}
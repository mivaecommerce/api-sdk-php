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

use MerchantAPI\Request;
use MerchantAPI\Response;
use MerchantAPI\Http\HttpHeaders;

/**
 * @package MerchantAPI\Logger
 */
abstract class Logger
{
	/**
	 * logRequest
	 *
	 * @param Request
	 * @param HttpHeaders
	 * @param array
	 */
	public function logRequest(Request $request, HttpHeaders $headers, array $data)
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
	 * @param Response
	 */
	public function logResponse(Response $response)
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
	 * @param Response
	 */
	abstract public function write($data);

	/**
	 * Writes the data to the log, terminated by EOL
	 *
	 * @param Response
	 */
	abstract public function writeLine($data);
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI;

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Http\HttpHeaders;
use MerchantAPI\Client;

/**
 * All Request objects must implement this interface.
 *
 * @package MerchantAPI
 */
interface RequestInterface
{
    /** @var string REQUEST_SCOPE_STORE */
    const REQUEST_SCOPE_STORE   = 'store';

    /** @var string REQUEST_SCOPE_DOMAIN */
    const REQUEST_SCOPE_DOMAIN  = 'domain';

    /** @var string BINARY_ENCODING_DEFAULT */
    const BINARY_ENCODING_DEFAULT   = 'json';

    /** @var string BINARY_ENCODING_BASE64 */
    const BINARY_ENCODING_BASE64  = 'base64';

    /**
     * Returns the API function name to be executed.
     *
     * @return string
     */
    public function getFunction();

    /**
     * Get the request level store code, if set.
     *
     * @return mixed
     */
    public function getStoreCode();

    /**
     * Get the scope of the request. Returns a RequestInterface::REQUEST_SCOPE_* constant.
     *
     * @return string
     */
    public function getScope();

    /**
     * Override client level store code from the request. Only applies to store scoped requests.
     *
     * @param string
     * @return ResponseInterface
     */
    public function setStoreCode($storeCode);

    /**
     * Get the client used to send the request
     *
     * @param string
     * @return ResponseInterface
     */
    public function getClient();

    /**
     * Send the request using the assigned client.
     *
     * @param string
     * @return ResponseInterface
     */
    public function send();

    /**
     * Set the Client to use to send the request.
     *
     * @param string
     * @return ResponseInterface
     */
    public function setClient(Client $client);

    /**
     * Returns the data for the request as an array.
     *
     * @return array
     */
    public function toArray();

    /**
     * Create a response object from the http response.
     *
     * @param \MerchantAPI\Http\HttpResponse
     * @param array
     * @return ResponseInterface
     */
    public function createResponse(HttpResponse $httpResponse, array $data);

    /**
     * Allows manipulation of the HTTP Request Headers
     *
     * @param HttpHeaders $headers
     */
    public function processRequestHeaders(HttpHeaders $headers);

    /**
     * Get the binary encoding method
     *
     * @return HttpHeaders $headers
     */
    public function getBinaryEncoding();


    /**
     * Set the binary encoding method
     *
     * @param string $encoding
     * @return ResponseInterface
     */
    public function setBinaryEncoding($encoding);
}
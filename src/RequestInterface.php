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
interface RequestInterface extends \JsonSerializable
{
    /** @var string REQUEST_SCOPE_STORE */
    const REQUEST_SCOPE_STORE   = 'store';

    /** @var string REQUEST_SCOPE_DOMAIN */
    const REQUEST_SCOPE_DOMAIN  = 'domain';

    /** @var string REQUEST_SCOPE_DOMAIN_OPTIONAL_STORE */
    const REQUEST_SCOPE_DOMAIN_OPTIONAL_STORE  = 'domain_optional_store';

    /** @var string BINARY_ENCODING_DEFAULT */
    const BINARY_ENCODING_DEFAULT   = 'json';

    /** @var string BINARY_ENCODING_BASE64 */
    const BINARY_ENCODING_BASE64  = 'base64';

    /**
     * Returns the API function name to be executed.
     *
     * @return string
     */
    public function getFunction() : string;

    /**
     * Get the request level store code, if set.
     *
     * @return ?string
     */
    public function getStoreCode() : ?string;

    /**
     * Get the scope of the request. Returns a RequestInterface::REQUEST_SCOPE_* constant.
     *
     * @return string
     */
    public function getScope() : string;

    /**
     * Override client level store code from the request. Only applies to store scoped requests.
     *
     * @param string $storeCode
     * @return $this
     */
    public function setStoreCode(string $storeCode) : self;

    /**
     * Get the client used to send the request
     *
     * @return ?BaseClient
     */
    public function getClient() : ?BaseClient;

    /**
     * Send the request using the assigned client.
     *
     * @return ResponseInterface
     */
    public function send() : ResponseInterface;

    /**
     * Set the Client to use to send the request.
     *
     * @param ?BaseClient $client
     * @return $this
     */
    public function setClient(?BaseClient $client) : self;

    /**
     * Returns the data for the request as an array.
     *
     * @return array
     */
    public function toArray() : array;

    /**
     * Create a response object from the http response.
     *
     * @param \MerchantAPI\Http\HttpResponse $httpResponse
     * @param array $data
     * @return ResponseInterface
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface;

    /**
     * Allows manipulation of the HTTP Request Headers
     *
     * @param HttpHeaders $headers
     */
    public function processRequestHeaders(HttpHeaders $headers) : void;

    /**
     * Get the binary encoding method
     *
     * @return ?string
     */
    public function getBinaryEncoding() : ?string;


    /**
     * Set the binary encoding method
     *
     * @param ?string $encoding
     * @return RequestInterface
     */
    public function setBinaryEncoding(?string $binaryEncoding) : self;
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: RequestInterface.php 72460 2019-01-08 21:12:08Z gidriss $
 */

namespace MerchantAPI;

use MerchantAPI\Http\HttpResponse;

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
}
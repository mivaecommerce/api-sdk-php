<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: RequestInterface.php 71080 2018-10-15 20:36:21Z gidriss $
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
    /**
     * Returns the API function name to be executed.
     *
     * @return string
     */
    public function getFunction();

    /**
     * Override client level store code from the request.
     *
     * @return mixed
     */
    public function getStoreCode();

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
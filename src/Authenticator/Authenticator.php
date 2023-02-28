<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Authenticator;


/**
 * Interface for Authenticator objects used to authenticate requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
interface Authenticator
{
    /**
     * @param string $data
     * @return string
     */
	public function generateAuthenticationHeader(string $data) : string;

    /**
     * @param string $data
     * @return string
     */
	public function signData(string $data) : string;
}
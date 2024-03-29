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

/**
 * Class ClientException.
 *
 * @package MerchantAPI
 */
class ClientException extends \Exception
{
    protected ?HttpResponse $httpResponse = null;

    /**
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     * @param HttpResponse|null $httpResponse
     */
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null, ?HttpResponse $httpResponse = null)
    {
        parent::__construct($message, $code, $previous);
        $this->httpResponse = $httpResponse;
    }

    /**
     * @return ?HttpResponse
     */
    public function getHttpResponse() : ?HttpResponse
    {
        return $this->httpResponse;
    }
}
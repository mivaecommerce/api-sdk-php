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
 * All Response objects must implement this interface.
 *
 * @package MerchantAPI
 */
interface ResponseInterface
{
    /**
     * Check is the response was a success.
     *
     * @return bool
     */
    public function isSuccess() : bool;

    /**
     * Check is the response was a error.
     *
     * @return bool
     */
    public function isError() : bool;

    /**
     * Get the error message.
     *
     * @return ?string
     */
    public function getErrorMessage() : ?string;

    /**
     * Get the error code.
     *
     * @return ?string
     */
    public function getErrorCode() : ?string;

    /**
     * Get the number of input errors.
     *
     * @return int
     */
    public function getInputErrorCount() : int;

    /**
     * Get the fields which encountered a validation error.
     *
     * @return ?array
     */
    public function getErrorFields() : ?array;

    /**
     * Get the field which triggered the error.
     *
     * @return ?string
     */
    public function getErrorField() : ?string;

    /**
     * Get the error message associated with the error field that cause the error.
     *
     * @return ?string
     */
    public function getErrorFieldMessage() : ?string;

    /**
     * Check if the error response is a list error.
     *
     * @return bool
     */
    public function isListError() : bool;

    /**
     * Check if the error response is a validation error.
     *
     * @return bool
     */
    public function isValidationError() : bool;

    /**
     * Check if the error response is an input error.
     *
     * @return bool
     */
    public function isInputError() : bool;

    /**
     * Get the error messages associated with the response.
     *
     * @return ?array
     */
    public function getErrors() : ?array;

    /**
     * Get the underlying JSON response data as an array.
     *
     * @return array
     */
    public function getData() : array;

    /**
     * Get the initiating Request object.
     *
     * @return RequestInterface
     */
    public function getRequest() : RequestInterface;

    /**
     * Get the underlying Http Response object.
     *
     * @return \MerchantAPI\Http\HttpResponse
     */
    public function getHttpResponse() : HttpResponse;
}
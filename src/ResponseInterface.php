<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: ResponseInterface.php 71080 2018-10-15 20:36:21Z gidriss $
 */

namespace MerchantAPI;

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
    public function isSuccess();

    /**
     * Check is the response was a error.
     *
     * @return bool
     */
    public function isError();

    /**
     * Get the error message.
     *
     * @return string|null
     */
    public function getErrorMessage();

    /**
     * Get the error code.
     *
     * @return string|null
     */
    public function getErrorCode();

    /**
     * Get the number of input errors.
     *
     * @return int
     */
    public function getInputErrorCount();

    /**
     * Get the fields which encountered a validation error.
     *
     * @return array
     */
    public function getErrorFields();

    /**
     * Get the field which triggered the error.
     *
     * @return string|null
     */
    public function getErrorField();

    /**
     * Get the error message associated with the error field that cause the error.
     *
     * @return string|null
     */
    public function getErrorFieldMessage();

    /**
     * Check if the error response is a list error.
     *
     * @return bool
     */
    public function isListError();

    /**
     * Check if the error response is a validation error.
     *
     * @return bool
     */
    public function isValidationError();

    /**
     * Check if the error response is a input error.
     *
     * @return bool
     */
    public function isInputError();

    /**
     * Get the error messages associated with the response.
     *
     * @return array
     */
    public function getErrors();

    /**
     * Get the underlying JSON response data as an array.
     *
     * @return array
     */
    public function getData();

    /**
     * Get the initiating Request object.
     *
     * @return RequestInterface
     */
    public function getRequest();

    /**
     * Get the underlying Http Response object.
     *
     * @return \MerchantAPI\Http\HttpResponse
     */
    public function getHttpResponse();
}
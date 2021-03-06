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
 * Abstract class all Response objects inherit from.
 *
 * @package MerchantAPI
 */
abstract class Response implements ResponseInterface
{
    /** @var RequestInterface */
    protected $request;

    /** @var HttpResponse  */
    protected $httpResponse;

    /** @var array  */
    protected $data = [];

    /**
     * Response constructor.
     *
     * @param RequestInterface $request
     * @param HttpResponse $response
     * @param array $data
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        $this->request      = $request;
        $this->httpResponse = $response;
        $this->data         = $data;
    }

    /**
     * @inheritDoc
     */
    public function isSuccess()
    {
        return isset($this->data['success']) && $this->data['success'] == true;
    }

    /**
     * @inheritDoc
     */
    public function isError()
    {
        return isset($this->data['success']) && $this->data['success'] == false;
    }

    /**
     * @inheritDoc
     */
    public function getErrorMessage()
    {
        return isset($this->data['error_message']) ?
            $this->data['error_message'] : null;
    }

    /**
     * @inheritDoc
     */
    public function getErrorCode()
    {
        return isset($this->data['error_code']) ?
            $this->data['error_code'] : null;
    }

    /**
     * @inheritDoc
     */
    public function getInputErrorCount()
    {
        return isset($this->data['input_errors']) ?
            $this->data['input_errors'] : 0;
    }

    /**
     * @inheritDoc
     */
    public function getErrorFields()
    {
        return isset($this->data['error_fields']) ?
            $this->data['error_fields'] : [];
    }

    /**
     * @inheritDoc
     */
    public function getErrorField()
    {
        return isset($this->data['error_field']) ?
            $this->data['error_field'] : null;
    }

    /**
     * @inheritDoc
     */
    public function getErrorFieldMessage()
    {
        return isset($this->data['error_field_message']) ?
            $this->data['error_field_message'] : null;
    }

    /**
     * @inheritDoc
     */
    public function isListError()
    {
        return isset($this->data['list_error']) ?
            $this->data['list_error'] : false;
    }

    /**
     * @inheritDoc
     */
    public function isValidationError()
    {
        return isset($this->data['validation_error']) ?
            $this->data['validation_error'] : false;
    }

    /**
     * @inheritDoc
     */
    public function isInputError()
    {
        return isset($this->data['input_errors']) ?
            $this->data['input_errors'] : false;
    }

    /**
     * @inheritDoc
     */
    public function getErrors()
    {
        return isset($this->data['errors']) ?
            $this->data['errors'] : [];
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @inheritDoc
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }
}
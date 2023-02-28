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
    protected RequestInterface $request;

    /** @var HttpResponse  */
    protected HttpResponse $httpResponse;

    /** @var array  */
    protected array $data = [];

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
    public function isSuccess() : bool
    {
        return isset($this->data['success']) && $this->data['success'] == true;
    }

    /**
     * @inheritDoc
     */
    public function isError() : bool
    {
        return isset($this->data['success']) && $this->data['success'] == false;
    }

    /**
     * @inheritDoc
     */
    public function getErrorMessage() : ?string
    {
        return $this->data['error_message'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getErrorCode() : ?string
    {
        return $this->data['error_code'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getInputErrorCount() : int
    {
        return $this->data['input_errors'] ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getErrorFields() : ?array
    {
        return $this->data['error_fields'] ?? [];
    }

    /**
     * @inheritDoc
     */
    public function getErrorField() : ?string
    {
        return $this->data['error_field'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getErrorFieldMessage() : ?string
    {
        return $this->data['error_field_message'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function isListError() : bool
    {
        return $this->data['list_error'] ?? false;
    }

    /**
     * @inheritDoc
     */
    public function isValidationError() : bool
    {
        return $this->data['validation_error'] ?? false;
    }

    /**
     * @inheritDoc
     */
    public function isInputError() : bool
    {
        return $this->data['input_errors'] ?? false;
    }

    /**
     * @inheritDoc
     */
    public function getErrors() : ?array
    {
        return $this->data['errors'] ?? [];
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function getRequest() : RequestInterface
    {
        return $this->request;
    }

    /**
     * @inheritDoc
     */
    public function getHttpResponse() : HttpResponse
    {
        return $this->httpResponse;
    }
}
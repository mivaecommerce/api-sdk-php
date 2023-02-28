<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Module.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/module
 */
class Module extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Module';

    /** @var ?string */
    protected ?string $moduleCode = null;

    /** @var ?string */
    protected ?string $moduleFunction = null;

    /** @var array */
    protected array $moduleFields = [];

    /**
     * Get Module_Code.
     *
     * @return string
     */
    public function getModuleCode() : ?string
    {
        return $this->moduleCode;
    }

    /**
     * Get Module_Function.
     *
     * @return string
     */
    public function getModuleFunction() : ?string
    {
        return $this->moduleFunction;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields() : ?array
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     *
     * @param string
     * @param mixed
     */
    public function getModuleField(string $field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
    }

    /**
     * Set Module_Code.
     *
     * @param ?string $moduleCode
     * @return $this
     */
    public function setModuleCode(?string $moduleCode) : self
    {
        $this->moduleCode = $moduleCode;

        return $this;
    }

    /**
     * Set Module_Function.
     *
     * @param ?string $moduleFunction
     * @return $this
     */
    public function setModuleFunction(?string $moduleFunction) : self
    {
        $this->moduleFunction = $moduleFunction;

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array $moduleFields
     * @return $this
     */
    public function setModuleFields(array $moduleFields) : self
    {
        $this->moduleFields = $moduleFields;

        return $this;
    }

    /**
     * Add custom data to the request.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setModuleField(string $field, $value) : self
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = array_merge(parent::toArray(), $this->getModuleFields());

        $data['Module_Code'] = $this->getModuleCode();

        $data['Module_Function'] = $this->getModuleFunction();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\Module($this, $httpResponse, $data);
    }
}
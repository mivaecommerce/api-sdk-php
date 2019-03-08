<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Module';

    /** @var string */
    protected $moduleCode;

    /** @var string */
    protected $moduleFunction;

    /** @var array */
    protected $moduleFields = [];

    /**
     * Get Module_Code.
     *
     * @return string
     */
    public function getModuleCode()
    {
        return $this->moduleCode;
    }

    /**
     * Get Module_Function.
     *
     * @return string
     */
    public function getModuleFunction()
    {
        return $this->moduleFunction;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields()
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     * 
     * @param string
     * @param mixed
     */
    public function getModuleField($field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
    }

    /**
     * Set Module_Code.
     *
     * @param string
     * @return $this
     */
    public function setModuleCode($moduleCode)
    {
        $this->moduleCode = $moduleCode;

        return $this;
    }

    /**
     * Set Module_Function.
     *
     * @param string
     * @return $this
     */
    public function setModuleFunction($moduleFunction)
    {
        $this->moduleFunction = $moduleFunction;

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array
     * @return $this
     */
    public function setModuleFields(array $moduleFields)
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
    public function setModuleField($field, $value)
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = array_merge(parent::toArray(), $this->getModuleFields());

        $data['Module_Code'] = $this->getModuleCode();

        $data['Module_Function'] = $this->getModuleFunction();

        $data = array_merge($this->getModuleFields(), $data);

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\Module($this, $httpResponse, $data);
    }
}
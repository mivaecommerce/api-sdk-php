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
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/module
 */
class Module extends Request
{
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
     * Set a module field in its field array.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setModuleField($key, $value)
    {
        $this->moduleFields[$key] = $value;
        return $this;
    }

    /**
     * Get a module field from its field array.
     *
     * @param string
     * @param mixed
     * @return mixed
     */
    public function getModuleField($key, $defaultValue = null)
    {
        return isset($this->moduleFields[$key]) ?
            $this->moduleFields[$key] : $defaultValue;
    }

    /**
     * Get the module field array.
     *
     * @return array
     */
    public function getModuleFields()
    {
        return $this->moduleFields;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        $data['Module_Code'] = $this->getModuleCode();

        $data['Module_Function'] = $this->getModuleFunction();

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

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
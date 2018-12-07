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

namespace MerchantAPI\Model;

/**
 * Data model for CustomFieldValues.
 *
 * @package MerchantAPI\Model
 */
class CustomFieldValues extends \MerchantAPI\Model
{
    /**
     * Get all values for all modules.
     *
     * @return array
     */
    public function getValues()
    {
        return $this->data;
    }

    /**
     * Get a value for a module by its code.
     *
     * @param string
     * @param string
     * @return string
     */
    public function getValue($code, $module = 'customfields')
    {
        return $this->hasValue($code, $module) ?
            $this->data[$module][$code] : null;
    }

    /**
     * Check if a value for code and module exists.
     *
     * @param string
     * @param string
     * @return bool
     */
    public function hasValue($code, $module = 'customfields')
    {
        return isset($this->data[$module][$code]);
    }

    /**
     * Check if a specific module is defined.
     *
     * @param string
     * @return bool
     */
    public function hasModule($module)
    {
        return isset($this->data[$module]);
    }

    /**
     * Get a specific modules custom field values.
     *
     * @param string
     * @return array
     */
    public function getModule($module)
    {
        return $this->hasModule($module) ? $this->data[$module] : [];
    }

    /**
     * Set custom field values.
     *
     * @param array
     * @return $this
     */
    public function setValues(array $values)
    {
        $this->data = $values;
        return $this;
    }

    
    /**
     * Add a custom field value.
     *
     * @param string
     * @param mixed
     * @param string
     * @return $this
     */
    public function addValue($field, $value, $module = 'customfields')
    {
        $this->data[$module][$field] = $value;
        return $this;
    }
}
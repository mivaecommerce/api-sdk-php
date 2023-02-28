<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
    public function getValues() : ?array
    {
        return $this->data;
    }

    /**
     * Get a value for a module by its code.
     *
     * @param string $code
     * @param string $module
     * @return mixed
     */
    public function getValue(string $code, string $module = 'customfields')
    {
        return $this->hasValue($code, $module) ?
            $this->data[$module][$code] : null;
    }

    /**
     * Check if a value for code and module exists.
     *
     * @param string $code
     * @param string $module
     * @return bool
     */
    public function hasValue(string $code, string $module = 'customfields') : bool
    {
        return isset($this->data[$module][$code]);
    }

    /**
     * Check if a specific module is defined.
     *
     * @param string
     * @return bool
     */
    public function hasModule(string $module) : bool
    {
        return isset($this->data[$module]);
    }

    /**
     * Get a specific modules custom field values.
     *
     * @param string $module
     * @return array
     */
    public function getModule(string $module) : array
    {
        return $this->hasModule($module) ? $this->data[$module] : [];
    }

    /**
     * Set custom field values.
     *
     * @param array $values
     * @return $this
     */
    public function setValues(array $values) : self
    {
        $this->data = $values;
        return $this;
    }

    /**
     * Add a custom field value.
     *
     * @param string $field
     * @param mixed $value
     * @param string $module
     * @return $this
     */
    public function addValue(string $field, $value, string $module = 'customfields') : self
    {
        $this->data[$module][$field] = $value;
        return $this;
    }
}
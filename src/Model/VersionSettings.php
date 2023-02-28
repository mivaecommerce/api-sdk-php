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
 * Data model for VersionSettings.
 *
 * @package MerchantAPI\Model
 */
class VersionSettings extends \MerchantAPI\Model
{
    /**
     * Constructor
     *
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Check if the underlying data is an object
     *
     * @return bool
     */
    public function isObject() : bool
    {
        return is_array($this->data) && !isset($this->data[0]);
    }

    /**
     * Check if the underlying data is an array
     *
     * @return bool
     */
    public function isArray() : bool
    {
        return is_array($this->data) && isset($this->data[0]);
    }

    /**
     * Check if the underlying data is a scalar value
     *
     * @return bool
     */
    public function isScalar() : bool
    {
        return !$this->isArray() && !$this->isObject();
    }

    /**
     * Get a defined item, if it exists
     *
     * @param string
     * @return array|null
     */
    public function getItem(string $name)
    {
        if ($this->hasItem($name)) {
            return $this->data[$name];
        }

        return null;
    }

    /**
     * Get a defined item, if it exists
     *
     * @param string
     * @return bool
     */
    public function hasItem(string $item) : bool
    {
        return $this->isObject() && isset($this->data[$item]);
    }

    /**
     * Get a defined property from an item if it exists
     *
     * @param string
     * @param string
     * @return array|null
     */
    public function getItemProperty(string $item, string $property) : ?array
    {
        if ($this->hasItemProperty($item, $property)) {
            return $this->data[$item][$property];
        }

        return null;
    }

    /**
     * Check if an item property is defined
     *
     * @param string
     * @param string
     * @return bool
     */
    public function hasItemProperty(string $item, string $property) : bool
    {
        return $this->hasItem($item) && isset($this->data[$item][$property]);
    }

    /**
     * Set an item value
     *
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setItem(string $name, $value) : self
    {
        if (is_null($this->data)) {
            $this->data = [
                $name => []
            ];
        } else if($this->hasItem($name)) {
            $this->data[$name] = $value;
        }

        return $this;
    }

    /**
     * Set an item's property value
     *
     * @param string $item
     * @param string $property
     * @param mixed $value
     * @return $this
     */
    public function setItemProperty(string $item, string $property, $value) : self
    {
        if (is_null($this->data)) {
            $this->data = [
                $item => [
                    $property => $value
                ]
            ];
        } else if($this->hasItem($item)) {
            $this->data[$item][$property] = $value;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        return $this->data;
    }
}
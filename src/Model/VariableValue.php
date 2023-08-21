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
 * Data model for value which can be various types.
 *
 * @package MerchantAPI\Model
 */
class VariableValue implements \ArrayAccess
{
    /** @var mixed $data */
    protected $data;

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
        return is_array($this->data) && count($this->data) && !isset($this->data[0]);
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
        return !is_array($this->data);
    }

    /**
     * Get the underlying data
     * 
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the underlying data
     * 
     * @param mixed $data
     * @return self
     */
    public function setData($data) : self
    {
        $this->data = $data;
        return $this;
    }
    
    /**
     * Check if an offset exists in the container.
     *
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) : bool
    {
        if (!$this->isScalar()) {
            return !is_null($offset) && isset($this->data[$offset]);
        }

        return false;
    }

    /**
     * Get the value in the container at specified offset.
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!$this->isScalar()) {
            if (!is_null($offset) && isset($this->data[$offset])) {
                return $this->data[$offset];
            }
        }

        return null;
    }

    /**
     * Set the value in the container at specified. offset.
     *
     * @param mixed $offset
     * @param mixed $value
     * @return $this
     */
    public function offsetSet($offset, $value) : self
    {
        if (!$this->isScalar()) {
            if (is_null($offset)) {
                $this->data[] = $value;
            } else {
                $this->data[$offset] = $value;
            }
        }

        return $this;
    }

    /**
     * Unset container at offset.
     *
     * @param mixed $offset
     * @return $this
     */
    public function offsetUnset($offset) : self
    {
        if (!$this->isScalar()) {
            unset($this->data[$offset]);
        }

        return $this;
    }
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: RequestBuilder.php 72462 2019-01-08 21:18:27Z gidriss $
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\AvailabilityGroup;

/**
 * This class is a utility to create custom requests.
 * 
 * @package MerchantAPI\Request
 */
class RequestBuilder extends Request implements \ArrayAccess
{
    /** @var string */
    protected $function;

    /** @var array */
    protected $data = [];

    /**
     * Constructor.
     * 
     * @param string
     * @param array
     * @return RequestBuilder
     */ 
    public function __construct($function, array $data = [])
    {
        if (!is_string($function)) {
            throw new \InvalidArgumentException(sprintf('Expected a string but got %s', gettype($function)));
        }

        $this->function = $function;
        $this->data     = $data;
    }

    /**
     * Set the API function name.
     * 
     * @return RequestBuilder
     */ 
    public function setFunction($function)
    {
        $this->function = $function;
        return $this;
    }

    /**
     * Set a field int the request.
     * 
     * @param string
     * @param mixed
     * @return RequestBuilder
     */
    public function set($field, $value)
    {
        $fieldLower = strtolower($field);
        
        if ($fieldLower == 'function') {
            return $this->setFunction($value);
        } else if ($fieldLower == 'store_code') {
            return $this->setStoreCode($value);
        }

        $this->data[$field] = $value;
        return $this;
    }

    /**
     * Get a defined field from the request, or provided default.
     * 
     * @param string
     * @param mixed
     * @return mixed
     */
    public function get($field, $defaultValue = null)
    {
        $fieldLower = strtolower($field);

        if ($fieldLower == 'function') {
            return $this->getFunction();
        } else if ($fieldLower == 'store_code') {
            return $this->getStoreCode();
        }

        if (isset($this->data[$field])) {
            return $this->data[$field];
        }

        return $defaultValue;
    }

    /**
     * Check if a field is defined in the request.
     * 
     * @param string
     * @return bool
     */
    public function has($field)
    {
        if (in_array(strtolower($field), ['function', 'store_code'])) {
            return true;
        }

        if (isset($this->data[$field])) {
            return $this->data[$field];
        }

        return $defaultValue;
    }

    /**
     * Remove a defined field from the request.
     * 
     * @param string
     * @return RequestBuilder
     */
    public function remove($field)
    {
        $fieldLower = strtolower($field);
        
        if ($fieldLower == 'function') {
            return $this;
        } else if ($fieldLower == 'store_code') {
            return $this->setStoreCode(null);
        }

        unset($this->data[$field]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value) {
        if (is_string($offset)) {
            $fieldLower = strtolower($offset);
            
            if ($fieldLower == 'function') {
                $this->setFunction($value);
                return;
            } else if ($fieldLower == 'store_code') {
                $this->setStoreCode($value);
                return;
            }
        } 

        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset) {
        if (is_string($offset) && in_array(strtolower($offset), ['function', 'store_code'])) {
            return true;
        }

        return isset($this->data[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset) {
        if (is_string($offset)) {
            $fieldLower = strtolower($offset);

            if ($fieldLower == 'function') {
                return;
            } else if ($fieldLower == 'store_code') {
                $this->setStoreCode(null);
                return;
            }
        } 
        unset($this->data[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset) {
        if (is_string($offset)) {
            $fieldLower = strtolower($offset);

            if ($fieldLower == 'function') {
                return $this->getFunction();
            } else if ($fieldLower == 'store_code') {
                return $this->getStoreCode();
            }
        } 

        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * Set the scope of the request. 
     * 
     * @param string Either store, or domain. Use RequestInterface::REQUEST_SCOPE_* constants.
     * @return RequestBuilder
     * @throws \InvalidArgumentException
     */ 
    public function setScope($scope)
    {
        $scope = strtolower($scope);

        if (!in_array($scope, [self::REQUEST_SCOPE_STORE, self::REQUEST_SCOPE_DOMAIN])) {
            throw new \InvalidArgumentException('Invalid Request Scope. Expecting store or domain');
        }

        $this->scope = $scope;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), $this->data);
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\RequestBuilder($this, $httpResponse, $data);
    }
}
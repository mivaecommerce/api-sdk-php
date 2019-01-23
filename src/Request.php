<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: Request.php 72460 2019-01-08 21:12:08Z gidriss $
 */

namespace MerchantAPI;

/**
 * Abstract class all Requests inherit from.
 *
 * @package MerchantAPI
 */
abstract class Request implements RequestInterface
{
    /** @var null|string */
    protected $storeCode = null;

    /** @var string */
    protected $scope = RequestInterface::REQUEST_SCOPE_STORE;

    /**
     * @inheritDoc
     */
    public function getFunction()
    {
        if (isset($this->function)) {
            return $this->function;
        }

        $parts = explode('\\', get_class($this));
        return end($parts);
    }

    /**
     * @inheritDoc
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @inheritDoc
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * @inheritDoc
     */
    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if ($this->getScope() == static::REQUEST_SCOPE_STORE) {
            if (!is_null($this->getStoreCode())) {
                $data['Store_Code'] = $this->getStoreCode();
            }
        }

        return $data;
    }
}
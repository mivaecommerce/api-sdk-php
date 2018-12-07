<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: Model.php 71770 2018-12-04 01:26:17Z gidriss $
 */

namespace MerchantAPI;

/**
 * Abstract class all data models inherit from.
 *
 * @package MerchantAPI
 */
abstract class Model implements ModelInterface
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Constructor.
     * 
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->setField($key, $value);
        }
    }

    /**
     * @inheritDoc
     */
    public function setField($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getField($key, $defaultValue = null)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return $defaultValue;
    }

    /**
     * @inheritDoc
     */
    public function hasField($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @inheritDoc
     */
    public function removeField($key)
    {
        unset($this->data[$key]);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $ret = $this->data;

        foreach ($ret as $key => $value) {
            if ($value instanceof Collection) {
                if (!$value->count()) {
                    unset($ret[$key]);
                } else {
                    $ret[$key] = $value->toArray();

                    foreach ($ret[$key] as $ckey => $cvalue) {
                        if ($cvalue instanceof ModelInterface) {
                            $ret[$key][$ckey] = $cvalue->getData();
                        }
                    }
                }
            } else if ($value instanceof ModelInterface) {
                $ret[$key] = $value->getData();
            }
        }

        return $ret;
    }

    /**
     * @inheritDoc
     */
    public function hasData()
    {
        return $this->data ? true : false;
    }
}
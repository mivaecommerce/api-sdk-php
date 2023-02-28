<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
    protected array $data = [];

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
    public function setField(string $key, $value) : self
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getField(string $key, $defaultValue = null)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return $defaultValue;
    }

    /**
     * Get a timestamp field value. Determines if the value
     * is a datetime struct or integer timestamp and returns
     * accordingly
     *
     * @return int|null
     */
    public function getTimestampField(string $key) : ?int
    {
        $value = $this->getField($key);

        if (is_array($value) && isset($value['time_t'])) {
            return $value['time_t'];
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function hasField(string $key) : bool
    {
        return isset($this->data[$key]);
    }

    /**
     * @inheritDoc
     */
    public function removeField(string $key) : self
    {
        unset($this->data[$key]);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
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
    public function hasData() : bool
    {
        return (bool)$this->data;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->getData();
    }
}
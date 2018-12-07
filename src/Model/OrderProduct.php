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

use MerchantAPI\Collection;

/**
 * Data model for OrderProduct.
 *
 * @package MerchantAPI\Model
 */
class OrderProduct extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('attributes', new Collection());

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof OrderProductAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new OrderProductAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderProductAttribute or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('attributes', $attributes);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof OrderProductAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return (int) $this->getField('status', 0);
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get sku.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->getField('sku');
    }

    /**
     * Get tracknum.
     *
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->getField('tracknum');
    }

    /**
     * Get tracktype.
     *
     * @return string
     */
    public function getTrackingType()
    {
        return $this->getField('tracktype');
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return (int) $this->getField('quantity', 0);
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\OrderProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('attributes', []);
    }

    /**
     * Set status.
     *
     * @param int
     * @return $this
     */
    public function setStatus($status)
    {
        return $this->setField('status', $status);
    }

    /**
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set sku.
     *
     * @param string
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setField('sku', $sku);
    }

    /**
     * Set tracknum.
     *
     * @param string
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        return $this->setField('tracknum', $trackingNumber);
    }

    /**
     * Set tracktype.
     *
     * @param string
     * @return $this
     */
    public function setTrackingType($trackingType)
    {
        return $this->setField('tracktype', $trackingType);
    }

    /**
     * Set quantity.
     *
     * @param int
     * @return $this
     */
    public function setQuantity($quantity)
    {
        return $this->setField('quantity', $quantity);
    }

    /**
     * Set attributes.
     *
     * @param array[OrderProductAttribute]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new OrderProductAttribute($model);
            } else if (!$model instanceof OrderProductAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderProductAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('attributes', $attributes);
    }
    
    /**
     * Add a OrderProductAttribute.
     *
     * @param OrderProductAttribute
     * @return $this
     */
    public function addAttribute(OrderProductAttribute $model)
    {
        if (!isset($this->data['attributes'])) {
            $this->data['attributes'] = [];
        }

        $this->data['attributes'][] = $model;

        return $this;
    }
}
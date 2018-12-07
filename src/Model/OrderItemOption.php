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
 * Data model for OrderItemOption.
 *
 * @package MerchantAPI\Model
 */
class OrderItemOption extends \MerchantAPI\Model
{
    /**
     * Get attribute.
     *
     * @return string
     */
    public function getAttribute()
    {
        return $this->getField('attribute');
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->getField('value');
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return (float) $this->getField('weight', 0.00);
    }

    /**
     * Get retail.
     *
     * @return float
     */
    public function getRetail()
    {
        return (float) $this->getField('retail', 0.00);
    }

    /**
     * Get base_price.
     *
     * @return float
     */
    public function getBasePrice()
    {
        return (float) $this->getField('base_price', 0.00);
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->getField('price', 0.00);
    }

    /**
     * Set attribute.
     *
     * @param string
     * @return $this
     */
    public function setAttribute($attribute)
    {
        return $this->setField('attribute', $attribute);
    }

    /**
     * Set value.
     *
     * @param string
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setField('value', $value);
    }

    /**
     * Set weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        return $this->setField('weight', $weight);
    }

    /**
     * Set price.
     *
     * @param float
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setField('price', $price);
    }
    
    /**
     * @inheritDoc
     */
    public function getData()
    {
        $data = [];

        if (isset($this->data['attribute'])) {
            $data['attr_code'] = $this->data['attribute'];
        }

        if (isset($this->data['value'])) {
            $data['opt_code_or_data'] = $this->data['value'];
        }

        if (isset($this->data['weight'])) {
            $data['weight'] = $this->data['weight'];
        }

        if (isset($this->data['price'])) {
            $data['price'] = $this->data['price'];
        }

        return $data;
    }
}
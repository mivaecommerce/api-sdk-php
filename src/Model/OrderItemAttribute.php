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
 * Data model for OrderItemAttribute.
 *
 * @package MerchantAPI\Model
 */
class OrderItemAttribute extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(OrderItemOption $option = null)
    {
        if ($option) {
            $this->setAttributeCode($option->getAttribute())
              ->setOptionCodeOrData($option->getValue())
              ->setPrice($option->getPrice())
              ->setWeight($option->getWeight());
        }
    }

    /**
     * Get attr_code.
     *
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->getField('attr_code');
    }

    /**
     * Get opt_code_or_data.
     *
     * @return string
     */
    public function getOptionCodeOrData()
    {
        return $this->getField('opt_code_or_data');
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
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return (float) $this->getField('weight', 0.00);
    }

    /**
     * Set attr_code.
     *
     * @param string
     * @return $this
     */
    public function setAttributeCode($attributeCode)
    {
        return $this->setField('attr_code', $attributeCode);
    }

    /**
     * Set opt_code_or_data.
     *
     * @param string
     * @return $this
     */
    public function setOptionCodeOrData($optionCodeOrData)
    {
        return $this->setField('opt_code_or_data', $optionCodeOrData);
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
     * Set weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        return $this->setField('weight', $weight);
    }
}
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
     * @param ?OrderItemOption $option
     */
    public function __construct(?OrderItemOption $option = null)
    {
        parent::__construct([]);

        if ($option) {
            $this->setAttributeCode($option->getAttributeCode())
              ->setOptionCodeOrData($option->getValue())
              ->setPrice($option->getPrice())
              ->setWeight($option->getWeight());
        }
    }

    /**
     * Get attr_code.
     *
     * @return ?string
     */
    public function getAttributeCode() : ?string
    {
        return $this->getField('attr_code');
    }

    /**
     * Get opt_code_or_data.
     *
     * @return ?string
     */
    public function getOptionCodeOrData() : ?string
    {
        return $this->getField('opt_code_or_data');
    }

    /**
     * Get price.
     *
     * @return ?float
     */
    public function getPrice() : ?float
    {
        return $this->getField('price');
    }

    /**
     * Get weight.
     *
     * @return ?float
     */
    public function getWeight() : ?float
    {
        return (float) $this->getField('weight');
    }

    /**
     * Set attr_code.
     *
     * @param string $attributeCode
     * @return $this
     */
    public function setAttributeCode(string $attributeCode) : self
    {
        return $this->setField('attr_code', $attributeCode);
    }

    /**
     * Set opt_code_or_data.
     *
     * @param string $optionCodeOrData
     * @return $this
     */
    public function setOptionCodeOrData(string $optionCodeOrData) : self
    {
        return $this->setField('opt_code_or_data', $optionCodeOrData);
    }

    /**
     * Set price.
     *
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price) : self
    {
        return $this->setField('price', $price);
    }

    /**
     * Set weight.
     *
     * @param float $weight
     * @return $this
     */
    public function setWeight(float $weight) : self
    {
        return $this->setField('weight', $weight);
    }
}
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
 * Data model for OrderItemOption.
 *
 * @package MerchantAPI\Model
 */
class OrderItemOption extends \MerchantAPI\Model
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get order_id.
     *
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->getField('order_id', 0);
    }

    /**
     * Get line_id.
     *
     * @return int
     */
    public function getLineId()
    {
        return (int) $this->getField('line_id', 0);
    }

    /**
     * Get option_id.
     *
     * @return int
     */
    public function getOptionId()
    {
        return (int) $this->getField('option_id', 0);
    }

    /**
     * Get opt_code.
     *
     * @return string
     */
    public function getOptionCode()
    {
        return $this->getField('opt_code');
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
     * Get attr_id.
     *
     * @return int
     */
    public function getAttributeId()
    {
        return (int) $this->getField('attr_id', 0);
    }

    /**
     * Get attmpat_id.
     *
     * @return int
     */
    public function getAttributeTemplateAttributeId()
    {
        return (int) $this->getField('attmpat_id', 0);
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
     * Get data.
     *
     * @return string
     */
    public function getOptionData()
    {
        return $this->getField('data');
    }

    /**
     * Get data_long.
     *
     * @return string
     */
    public function getOptionDataLong()
    {
        return $this->getField('data_long');
    }

    /**
     * Get attr_prompt.
     *
     * @return string
     */
    public function getAttributePrompt()
    {
        return $this->getField('attr_prompt');
    }

    /**
     * Get opt_prompt.
     *
     * @return string
     */
    public function getOptionPrompt()
    {
        return $this->getField('opt_prompt');
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
     * Set attr_id.
     *
     * @param int
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        return $this->setField('attr_id', $attributeId);
    }

    /**
     * Set attmpat_id.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateAttributeId($attributeTemplateAttributeId)
    {
        return $this->setField('attmpat_id', $attributeTemplateAttributeId);
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
     * Set retail.
     *
     * @param float
     * @return $this
     */
    public function setRetail($retail)
    {
        return $this->setField('retail', $retail);
    }

    /**
     * Set base_price.
     *
     * @param float
     * @return $this
     */
    public function setBasePrice($basePrice)
    {
        return $this->setField('base_price', $basePrice);
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

        if (isset($this->data['attr_code'])) {
            $data['attr_code'] = $this->data['attr_code'];
        }

        if (isset($this->data['opt_code_or_data'])) {
            $data['opt_code_or_data'] = $this->data['opt_code_or_data'];
        }

        if (isset($this->data['attr_id'])) {
            $data['attr_id'] = $this->data['attr_id'];
        }

        if (isset($this->data['attmpat_id'])) {
            $data['attmpat_id'] = $this->data['attmpat_id'];
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

        if (isset($this->data['base_price'])) {
            $data['base_price'] = $this->data['base_price'];
        }

        if (isset($this->data['retail'])) {
            $data['retail'] = $this->data['retail'];
        }

        return $data;
    }
}
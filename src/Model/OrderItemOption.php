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

use MerchantAPI\Collection;

/**
 * Data model for OrderItemOption.
 *
 * @package MerchantAPI\Model
 */
class OrderItemOption extends \MerchantAPI\Model
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

        $this->setField('discounts', new Collection());

        if (isset($data['discounts']) && is_array($data['discounts'])) {
            $discounts = new Collection();

            foreach($data['discounts'] as $e) {
                if ($e instanceof OrderItemOptionDiscount) {
                    $discounts[] = $e;
                } else if (is_array($e)) {
                    $discounts[] = new OrderItemOptionDiscount($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOptionDiscount or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('discounts', $discounts);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['discounts']) && is_array($this->data['discounts'])) {
            if ($this->data['discounts'] instanceof Collection) {
                $this->data['discounts'] = clone $this->data['discounts'];
            } else {
                foreach($this->data['discounts'] as $i => $e) {
                    if ($e instanceof OrderItemOptionDiscount) {
                        $this->data['discounts'][$i] = clone $this->data['discounts'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get line_id.
     *
     * @return ?int
     */
    public function getLineId() : ?int
    {
        return $this->getField('line_id');
    }

    /**
     * Get option_id.
     *
     * @return ?int
     */
    public function getOptionId() : ?int
    {
        return $this->getField('option_id');
    }

    /**
     * Get opt_code.
     *
     * @return ?string
     */
    public function getOptionCode() : ?string
    {
        return $this->getField('opt_code');
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
     * Get attr_id.
     *
     * @return ?int
     */
    public function getAttributeId() : ?int
    {
        return $this->getField('attr_id');
    }

    /**
     * Get attmpat_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->getField('attmpat_id');
    }

    /**
     * Get value.
     *
     * @return ?string
     */
    public function getValue() : ?string
    {
        return $this->getField('value');
    }

    /**
     * Get weight.
     *
     * @return ?float
     */
    public function getWeight() : ?float
    {
        return $this->getField('weight');
    }

    /**
     * Get retail.
     *
     * @return ?float
     */
    public function getRetail() : ?float
    {
        return $this->getField('retail');
    }

    /**
     * Get base_price.
     *
     * @return ?float
     */
    public function getBasePrice() : ?float
    {
        return $this->getField('base_price');
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
     * Get data.
     *
     * @return ?string
     */
    public function getOptionData() : ?string
    {
        return $this->getField('data');
    }

    /**
     * Get data_long.
     *
     * @return ?string
     */
    public function getOptionDataLong() : ?string
    {
        return $this->getField('data_long');
    }

    /**
     * Get attr_prompt.
     *
     * @return ?string
     */
    public function getAttributePrompt() : ?string
    {
        return $this->getField('attr_prompt');
    }

    /**
     * Get opt_prompt.
     *
     * @return ?string
     */
    public function getOptionPrompt() : ?string
    {
        return $this->getField('opt_prompt');
    }

    /**
     * Get discounts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getDiscounts() : ?Collection
    {
        return $this->getField('discounts');
    }

    /**
     * Set attr_code.
     *
     * @param ?string $attributeCode
     * @return $this
     */
    public function setAttributeCode(?string $attributeCode) : self
    {
        return $this->setField('attr_code', $attributeCode);
    }

    /**
     * Set attr_id.
     *
     * @param ?int $attributeId
     * @return $this
     */
    public function setAttributeId(?int $attributeId) : self
    {
        return $this->setField('attr_id', $attributeId);
    }

    /**
     * Set attmpat_id.
     *
     * @param ?int $attributeTemplateAttributeId
     * @return $this
     */
    public function setAttributeTemplateAttributeId(?int $attributeTemplateAttributeId) : self
    {
        return $this->setField('attmpat_id', $attributeTemplateAttributeId);
    }

    /**
     * Set value.
     *
     * @param ?string $value
     * @return $this
     */
    public function setValue(?string $value) : self
    {
        return $this->setField('value', $value);
    }

    /**
     * Set weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        return $this->setField('weight', $weight);
    }

    /**
     * Set retail.
     *
     * @param ?float $retail
     * @return $this
     */
    public function setRetail(?float $retail) : self
    {
        return $this->setField('retail', $retail);
    }

    /**
     * Set base_price.
     *
     * @param ?float $basePrice
     * @return $this
     */
    public function setBasePrice(?float $basePrice) : self
    {
        return $this->setField('base_price', $basePrice);
    }

    /**
     * Set price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        return $this->setField('price', $price);
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
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
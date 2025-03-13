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

use MerchantAPI\DecimalHelper;

/**
 * Data model for ProductAttributeListOption.
 *
 * @package MerchantAPI\Model
 */
class ProductAttributeListOption extends \MerchantAPI\Model
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

        if (isset($data['price'])) {
            $this->setField('price', DecimalHelper::create($data['price'], 16));
        }

        if (isset($data['cost'])) {
            $this->setField('cost', DecimalHelper::create($data['cost'], 16));
        }

        if (isset($data['weight'])) {
            $this->setField('weight', DecimalHelper::create($data['weight'], 16));
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
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
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
     * Get attemp_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateId() : ?int
    {
        return $this->getField('attemp_id');
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
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        if ($this->hasField('disp_order')) {
            return (int) $this->getField('disp_order', 0);
        } else if ($this->hasField('disporder')) {
            return (int) $this->getField('disporder', 0);
        }

        return 0;
    }

    /**
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get prompt.
     *
     * @return ?string
     */
    public function getPrompt() : ?string
    {
        return $this->getField('prompt');
    }

    /**
     * Get price.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getPrice() 
    {
        return $this->getField('price');
    }

    /**
     * Get cost.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getCost() 
    {
        return $this->getField('cost');
    }

    /**
     * Get weight.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getWeight() 
    {
        return $this->getField('weight');
    }

    /**
     * Get image.
     *
     * @return ?string
     */
    public function getImage() : ?string
    {
        return $this->getField('image');
    }

    /**
     * Get default_opt.
     *
     * @return ?bool
     */
    public function getDefaultOption() : ?bool
    {
        return $this->getField('default_opt');
    }

    /**
     * Get has_variant_parts.
     *
     * @return ?bool
     */
    public function getHasVariantParts() : ?bool
    {
        return $this->getField('has_variant_parts');
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        $data = parent::getData();

        if (isset($data['price'])) {
            $data['price'] = DecimalHelper::serialize($data['price'], 8);
        }
        if (isset($data['cost'])) {
            $data['cost'] = DecimalHelper::serialize($data['cost'], 8);
        }
        if (isset($data['weight'])) {
            $data['weight'] = DecimalHelper::serialize($data['weight'], 8);
        }

        return $data;
    }
}
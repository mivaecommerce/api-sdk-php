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
 * Data model for AttributeTemplateOption.
 *
 * @package MerchantAPI\Model
 */
class AttributeTemplateOption extends \MerchantAPI\Model
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
     * Get disporder.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        if ($this->hasField('disporder')) {
            return (int) $this->getField('disporder', 0);
        } else if ($this->hasField('disp_order')) {
            return (int) $this->getField('disp_order', 0);
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
     * Get formatted_price.
     *
     * @return ?string
     */
    public function getFormattedPrice() : ?string
    {
        return $this->getField('formatted_price');
    }

    /**
     * Get formatted_cost.
     *
     * @return ?string
     */
    public function getFormattedCost() : ?string
    {
        return $this->getField('formatted_cost');
    }

    /**
     * Get formatted_weight.
     *
     * @return ?string
     */
    public function getFormattedWeight() : ?string
    {
        return $this->getField('formatted_weight');
    }

    /**
     * Get default_opt.
     *
     * @return ?bool
     */
    public function getDefaultOpt() : ?bool
    {
        return $this->getField('default_opt');
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
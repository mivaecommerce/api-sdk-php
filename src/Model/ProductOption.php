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
 * Data model for ProductOption.
 *
 * @package MerchantAPI\Model
 */
class ProductOption extends \MerchantAPI\Model
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
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
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
     * Get attemp_id.
     *
     * @return int
     */
    public function getAttributeTemplateId()
    {
        return (int) $this->getField('attemp_id', 0);
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
     * Get disp_order.
     *
     * @return int
     */
    public function getDisplayOrder()
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
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get prompt.
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->getField('prompt');
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
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
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
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getField('image');
    }

    /**
     * Get formatted_price.
     *
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->getField('formatted_price');
    }

    /**
     * Get formatted_cost.
     *
     * @return string
     */
    public function getFormattedCost()
    {
        return $this->getField('formatted_cost');
    }
}
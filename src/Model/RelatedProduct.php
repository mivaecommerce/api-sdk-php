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
 * Data model for RelatedProduct.
 *
 * @package MerchantAPI\Model
 */
class RelatedProduct extends \MerchantAPI\Model
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
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get thumbnail.
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->getField('thumbnail');
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
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->getField('price', 0.00);
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
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
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
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('active', false);
    }

    /**
     * Get page_title.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getField('page_title');
    }

    /**
     * Get taxable.
     *
     * @return bool
     */
    public function getTaxable()
    {
        return (bool) $this->getField('taxable', false);
    }

    /**
     * Get dt_created.
     *
     * @return int
     */
    public function getDateTimeCreated()
    {
        return (int) $this->getField('dt_created', 0);
    }

    /**
     * Get dt_updated.
     *
     * @return int
     */
    public function getDateTimeUpdated()
    {
        return (int) $this->getField('dt_updated', 0);
    }

    /**
     * Get assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return (bool) $this->getField('assigned', false);
    }
}
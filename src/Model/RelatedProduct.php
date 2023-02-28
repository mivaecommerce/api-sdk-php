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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
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
     * Get sku.
     *
     * @return ?string
     */
    public function getSku() : ?string
    {
        return $this->getField('sku');
    }

    /**
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get thumbnail.
     *
     * @return ?string
     */
    public function getThumbnail() : ?string
    {
        return $this->getField('thumbnail');
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
     * Get price.
     *
     * @return ?float
     */
    public function getPrice() : ?float
    {
        return $this->getField('price');
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
     * Get cost.
     *
     * @return ?float
     */
    public function getCost() : ?float
    {
        return $this->getField('cost');
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
     * Get weight.
     *
     * @return ?float
     */
    public function getWeight() : ?float
    {
        return $this->getField('weight');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }

    /**
     * Get page_title.
     *
     * @return ?string
     */
    public function getPageTitle() : ?string
    {
        return $this->getField('page_title');
    }

    /**
     * Get taxable.
     *
     * @return ?bool
     */
    public function getTaxable() : ?bool
    {
        return $this->getField('taxable');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getDateTimeCreated() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get dt_updated.
     *
     * @return ?int
     */
    public function getDateTimeUpdated() : ?int
    {
        return $this->getTimestampField('dt_updated');
    }

    /**
     * Get assigned.
     *
     * @return ?bool
     */
    public function getAssigned() : ?bool
    {
        return $this->getField('assigned');
    }

    /**
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        return $this->getField('disp_order');
    }
}
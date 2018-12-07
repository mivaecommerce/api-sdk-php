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
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set sku.
     *
     * @param string
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setField('sku', $sku);
    }

    /**
     * Set name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        return $this->setField('name', $name);
    }

    /**
     * Set thumbnail.
     *
     * @param string
     * @return $this
     */
    public function setThumbnail($thumbnail)
    {
        return $this->setField('thumbnail', $thumbnail);
    }

    /**
     * Set image.
     *
     * @param string
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setField('image', $image);
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
     * Set cost.
     *
     * @param float
     * @return $this
     */
    public function setCost($cost)
    {
        return $this->setField('cost', $cost);
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
     * Set active.
     *
     * @param bool
     * @return $this
     */
    public function setActive($active)
    {
        return $this->setField('active', $active);
    }

    /**
     * Set page_title.
     *
     * @param string
     * @return $this
     */
    public function setPageTitle($pageTitle)
    {
        return $this->setField('page_title', $pageTitle);
    }

    /**
     * Set taxable.
     *
     * @param bool
     * @return $this
     */
    public function setTaxable($taxable)
    {
        return $this->setField('taxable', $taxable);
    }
}
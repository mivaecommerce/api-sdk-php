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
 * Data model for ProductImageData.
 *
 * @package MerchantAPI\Model
 */
class ProductImageData extends \MerchantAPI\Model
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
     * Get image_id.
     *
     * @return int
     */
    public function getImageId()
    {
        return (int) $this->getField('image_id', 0);
    }

    /**
     * Get type_id.
     *
     * @return int
     */
    public function getTypeId()
    {
        return (int) $this->getField('type_id', 0);
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
     * Get type_desc.
     *
     * @return string
     */
    public function getTypeDescription()
    {
        return $this->getField('type_desc');
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
     * Get width.
     *
     * @return int
     */
    public function getWidth()
    {
        return (int) $this->getField('width', 0);
    }

    /**
     * Get height.
     *
     * @return int
     */
    public function getHeight()
    {
        return (int) $this->getField('height', 0);
    }

    /**
     * Get disp_order.
     *
     * @return int
     */
    public function getDisplayOrder()
    {
        return (int) $this->getField('disp_order', 0);
    }
}
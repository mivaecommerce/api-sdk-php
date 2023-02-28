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
 * Data model for ProductImageData.
 *
 * @package MerchantAPI\Model
 */
class ProductImageData extends \MerchantAPI\Model
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
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get image_id.
     *
     * @return ?int
     */
    public function getImageId() : ?int
    {
        return $this->getField('image_id');
    }

    /**
     * Get type_id.
     *
     * @return ?int
     */
    public function getTypeId() : ?int
    {
        return $this->getField('type_id');
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
     * Get type_desc.
     *
     * @return ?string
     */
    public function getTypeDescription() : ?string
    {
        return $this->getField('type_desc');
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
     * Get width.
     *
     * @return ?int
     */
    public function getWidth() : ?int
    {
        return $this->getField('width');
    }

    /**
     * Get height.
     *
     * @return ?int
     */
    public function getHeight() : ?int
    {
        return $this->getField('height');
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
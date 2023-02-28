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
 * Data model for ProductVariantPart.
 *
 * @package MerchantAPI\Model
 */
class ProductVariantPart extends \MerchantAPI\Model
{
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
     * Get product_code.
     *
     * @return ?string
     */
    public function getProductCode() : ?string
    {
        return $this->getField('product_code');
    }

    /**
     * Get product_name.
     *
     * @return ?string
     */
    public function getProductName() : ?string
    {
        return $this->getField('product_name');
    }

    /**
     * Get product_sku.
     *
     * @return ?string
     */
    public function getProductSku() : ?string
    {
        return $this->getField('product_sku');
    }

    /**
     * Get quantity.
     *
     * @return ?int
     */
    public function getQuantity() : ?int
    {
        return $this->getField('quantity');
    }

    /**
     * Get offset.
     *
     * @return ?int
     */
    public function getOffset() : ?int
    {
        return $this->getField('offset');
    }
}
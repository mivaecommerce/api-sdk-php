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
 * Data model for ProductInventoryAdjustment.
 *
 * @package MerchantAPI\Model
 */
class ProductInventoryAdjustment extends \MerchantAPI\Model
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
     * Get product_sku.
     *
     * @return ?string
     */
    public function getProductSku() : ?string
    {
        return $this->getField('product_sku');
    }

    /**
     * Get adjustment.
     *
     * @return ?float
     */
    public function getAdjustment() : ?float
    {
        return $this->getField('adjustment');
    }

    /**
     * Set product_id.
     *
     * @param ?int $productId
     * @return $this
     */
    public function setProductId(?int $productId) : self
    {
        return $this->setField('product_id', $productId);
    }

    /**
     * Set product_code.
     *
     * @param ?string $productCode
     * @return $this
     */
    public function setProductCode(?string $productCode) : self
    {
        return $this->setField('product_code', $productCode);
    }

    /**
     * Set product_sku.
     *
     * @param ?string $productSku
     * @return $this
     */
    public function setProductSku(?string $productSku) : self
    {
        return $this->setField('product_sku', $productSku);
    }

    /**
     * Set adjustment.
     *
     * @param ?float $adjustment
     * @return $this
     */
    public function setAdjustment(?float $adjustment) : self
    {
        return $this->setField('adjustment', $adjustment);
    }
}
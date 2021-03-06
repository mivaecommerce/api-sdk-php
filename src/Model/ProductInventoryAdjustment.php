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
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get product_code.
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->getField('product_code');
    }

    /**
     * Get product_sku.
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->getField('product_sku');
    }

    /**
     * Get adjustment.
     *
     * @return float
     */
    public function getAdjustment()
    {
        return (float) $this->getField('adjustment', 0.00);
    }

    /**
     * Set product_id.
     *
     * @param int
     * @return $this
     */
    public function setProductId($productId)
    {
        return $this->setField('product_id', $productId);
    }

    /**
     * Set product_code.
     *
     * @param string
     * @return $this
     */
    public function setProductCode($productCode)
    {
        return $this->setField('product_code', $productCode);
    }

    /**
     * Set product_sku.
     *
     * @param string
     * @return $this
     */
    public function setProductSku($productSku)
    {
        return $this->setField('product_sku', $productSku);
    }

    /**
     * Set adjustment.
     *
     * @param float
     * @return $this
     */
    public function setAdjustment($adjustment)
    {
        return $this->setField('adjustment', $adjustment);
    }
}
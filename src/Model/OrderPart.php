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
 * Data model for OrderPart.
 *
 * @package MerchantAPI\Model
 */
class OrderPart extends \MerchantAPI\Model
{
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
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return (int) $this->getField('quantity', 0);
    }

    /**
     * Get total_quantity.
     *
     * @return int
     */
    public function getTotalQuantity()
    {
        return (int) $this->getField('total_quantity', 0);
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
}
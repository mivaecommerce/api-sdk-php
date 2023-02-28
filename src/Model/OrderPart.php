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
     * Get quantity.
     *
     * @return ?int
     */
    public function getQuantity() : ?int
    {
        return $this->getField('quantity');
    }

    /**
     * Get total_quantity.
     *
     * @return ?int
     */
    public function getTotalQuantity() : ?int
    {
        return $this->getField('total_quantity');
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
}
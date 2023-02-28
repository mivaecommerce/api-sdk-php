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
 * Data model for OrderItemDiscount.
 *
 * @package MerchantAPI\Model
 */
class OrderItemDiscount extends \MerchantAPI\Model
{
    /**
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get line_id.
     *
     * @return ?int
     */
    public function getLineId() : ?int
    {
        return $this->getField('line_id');
    }

    /**
     * Get pgrp_id.
     *
     * @return ?int
     */
    public function getPriceGroupId() : ?int
    {
        return $this->getField('pgrp_id');
    }

    /**
     * Get display.
     *
     * @return ?bool
     */
    public function getDisplay() : ?bool
    {
        return $this->getField('display');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get discount.
     *
     * @return ?float
     */
    public function getDiscount() : ?float
    {
        return $this->getField('discount');
    }
}
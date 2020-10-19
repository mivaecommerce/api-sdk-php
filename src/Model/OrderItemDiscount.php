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
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->getField('order_id', 0);
    }

    /**
     * Get line_id.
     *
     * @return int
     */
    public function getLineId()
    {
        return (int) $this->getField('line_id', 0);
    }

    /**
     * Get pgrp_id.
     *
     * @return int
     */
    public function getPriceGroupId()
    {
        return (int) $this->getField('pgrp_id', 0);
    }

    /**
     * Get display.
     *
     * @return bool
     */
    public function getDisplay()
    {
        return (bool) $this->getField('display', false);
    }

    /**
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get discount.
     *
     * @return float
     */
    public function getDiscount()
    {
        return (float) $this->getField('discount', 0.00);
    }
}
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
 * Data model for OrderCoupon.
 *
 * @package MerchantAPI\Model
 */
class OrderCoupon extends \MerchantAPI\Model
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
     * Get coupon_id.
     *
     * @return ?int
     */
    public function getCouponId() : ?int
    {
        return $this->getField('coupon_id');
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
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get total.
     *
     * @return ?float
     */
    public function getTotal() : ?float
    {
        return $this->getField('total');
    }

    /**
     * Get assigned.
     *
     * @return ?bool
     */
    public function getAssigned() : ?bool
    {
        return $this->getField('assigned');
    }
}
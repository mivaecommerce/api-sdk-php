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
 * Data model for OrderDiscountTotal.
 *
 * @package MerchantAPI\Model
 */
class OrderDiscountTotal extends \MerchantAPI\Model
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
     * Get pgrp_id.
     *
     * @return int
     */
    public function getPriceGroupId()
    {
        return (int) $this->getField('pgrp_id', 0);
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
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get total.
     *
     * @return float
     */
    public function getTotal()
    {
        return (float) $this->getField('total', 0.00);
    }
}
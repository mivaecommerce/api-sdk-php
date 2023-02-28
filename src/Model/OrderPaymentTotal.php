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
 * Data model for OrderPaymentTotal.
 *
 * @package MerchantAPI\Model
 */
class OrderPaymentTotal extends \MerchantAPI\Model
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
     * Get total_auth.
     *
     * @return ?float
     */
    public function getTotalAuthorized() : ?float
    {
        return $this->getField('total_auth');
    }

    /**
     * Get formatted_total_auth.
     *
     * @return ?string
     */
    public function getFormattedTotalAuthorized() : ?string
    {
        return $this->getField('formatted_total_auth');
    }

    /**
     * Get total_capt.
     *
     * @return ?float
     */
    public function getTotalCaptured() : ?float
    {
        return $this->getField('total_capt');
    }

    /**
     * Get formatted_total_capt.
     *
     * @return ?string
     */
    public function getFormattedTotalCaptured() : ?string
    {
        return $this->getField('formatted_total_capt');
    }

    /**
     * Get total_rfnd.
     *
     * @return ?float
     */
    public function getTotalRefunded() : ?float
    {
        return $this->getField('total_rfnd');
    }

    /**
     * Get formatted_total_rfnd.
     *
     * @return ?string
     */
    public function getFormattedTotalRefunded() : ?string
    {
        return $this->getField('formatted_total_rfnd');
    }

    /**
     * Get net_capt.
     *
     * @return ?float
     */
    public function getNetCaptured() : ?float
    {
        return $this->getField('net_capt');
    }

    /**
     * Get formatted_net_capt.
     *
     * @return ?string
     */
    public function getFormattedNetCaptured() : ?string
    {
        return $this->getField('formatted_net_capt');
    }
}
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
 * Data model for OrderPaymentAuthorize.
 *
 * @package MerchantAPI\Model
 */
class OrderPaymentAuthorize extends \MerchantAPI\Model
{
    /**
     * Get valid.
     *
     * @return bool
     */
    public function getValid()
    {
        return (bool) $this->getField('valid', false);
    }

    /**
     * Get total_auth.
     *
     * @return float
     */
    public function getTotalAuthorized()
    {
        return (float) $this->getField('total_auth', 0.00);
    }

    /**
     * Get formatted_total_auth.
     *
     * @return string
     */
    public function getFormattedTotalAuthorized()
    {
        return $this->getField('formatted_total_auth');
    }

    /**
     * Get total_capt.
     *
     * @return float
     */
    public function getTotalCaptured()
    {
        return (float) $this->getField('total_capt', 0.00);
    }

    /**
     * Get formatted_total_capt.
     *
     * @return string
     */
    public function getFormattedTotalCaptured()
    {
        return $this->getField('formatted_total_capt');
    }

    /**
     * Get total_rfnd.
     *
     * @return float
     */
    public function getTotalRefunded()
    {
        return (float) $this->getField('total_rfnd', 0.00);
    }

    /**
     * Get formatted_total_rfnd.
     *
     * @return string
     */
    public function getFormattedTotalRefunded()
    {
        return $this->getField('formatted_total_rfnd');
    }

    /**
     * Get net_capt.
     *
     * @return float
     */
    public function getNetCaptured()
    {
        return (float) $this->getField('net_capt', 0.00);
    }

    /**
     * Get formatted_net_capt.
     *
     * @return string
     */
    public function getFormattedNetCaptured()
    {
        return $this->getField('formatted_net_capt');
    }
}
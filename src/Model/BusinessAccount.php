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
 * Data model for BusinessAccount.
 *
 * @package MerchantAPI\Model
 */
class BusinessAccount extends \MerchantAPI\Model
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getField('title');
    }

    /**
     * Get tax_exempt.
     *
     * @return bool
     */
    public function getTaxExempt()
    {
        return (bool) $this->getField('tax_exempt', false);
    }

    /**
     * Get order_cnt.
     *
     * @return int
     */
    public function getOrderCount()
    {
        return (int) $this->getField('order_cnt', 0);
    }

    /**
     * Get order_avg.
     *
     * @return float
     */
    public function getOrderAverage()
    {
        return (float) $this->getField('order_avg', 0.00);
    }

    /**
     * Get formatted_order_avg.
     *
     * @return string
     */
    public function getFormattedOrderAverage()
    {
        return $this->getField('formatted_order_avg');
    }

    /**
     * Get order_tot.
     *
     * @return float
     */
    public function getOrderTotal()
    {
        return (float) $this->getField('order_tot', 0.00);
    }

    /**
     * Get formatted_order_tot.
     *
     * @return string
     */
    public function getFormattedOrderTotal()
    {
        return $this->getField('formatted_order_tot');
    }

    /**
     * Get note_count.
     *
     * @return int
     */
    public function getNoteCount()
    {
        return (int) $this->getField('note_count', 0);
    }
}
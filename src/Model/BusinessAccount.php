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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get title.
     *
     * @return ?string
     */
    public function getTitle() : ?string
    {
        return $this->getField('title');
    }

    /**
     * Get tax_exempt.
     *
     * @return ?bool
     */
    public function getTaxExempt() : ?bool
    {
        return $this->getField('tax_exempt');
    }

    /**
     * Get order_cnt.
     *
     * @return ?int
     */
    public function getOrderCount() : ?int
    {
        return $this->getField('order_cnt');
    }

    /**
     * Get order_avg.
     *
     * @return ?float
     */
    public function getOrderAverage() : ?float
    {
        return $this->getField('order_avg');
    }

    /**
     * Get formatted_order_avg.
     *
     * @return ?string
     */
    public function getFormattedOrderAverage() : ?string
    {
        return $this->getField('formatted_order_avg');
    }

    /**
     * Get order_tot.
     *
     * @return ?float
     */
    public function getOrderTotal() : ?float
    {
        return $this->getField('order_tot');
    }

    /**
     * Get formatted_order_tot.
     *
     * @return ?string
     */
    public function getFormattedOrderTotal() : ?string
    {
        return $this->getField('formatted_order_tot');
    }

    /**
     * Get note_count.
     *
     * @return ?int
     */
    public function getNoteCount() : ?int
    {
        return $this->getField('note_count');
    }
}
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
 * Data model for CustomerCreditHistory.
 *
 * @package MerchantAPI\Model
 */
class CustomerCreditHistory extends \MerchantAPI\Model
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
     * Get user_id.
     *
     * @return ?int
     */
    public function getUserId() : ?int
    {
        return $this->getField('user_id');
    }

    /**
     * Get cust_id.
     *
     * @return ?int
     */
    public function getCustomerId() : ?int
    {
        return $this->getField('cust_id');
    }

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
     * Get txref.
     *
     * @return ?string
     */
    public function getTransactionReference() : ?string
    {
        return $this->getField('txref');
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
     * Get amount.
     *
     * @return ?float
     */
    public function getAmount() : ?float
    {
        return $this->getField('amount');
    }

    /**
     * Get dtstamp.
     *
     * @return ?int
     */
    public function getDateTimeStamp() : ?int
    {
        return $this->getTimestampField('dtstamp');
    }

    /**
     * Get user_name.
     *
     * @return ?string
     */
    public function getUserName() : ?string
    {
        return $this->getField('user_name');
    }
}
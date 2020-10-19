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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get user_id.
     *
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->getField('user_id', 0);
    }

    /**
     * Get cust_id.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return (int) $this->getField('cust_id', 0);
    }

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
     * Get txref.
     *
     * @return string
     */
    public function getTransactionReference()
    {
        return $this->getField('txref');
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
     * Get amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return (float) $this->getField('amount', 0.00);
    }

    /**
     * Get dtstamp.
     *
     * @return int
     */
    public function getDateTimeStamp()
    {
        return (int) $this->getField('dtstamp', 0);
    }

    /**
     * Get user_name.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->getField('user_name');
    }
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Model;

/**
 * Data model for Note.
 *
 * @package MerchantAPI\Model
 */
class Note extends \MerchantAPI\Model
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
     * Get cust_id.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return (int) $this->getField('cust_id', 0);
    }

    /**
     * Get account_id.
     *
     * @return int
     */
    public function getAccountId()
    {
        return (int) $this->getField('account_id', 0);
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
     * Get user_id.
     *
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->getField('user_id', 0);
    }

    /**
     * Get notetext.
     *
     * @return string
     */
    public function getNoteText()
    {
        return $this->getField('notetext');
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
     * Get cust_login.
     *
     * @return string
     */
    public function getCustomerLogin()
    {
        return $this->getField('cust_login');
    }

    /**
     * Get business_title.
     *
     * @return string
     */
    public function getBusinessTitle()
    {
        return $this->getField('business_title');
    }

    /**
     * Get admin_user.
     *
     * @return string
     */
    public function getAdminUser()
    {
        return $this->getField('admin_user');
    }

    /**
     * Set cust_id.
     *
     * @param int
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        return $this->setField('cust_id', $customerId);
    }

    /**
     * Set account_id.
     *
     * @param int
     * @return $this
     */
    public function setAccountId($accountId)
    {
        return $this->setField('account_id', $accountId);
    }

    /**
     * Set order_id.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        return $this->setField('order_id', $orderId);
    }

    /**
     * Set notetext.
     *
     * @param string
     * @return $this
     */
    public function setNoteText($noteText)
    {
        return $this->setField('notetext', $noteText);
    }
}
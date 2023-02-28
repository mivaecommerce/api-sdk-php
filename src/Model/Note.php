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
 * Data model for Note.
 *
 * @package MerchantAPI\Model
 */
class Note extends \MerchantAPI\Model
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
     * Get cust_id.
     *
     * @return ?int
     */
    public function getCustomerId() : ?int
    {
        return $this->getField('cust_id');
    }

    /**
     * Get account_id.
     *
     * @return ?int
     */
    public function getAccountId() : ?int
    {
        return $this->getField('account_id');
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
     * Get user_id.
     *
     * @return ?int
     */
    public function getUserId() : ?int
    {
        return $this->getField('user_id');
    }

    /**
     * Get notetext.
     *
     * @return ?string
     */
    public function getNoteText() : ?string
    {
        return $this->getField('notetext');
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
     * Get cust_login.
     *
     * @return ?string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->getField('cust_login');
    }

    /**
     * Get business_title.
     *
     * @return ?string
     */
    public function getBusinessTitle() : ?string
    {
        return $this->getField('business_title');
    }

    /**
     * Get admin_user.
     *
     * @return ?string
     */
    public function getAdminUser() : ?string
    {
        return $this->getField('admin_user');
    }
}
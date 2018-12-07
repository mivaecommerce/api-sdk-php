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
 * Data model for OrderPayment.
 *
 * @package MerchantAPI\Model
 */
class OrderPayment extends \MerchantAPI\Model
{
    /** @var int ORDER_PAYMENT_TYPE_DECLINED */
    const ORDER_PAYMENT_TYPE_DECLINED = 0;

    /** @var int ORDER_PAYMENT_TYPE_LEGACY_AUTH */
    const ORDER_PAYMENT_TYPE_LEGACY_AUTH = 1;

    /** @var int ORDER_PAYMENT_TYPE_LEGACY_CAPTURE */
    const ORDER_PAYMENT_TYPE_LEGACY_CAPTURE = 2;

    /** @var int ORDER_PAYMENT_TYPE_AUTH */
    const ORDER_PAYMENT_TYPE_AUTH = 3;

    /** @var int ORDER_PAYMENT_TYPE_CAPTURE */
    const ORDER_PAYMENT_TYPE_CAPTURE = 4;

    /** @var int ORDER_PAYMENT_TYPE_AUTH_CAPTURE */
    const ORDER_PAYMENT_TYPE_AUTH_CAPTURE = 5;

    /** @var int ORDER_PAYMENT_TYPE_REFUND */
    const ORDER_PAYMENT_TYPE_REFUND = 6;

    /** @var int ORDER_PAYMENT_TYPE_VOID */
    const ORDER_PAYMENT_TYPE_VOID = 7;

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
     * Get order_id.
     *
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->getField('order_id', 0);
    }

    /**
     * Get type.
     *
     * @return int
     */
    public function getType()
    {
        return (int) $this->getField('type', 0);
    }

    /**
     * Get refnum.
     *
     * @return string
     */
    public function getReferenceNumber()
    {
        return $this->getField('refnum');
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
     * Get formatted_amount.
     *
     * @return string
     */
    public function getFormattedAmount()
    {
        return $this->getField('formatted_amount');
    }

    /**
     * Get available.
     *
     * @return float
     */
    public function getAvailable()
    {
        return (float) $this->getField('available', 0.00);
    }

    /**
     * Get formatted_available.
     *
     * @return string
     */
    public function getFormattedAvailable()
    {
        return $this->getField('formatted_available');
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
     * Get expires.
     *
     * @return string
     */
    public function getExpires()
    {
        return $this->getField('expires');
    }

    /**
     * Get pay_id.
     *
     * @return int
     */
    public function getPaymentId()
    {
        return (int) $this->getField('pay_id', 0);
    }

    /**
     * Get pay_secid.
     *
     * @return int
     */
    public function getPaymentSecId()
    {
        return (int) $this->getField('pay_secid', 0);
    }

    /**
     * Get decrypt_status.
     *
     * @return string
     */
    public function getDecryptStatus()
    {
        return $this->getField('decrypt_status');
    }

    /**
     * Get decrypt_error.
     *
     * @return string
     */
    public function getDecryptError()
    {
        return $this->getField('decrypt_error');
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('description');
    }

    /**
     * Get data.
     *
     * @return array
     */
    public function getPaymentData()
    {
        return $this->getField('data', []);
    }
}
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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
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
     * Get type.
     *
     * @return ?int
     */
    public function getType() : ?int
    {
        return $this->getField('type');
    }

    /**
     * Get refnum.
     *
     * @return ?string
     */
    public function getReferenceNumber() : ?string
    {
        return $this->getField('refnum');
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
     * Get formatted_amount.
     *
     * @return ?string
     */
    public function getFormattedAmount() : ?string
    {
        return $this->getField('formatted_amount');
    }

    /**
     * Get available.
     *
     * @return ?float
     */
    public function getAvailable() : ?float
    {
        return $this->getField('available');
    }

    /**
     * Get formatted_available.
     *
     * @return ?string
     */
    public function getFormattedAvailable() : ?string
    {
        return $this->getField('formatted_available');
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
     * Get expires.
     *
     * @return ?int
     */
    public function getExpires() : ?int
    {
        return $this->getTimestampField('expires');
    }

    /**
     * Get pay_id.
     *
     * @return ?int
     */
    public function getPaymentId() : ?int
    {
        return $this->getField('pay_id');
    }

    /**
     * Get pay_secid.
     *
     * @return ?int
     */
    public function getPaymentSecId() : ?int
    {
        return $this->getField('pay_secid');
    }

    /**
     * Get decrypt_status.
     *
     * @return ?string
     */
    public function getDecryptStatus() : ?string
    {
        return $this->getField('decrypt_status');
    }

    /**
     * Get decrypt_error.
     *
     * @return ?string
     */
    public function getDecryptError() : ?string
    {
        return $this->getField('decrypt_error');
    }

    /**
     * Get description.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('description');
    }

    /**
     * Get data.
     *
     * @return ?array
     */
    public function getPaymentData() : ?array
    {
        return $this->getField('data');
    }

    /**
     * Get ip.
     *
     * @return ?string
     */
    public function getIp() : ?string
    {
        return $this->getField('ip');
    }
}
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
 * Data model for OrderReturn.
 *
 * @package MerchantAPI\Model
 */
class OrderReturn extends \MerchantAPI\Model
{
    /** @var int ORDER_RETURN_STATUS_ISSUED */
    const ORDER_RETURN_STATUS_ISSUED = 500;

    /** @var int ORDER_RETURN_STATUS_RECEIVED */
    const ORDER_RETURN_STATUS_RECEIVED = 600;

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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get status.
     *
     * @return ?int
     */
    public function getStatus() : ?int
    {
        return $this->getField('status');
    }

    /**
     * Get dt_issued.
     *
     * @return ?int
     */
    public function getDateTimeIssued() : ?int
    {
        return $this->getTimestampField('dt_issued');
    }

    /**
     * Get dt_recvd.
     *
     * @return ?int
     */
    public function getDateTimeReceived() : ?int
    {
        return $this->getTimestampField('dt_recvd');
    }
}
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
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return (int) $this->getField('status', 0);
    }

    /**
     * Get dt_issued.
     *
     * @return int
     */
    public function getDateTimeIssued()
    {
        return (int) $this->getField('dt_issued', 0);
    }

    /**
     * Get dt_recvd.
     *
     * @return int
     */
    public function getDateTimeReceived()
    {
        return (int) $this->getField('dt_recvd', 0);
    }
}
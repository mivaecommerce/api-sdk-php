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
 * Data model for OrderShipment.
 *
 * @package MerchantAPI\Model
 */
class OrderShipment extends \MerchantAPI\Model
{
    /** @var int ORDER_SHIPMENT_STATUS_PENDING */
    const ORDER_SHIPMENT_STATUS_PENDING = 0;

    /** @var int ORDER_SHIPMENT_STATUS_PICKING */
    const ORDER_SHIPMENT_STATUS_PICKING = 100;

    /** @var int ORDER_SHIPMENT_STATUS_SHIPPED */
    const ORDER_SHIPMENT_STATUS_SHIPPED = 200;

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
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get batch_id.
     *
     * @return int
     */
    public function getBatchId()
    {
        return (int) $this->getField('batch_id', 0);
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
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return (int) $this->getField('status', 0);
    }

    /**
     * Get labelcount.
     *
     * @return int
     */
    public function getLabelCount()
    {
        return (int) $this->getField('labelcount', 0);
    }

    /**
     * Get ship_date.
     *
     * @return int
     */
    public function getShipDate()
    {
        return (int) $this->getField('ship_date', 0);
    }

    /**
     * Get tracknum.
     *
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->getField('tracknum');
    }

    /**
     * Get tracktype.
     *
     * @return string
     */
    public function getTrackingType()
    {
        return $this->getField('tracktype');
    }

    /**
     * Get tracklink.
     *
     * @return string
     */
    public function getTrackingLink()
    {
        return $this->getField('tracklink');
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return (float) $this->getField('weight', 0.00);
    }

    /**
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
    }

    /**
     * Get formatted_cost.
     *
     * @return string
     */
    public function getFormattedCost()
    {
        return $this->getField('formatted_cost');
    }
}
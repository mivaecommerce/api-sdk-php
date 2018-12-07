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

    /**
     * Set id.
     *
     * @param int
     * @return $this
     */
    public function setId($id)
    {
        return $this->setField('id', $id);
    }

    /**
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set batch_id.
     *
     * @param int
     * @return $this
     */
    public function setBatchId($batchId)
    {
        return $this->setField('batch_id', $batchId);
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
     * Set status.
     *
     * @param int
     * @return $this
     */
    public function setStatus($status)
    {
        return $this->setField('status', $status);
    }

    /**
     * Set labelcount.
     *
     * @param int
     * @return $this
     */
    public function setLabelCount($labelCount)
    {
        return $this->setField('labelcount', $labelCount);
    }

    /**
     * Set ship_date.
     *
     * @param int
     * @return $this
     */
    public function setShipDate($shipDate)
    {
        return $this->setField('ship_date', $shipDate);
    }

    /**
     * Set tracknum.
     *
     * @param string
     * @return $this
     */
    public function setTrackingNumber($trackingNumber)
    {
        return $this->setField('tracknum', $trackingNumber);
    }

    /**
     * Set tracktype.
     *
     * @param string
     * @return $this
     */
    public function setTrackingType($trackingType)
    {
        return $this->setField('tracktype', $trackingType);
    }

    /**
     * Set tracklink.
     *
     * @param string
     * @return $this
     */
    public function setTrackingLink($trackingLink)
    {
        return $this->setField('tracklink', $trackingLink);
    }

    /**
     * Set weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        return $this->setField('weight', $weight);
    }

    /**
     * Set cost.
     *
     * @param float
     * @return $this
     */
    public function setCost($cost)
    {
        return $this->setField('cost', $cost);
    }
}
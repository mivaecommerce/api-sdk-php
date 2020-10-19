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
 * Data model for OrderShipmentUpdate.
 *
 * @package MerchantAPI\Model
 */
class OrderShipmentUpdate extends \MerchantAPI\Model
{
    /**
     * Get shpmnt_id.
     *
     * @return int
     */
    public function getShipmentId()
    {
        return (int) $this->getField('shpmnt_id', 0);
    }

    /**
     * Get mark_shipped.
     *
     * @return bool
     */
    public function getMarkShipped()
    {
        return (bool) $this->getField('mark_shipped', false);
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
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
    }

    /**
     * Set shpmnt_id.
     *
     * @param int
     * @return $this
     */
    public function setShipmentId($shipmentId)
    {
        return $this->setField('shpmnt_id', $shipmentId);
    }

    /**
     * Set mark_shipped.
     *
     * @param bool
     * @return $this
     */
    public function setMarkShipped($markShipped)
    {
        return $this->setField('mark_shipped', $markShipped);
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
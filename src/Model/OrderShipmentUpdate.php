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
     * @return ?int
     */
    public function getShipmentId() : ?int
    {
        return $this->getField('shpmnt_id');
    }

    /**
     * Get mark_shipped.
     *
     * @return ?bool
     */
    public function getMarkShipped() : ?bool
    {
        return $this->getField('mark_shipped');
    }

    /**
     * Get tracknum.
     *
     * @return ?string
     */
    public function getTrackingNumber() : ?string
    {
        return $this->getField('tracknum');
    }

    /**
     * Get tracktype.
     *
     * @return ?string
     */
    public function getTrackingType() : ?string
    {
        return $this->getField('tracktype');
    }

    /**
     * Get cost.
     *
     * @return ?float
     */
    public function getCost() : ?float
    {
        return $this->getField('cost');
    }

    /**
     * Set shpmnt_id.
     *
     * @param ?int $shipmentId
     * @return $this
     */
    public function setShipmentId(?int $shipmentId) : self
    {
        return $this->setField('shpmnt_id', $shipmentId);
    }

    /**
     * Set mark_shipped.
     *
     * @param ?bool $markShipped
     * @return $this
     */
    public function setMarkShipped(?bool $markShipped) : self
    {
        return $this->setField('mark_shipped', $markShipped);
    }

    /**
     * Set tracknum.
     *
     * @param ?string $trackingNumber
     * @return $this
     */
    public function setTrackingNumber(?string $trackingNumber) : self
    {
        return $this->setField('tracknum', $trackingNumber);
    }

    /**
     * Set tracktype.
     *
     * @param ?string $trackingType
     * @return $this
     */
    public function setTrackingType(?string $trackingType) : self
    {
        return $this->setField('tracktype', $trackingType);
    }

    /**
     * Set cost.
     *
     * @param ?float $cost
     * @return $this
     */
    public function setCost(?float $cost) : self
    {
        return $this->setField('cost', $cost);
    }
}
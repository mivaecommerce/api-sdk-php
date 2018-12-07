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

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\OrderShipmentUpdate;

/**
 * Handles API Request OrderShipmentList_Update.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordershipmentlist_update
 */
class OrderShipmentListUpdate extends Request
{
    /** @var string The API function name */
    protected $function = 'OrderShipmentList_Update';

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderShipmentUpdate[] */
    protected $shipmentUpdates = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->shipmentUpdates = new \MerchantAPI\Collection();
    }

    /**
     * Get Shipment_Updates.
     *
     * @return \MerchantAPI\Model\OrderShipmentUpdate[]
     */
    public function getShipmentUpdates()
    {
        return $this->shipmentUpdates;
    }

    /**
     * Set Shipment_Updates.
     *
     * @param (\MerchantAPI\Model\OrderShipmentUpdate|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setShipmentUpdates(array $shipmentUpdates)
    {
        foreach ($shipmentUpdates as &$model) {
            if (is_array($model)) {
                $model = new OrderShipmentUpdate($model);
            } else if (!$model instanceof OrderShipmentUpdate) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderShipmentUpdate or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->shipmentUpdates = $shipmentUpdates;

        return $this;
    }

    /**
     * Add Shipment_Updates.
     *
     * @param \MerchantAPI\Model\OrderShipmentUpdate
     *
     * @return $this
     */
    public function addShipmentUpdate(OrderShipmentUpdate $model)
    {
        $this->shipmentUpdates[] = $model;
        return $this;
    }

    /**
     * Add many OrderShipmentUpdate.
     *
     * @param (\MerchantAPI\Model\OrderShipmentUpdate|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addShipmentUpdates(array $shipmentUpdates)
    {
        foreach ($shipmentUpdates as $e) {
            if (is_array($e)) {
                $this->shipmentUpdates[] = new OrderShipmentUpdate($e);
            } else if ($e instanceof OrderShipmentUpdate) {
                $this->shipmentUpdates[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderShipmentUpdate or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if (count($this->getShipmentUpdates())) {
            $data['Shipment_Updates'] = [];

            foreach ($this->getShipmentUpdates() as $i => $shipmentUpdate) {
                $data['Shipment_Updates'][] = $shipmentUpdate->getData();
            }
        }

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderShipmentListUpdate($this, $httpResponse, $data);
    }
}
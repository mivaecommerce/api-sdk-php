<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\OrderShipmentUpdate;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderShipmentList_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordershipmentlist_update
 */
class OrderShipmentListUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderShipmentList_Update';

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderShipmentUpdate[] */
    protected $shipmentUpdates = [];

    /**
     * Constructor.
     */
    public function __construct(BaseClient $client = null)
    {
        parent::__construct($client);
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

        $this->shipmentUpdates = new \MerchantAPI\Collection($shipmentUpdates);

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
        $data = parent::toArray();

        if (count($this->getShipmentUpdates())) {
            $data['Shipment_Updates'] = [];

            foreach ($this->getShipmentUpdates() as $i => $shipmentUpdate) {
                $data['Shipment_Updates'][] = $shipmentUpdate->getData();
            }
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
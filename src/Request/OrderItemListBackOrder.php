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
use MerchantAPI\Model\OrderItem;
use MerchantAPI\Model\Order;

/**
 * Handles API Request OrderItemList_BackOrder.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitemlist_backorder
 */
class OrderItemListBackOrder extends Request
{
    /** @var string The API function name */
    protected $function = 'OrderItemList_BackOrder';

    /** @var int */
    protected $orderId;

    /** @var int[] */
    protected $lineIds = [];

    /** @var int */
    protected $dateInStock;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(Order $order = null)
    {
        if ($order) {
            if ($order->getId()) {
                $this->setOrderId($order->getId());
            }
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get Line_IDs.
     *
     * @return array
     */
    public function getLineIds()
    {
        return $this->lineIds;
    }

    /**
     * Get Date_InStock.
     *
     * @return int
     */
    public function getDateInStock()
    {
        return $this->dateInStock;
    }

    /**
     * Set Order_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Date_InStock.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateInStock($dateInStock)
    {
        if ($dateInStock instanceof \DateTime) {
            $this->dateInStock = $dateInStock->getTimestamp();
        } else {
            $this->dateInStock = $dateInStock;
        }

        return $this;
    }

    /**
     * Add Line_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addLineId($lineId)
    {
        $this->lineIds[] = $lineId;
        return $this;
    }

    /**
     * Add OrderItem model.
     *
     * @param \MerchantAPI\Model\OrderItem
     * @return $this
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        if ($orderItem->getLineId()) {
            $this->lineIds[] = $orderItem->getLineId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if ($this->getOrderId()) {
            $data['Order_ID'] = $this->getOrderId();
        }

        $data['Line_IDs'] = $this->getLineIds();

        if (!is_null($this->getDateInStock())) {
            $data['Date_InStock'] = $this->getDateInStock();
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
        return new \MerchantAPI\Response\OrderItemListBackOrder($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\OrderItem;
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderItemList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitemlist_delete
 */
class OrderItemListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderItemList_Delete';

    /** @var int */
    protected $orderId;

    /** @var int[] */
    protected $lineIds = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(BaseClient $client = null, Order $order = null)
    {
        parent::__construct($client);
        if ($order) {
            $this->setOrderId($order->getId());
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
        $data = parent::toArray();

        $data['Order_ID'] = $this->getOrderId();

        $data['Line_IDs'] = $this->getLineIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderItemListDelete($this, $httpResponse, $data);
    }
}
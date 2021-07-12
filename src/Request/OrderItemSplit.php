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
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderItem_Split.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitem_split
 */
class OrderItemSplit extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderItem_Split';

    /** @var int */
    protected $orderId;

    /** @var int */
    protected $lineId;

    /** @var int */
    protected $quantity;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\OrderItem
     */
    public function __construct(BaseClient $client = null, OrderItem $orderItem = null)
    {
        parent::__construct($client);
        if ($orderItem) {
            if ($orderItem->getOrderId()) {
                $this->setOrderId($orderItem->getOrderId());
            }

            if ($orderItem->getLineId()) {
                $this->setLineId($orderItem->getLineId());
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
     * Get Line_ID.
     *
     * @return int
     */
    public function getLineId()
    {
        return $this->lineId;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
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
     * Set Line_ID.
     *
     * @param int
     * @return $this
     */
    public function setLineId($lineId)
    {
        $this->lineId = $lineId;

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param int
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getOrderId()) {
            $data['Order_ID'] = $this->getOrderId();
        }

        if ($this->getLineId()) {
            $data['Line_ID'] = $this->getLineId();
        }

        $data['Quantity'] = $this->getQuantity();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderItemSplit($this, $httpResponse, $data);
    }
}
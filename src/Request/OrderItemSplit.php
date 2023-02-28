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
use MerchantAPI\Model\SplitOrderItem;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderItem_Split';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var ?int */
    protected ?int $lineId = null;

    /** @var ?int */
    protected ?int $quantity = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\OrderItem $orderItem
     */
    public function __construct(?BaseClient $client = null, ?OrderItem $orderItem = null)
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
    public function getOrderId() : ?int
    {
        return $this->orderId;
    }

    /**
     * Get Line_ID.
     *
     * @return int
     */
    public function getLineId() : ?int
    {
        return $this->lineId;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity() : ?int
    {
        return $this->quantity;
    }

    /**
     * Set Order_ID.
     *
     * @param ?int $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId) : self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Line_ID.
     *
     * @param ?int $lineId
     * @return $this
     */
    public function setLineId(?int $lineId) : self
    {
        $this->lineId = $lineId;

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param ?int $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity) : self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderItemSplit($this, $httpResponse, $data);
    }
}
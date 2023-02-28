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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request OrderItemList_Cancel.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitemlist_cancel
 */
class OrderItemListCancel extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderItemList_Cancel';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var int[] */
    protected array $lineIds = [];

    /** @var ?string */
    protected ?string $reason = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
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
    public function getOrderId() : ?int
    {
        return $this->orderId;
    }

    /**
     * Get Line_IDs.
     *
     * @return array
     */
    public function getLineIds() : array
    {
        return $this->lineIds;
    }

    /**
     * Get Reason.
     *
     * @return string
     */
    public function getReason() : ?string
    {
        return $this->reason;
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
     * Set Reason.
     *
     * @param ?string $reason
     * @return $this
     */
    public function setReason(?string $reason) : self
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Add Line_IDs.
     *
     * @param int $lineId
     * @return $this
     */
    public function addLineId(int $lineId) : self
    {
        $this->lineIds[] = $lineId;
        return $this;
    }

    /**
     * Add OrderItem model.
     *
     * @param \MerchantAPI\Model\OrderItem $orderItem
     * @return $this
     */
    public function addOrderItem(OrderItem $orderItem) : self
    {
        if ($orderItem->getLineId()) {
            $this->lineIds[] = $orderItem->getLineId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Order_ID'] = $this->getOrderId();

        $data['Line_IDs'] = $this->getLineIds();

        if (!is_null($this->getReason())) {
            $data['Reason'] = $this->getReason();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderItemListCancel($this, $httpResponse, $data);
    }
}
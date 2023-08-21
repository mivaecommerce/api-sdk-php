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
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request OrderList_Archive.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderlist_archive
 */
class OrderListArchive extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderList_Archive';

    /** @var ?bool */
    protected ?bool $deletePaymentData = null;

    /** @var ?bool */
    protected ?bool $deleteShippingLabels = null;

    /** @var int[] */
    protected array $orderIds = [];

    /**
     * Get Delete_Payment_Data.
     *
     * @return bool
     */
    public function getDeletePaymentData() : ?bool
    {
        return $this->deletePaymentData;
    }

    /**
     * Get Delete_Shipping_Labels.
     *
     * @return bool
     */
    public function getDeleteShippingLabels() : ?bool
    {
        return $this->deleteShippingLabels;
    }

    /**
     * Get Order_IDs.
     *
     * @return array
     */
    public function getOrderIds() : array
    {
        return $this->orderIds;
    }

    /**
     * Set Delete_Payment_Data.
     *
     * @param ?bool $deletePaymentData
     * @return $this
     */
    public function setDeletePaymentData(?bool $deletePaymentData) : self
    {
        $this->deletePaymentData = $deletePaymentData;

        return $this;
    }

    /**
     * Set Delete_Shipping_Labels.
     *
     * @param ?bool $deleteShippingLabels
     * @return $this
     */
    public function setDeleteShippingLabels(?bool $deleteShippingLabels) : self
    {
        $this->deleteShippingLabels = $deleteShippingLabels;

        return $this;
    }

    /**
     * Add Order_IDs.
     *
     * @param int $orderId
     * @return $this
     */
    public function addOrderId(int $orderId) : self
    {
        $this->orderIds[] = $orderId;
        return $this;
    }

    /**
     * Add Order model.
     *
     * @param \MerchantAPI\Model\Order $order
     * @return $this
     */
    public function addOrder(Order $order) : self
    {
        if ($order->getId()) {
            $this->orderIds[] = $order->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if (!is_null($this->getDeletePaymentData())) {
            $data['Delete_Payment_Data'] = $this->getDeletePaymentData();
        }

        if (!is_null($this->getDeleteShippingLabels())) {
            $data['Delete_Shipping_Labels'] = $this->getDeleteShippingLabels();
        }

        $data['Order_IDs'] = $this->getOrderIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderListArchive($this, $httpResponse, $data);
    }
}
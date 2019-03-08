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
use MerchantAPI\Model\Order;
use MerchantAPI\Model\PaymentMethod;

/**
 * Handles API Request PaymentMethodList_Load.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/paymentmethodlist_load
 */
class PaymentMethodListLoad extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PaymentMethodList_Load';

    /** @var int */
    protected $orderId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(Order $order = null)
    {
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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if (!is_null($this->getOrderId())) {
            $data['Order_ID'] = $this->getOrderId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PaymentMethodListLoad($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\OrderPayment;
use MerchantAPI\Model\OrderPaymentTotal;

/**
 * Handles API Request OrderPayment_VOID.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderpayment_void
 */
class OrderPaymentVoid extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderPayment_VOID';

    /** @var int */
    protected $orderPaymentId;

    /** @var float */
    protected $amount;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\OrderPayment
     */
    public function __construct(OrderPayment $orderPayment = null)
    {
        if ($orderPayment) {
            $this->setOrderPaymentId($orderPayment->getId());
        }
    }

    /**
     * Get OrderPayment_ID.
     *
     * @return int
     */
    public function getOrderPaymentId()
    {
        return $this->orderPaymentId;
    }

    /**
     * Get Amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set OrderPayment_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderPaymentId($orderPaymentId)
    {
        $this->orderPaymentId = $orderPaymentId;

        return $this;
    }

    /**
     * Set Amount.
     *
     * @param float
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['OrderPayment_ID'] = $this->getOrderPaymentId();

        if (!is_null($this->getAmount())) {
            $data['Amount'] = $this->getAmount();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderPaymentVoid($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\OrderPayment;
use MerchantAPI\Model\OrderPaymentTotal;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderPayment_Capture.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderpayment_capture
 */
class OrderPaymentCapture extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderPayment_Capture';

    /** @var int */
    protected $orderPaymentId;

    /** @var float */
    protected $amount;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\OrderPayment
     */
    public function __construct(BaseClient $client = null, OrderPayment $orderPayment = null)
    {
        parent::__construct($client);
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
        return new \MerchantAPI\Response\OrderPaymentCapture($this, $httpResponse, $data);
    }
}
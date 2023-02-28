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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderPayment_VOID';

    /** @var ?int */
    protected ?int $orderPaymentId = null;

    /** @var ?float */
    protected ?float $amount = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\OrderPayment $orderPayment
     */
    public function __construct(?BaseClient $client = null, ?OrderPayment $orderPayment = null)
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
    public function getOrderPaymentId() : ?int
    {
        return $this->orderPaymentId;
    }

    /**
     * Get Amount.
     *
     * @return float
     */
    public function getAmount() : ?float
    {
        return $this->amount;
    }

    /**
     * Set OrderPayment_ID.
     *
     * @param ?int $orderPaymentId
     * @return $this
     */
    public function setOrderPaymentId(?int $orderPaymentId) : self
    {
        $this->orderPaymentId = $orderPaymentId;

        return $this;
    }

    /**
     * Set Amount.
     *
     * @param ?float $amount
     * @return $this
     */
    public function setAmount(?float $amount) : self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderPaymentVoid($this, $httpResponse, $data);
    }
}
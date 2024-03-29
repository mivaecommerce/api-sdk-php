<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\OrderPaymentTotal;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OrderPayment_Capture.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/orderpayment_capture
 */
class OrderPaymentCapture extends Response
{
    /** @var ?\MerchantAPI\Model\OrderPaymentTotal */
    protected ?OrderPaymentTotal $orderPaymentTotal = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderPaymentTotal = new OrderPaymentTotal($this->data['data']);
    }

    /**
     * Get orderPaymentTotal.
     *
     * @return \MerchantAPI\Model\OrderPaymentTotal|null
     */
    public function getOrderPaymentTotal() : ?OrderPaymentTotal
    {
        return $this->orderPaymentTotal;
    }
}
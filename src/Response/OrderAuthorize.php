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

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\OrderPaymentAuthorize;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Order_Authorize.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/order_authorize
 */
class OrderAuthorize extends Response
{
    /** @var \MerchantAPI\Model\OrderPaymentAuthorize */
    protected $orderPaymentAuthorize;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderPaymentAuthorize = new OrderPaymentAuthorize($this->data['data']);
    }

    /**
     * Get orderPaymentAuthorize.
     *
     * @return \MerchantAPI\Model\OrderPaymentAuthorize|null
     */
    public function getOrderPaymentAuthorize()
    {
        return $this->orderPaymentAuthorize;
    }
}
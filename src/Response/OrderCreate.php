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
use MerchantAPI\Model\Order;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Order_Create.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/order_create
 */
class OrderCreate extends Response
{
    /** @var \MerchantAPI\Model\Order */
    protected $order;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->order = new Order($this->data['data']);
    }

    /**
     * Get order.
     *
     * @return \MerchantAPI\Model\Order|null
     */
    public function getOrder()
    {
        return $this->order;
    }
}
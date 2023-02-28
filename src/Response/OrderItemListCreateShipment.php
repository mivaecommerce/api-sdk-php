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
use MerchantAPI\Model\OrderShipment;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OrderItemList_CreateShipment.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/orderitemlist_createshipment
 */
class OrderItemListCreateShipment extends Response
{
    /** @var ?\MerchantAPI\Model\OrderShipment */
    protected ?OrderShipment $orderShipment = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderShipment = new OrderShipment($this->data['data']);
    }

    /**
     * Get orderShipment.
     *
     * @return \MerchantAPI\Model\OrderShipment|null
     */
    public function getOrderShipment() : ?OrderShipment
    {
        return $this->orderShipment;
    }
}
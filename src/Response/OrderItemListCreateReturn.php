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
use MerchantAPI\Model\OrderReturn;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OrderItemList_CreateReturn.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/orderitemlist_createreturn
 */
class OrderItemListCreateReturn extends Response
{
    /** @var ?\MerchantAPI\Model\OrderReturn */
    protected ?OrderReturn $orderReturn = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderReturn = new OrderReturn($this->data['data']);
    }

    /**
     * Get orderReturn.
     *
     * @return \MerchantAPI\Model\OrderReturn|null
     */
    public function getOrderReturn() : ?OrderReturn
    {
        return $this->orderReturn;
    }
}
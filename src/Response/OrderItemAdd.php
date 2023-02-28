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
use MerchantAPI\Model\OrderTotalAndItem;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OrderItem_Add.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/orderitem_add
 */
class OrderItemAdd extends Response
{
    /** @var ?\MerchantAPI\Model\OrderTotalAndItem */
    protected ?OrderTotalAndItem $orderTotalAndItem = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderTotalAndItem = new OrderTotalAndItem($this->data['data']);
    }

    /**
     * Get orderTotalAndItem.
     *
     * @return \MerchantAPI\Model\OrderTotalAndItem|null
     */
    public function getOrderTotalAndItem() : ?OrderTotalAndItem
    {
        return $this->orderTotalAndItem;
    }
}
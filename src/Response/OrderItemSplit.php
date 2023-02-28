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
use MerchantAPI\Model\SplitOrderItem;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OrderItem_Split.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/orderitem_split
 */
class OrderItemSplit extends Response
{
    /** @var ?\MerchantAPI\Model\SplitOrderItem */
    protected ?SplitOrderItem $splitOrderItem = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->splitOrderItem = new SplitOrderItem($this->data['data']);
    }

    /**
     * Get splitOrderItem.
     *
     * @return \MerchantAPI\Model\SplitOrderItem|null
     */
    public function getSplitOrderItem() : ?SplitOrderItem
    {
        return $this->splitOrderItem;
    }
}
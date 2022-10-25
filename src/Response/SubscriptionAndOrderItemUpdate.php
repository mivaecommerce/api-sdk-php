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
use MerchantAPI\Model\OrderTotal;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for SubscriptionAndOrderItem_Update.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/subscriptionandorderitem_update
 */
class SubscriptionAndOrderItemUpdate extends Response
{
    /** @var \MerchantAPI\Model\OrderTotal */
    protected $orderTotal;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->orderTotal = new OrderTotal($this->data['data']);
    }

    /**
     * Get orderTotal.
     *
     * @return \MerchantAPI\Model\OrderTotal|null
     */
    public function getOrderTotal()
    {
        return $this->orderTotal;
    }
}
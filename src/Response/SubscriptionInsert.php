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
use MerchantAPI\Model\Subscription;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Subscription_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/subscription_insert
 */
class SubscriptionInsert extends Response
{
    /** @var \MerchantAPI\Model\Subscription */
    protected $subscription;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->subscription = new Subscription($this->data['data']);
    }

    /**
     * Get subscription.
     *
     * @return \MerchantAPI\Model\Subscription|null
     */
    public function getSubscription()
    {
        return $this->subscription;
    }
}
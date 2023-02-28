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

use MerchantAPI\ListQuery\ListQueryResponse;
use MerchantAPI\Model\Subscription;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for SubscriptionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/subscriptionlist_load_query
 */
class SubscriptionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $subscriptions;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->subscriptions = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->subscriptions[] = new Subscription($result);
            }
        }
    }

    /**
     * Get subscriptions.
     *
     * @return \MerchantAPI\Collection
     */
    public function getSubscriptions() : Collection
    {
        return $this->subscriptions;
    }
}
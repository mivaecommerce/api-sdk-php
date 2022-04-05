<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Subscription;
use MerchantAPI\BaseClient;

/**
 * Handles API Request SubscriptionList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/subscriptionlist_delete
 */
class SubscriptionListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'SubscriptionList_Delete';

    /** @var int[] */
    protected $subscriptionIds = [];

    /**
     * Get Subscription_IDs.
     *
     * @return array
     */
    public function getSubscriptionIds()
    {
        return $this->subscriptionIds;
    }

    /**
     * Add Subscription_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addSubscriptionId($subscriptionId)
    {
        $this->subscriptionIds[] = $subscriptionId;
        return $this;
    }

    /**
     * Add Subscription model.
     *
     * @param \MerchantAPI\Model\Subscription
     * @return $this
     */
    public function addSubscription(Subscription $subscription)
    {
        if ($subscription->getId()) {
            $this->subscriptionIds[] = $subscription->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Subscription_IDs'] = $this->getSubscriptionIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\SubscriptionListDelete($this, $httpResponse, $data);
    }
}
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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\ProductAndSubscriptionTerm;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ProductAndSubscriptionTermList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productandsubscriptiontermlist_load_query
 */
class ProductAndSubscriptionTermListLoadQuery extends ProductListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductAndSubscriptionTermList_Load_Query';

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductAndSubscriptionTermListLoadQuery($this, $httpResponse, $data);
    }
}
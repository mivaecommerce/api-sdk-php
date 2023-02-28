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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request URIList_Load_Query.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/urilist_load_query
 */
class URIListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected string $function = 'URIList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'uri',
        'screen',
        'status',
        'canonical',
        'store_name',
        'page_code',
        'page_name',
        'category_code',
        'category_name',
        'product_code',
        'product_sku',
        'product_name',
        'feed_code',
        'feed_name',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'uri',
        'screen',
        'status',
        'canonical',
        'store_name',
        'page_code',
        'page_name',
        'category_code',
        'category_name',
        'product_code',
        'product_sku',
        'product_name',
        'feed_code',
        'feed_name',
    ];

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
        return new \MerchantAPI\Response\URIListLoadQuery($this, $httpResponse, $data);
    }
}
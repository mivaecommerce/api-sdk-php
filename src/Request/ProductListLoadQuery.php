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
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ProductList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productlist_load_query
 */
class ProductListLoadQuery extends ListQueryRequest
{
    /** @var string PRODUCT_SHOW_ALL */
    const PRODUCT_SHOW_ALL = 'All';

    /** @var string PRODUCT_SHOW_UNCATEGORIZED */
    const PRODUCT_SHOW_UNCATEGORIZED = 'Uncategorized';

    /** @var string PRODUCT_SHOW_ACTIVE */
    const PRODUCT_SHOW_ACTIVE = 'Active';

    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'code',
        'sku',
        'cancat_code',
        'page_code',
        'name',
        'thumbnail',
        'image',
        'price',
        'cost',
        'descrip',
        'weight',
        'taxable',
        'active',
        'page_title',
        'dt_created',
        'dt_updated',
        'category',
        'product_inventory',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'code',
        'sku',
        'cancat_code',
        'page_code',
        'name',
        'thumbnail',
        'image',
        'price',
        'cost',
        'descrip',
        'weight',
        'taxable',
        'active',
        'page_title',
        'dt_created',
        'dt_updated',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'descrip',
        'catcount',
        'cancat_code',
        'page_code',
        'product_inventory',
        'productinventorysettings',
        'attributes',
        'productimagedata',
        'categories',
        'productshippingrules',
        'relatedproducts',
        'uris',
        'url',
        'subscriptionsettings',
        'subscriptionterms',
    ];

    /** @var array Requests available on custom filters */
    protected array $availableCustomFilters = [
        'Product_Show' => [
            self::PRODUCT_SHOW_ALL,
            self::PRODUCT_SHOW_UNCATEGORIZED,
            self::PRODUCT_SHOW_ACTIVE,
        ],
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
        return new \MerchantAPI\Response\ProductListLoadQuery($this, $httpResponse, $data);
    }
}
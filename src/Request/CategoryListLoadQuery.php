<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;

/**
 * Handles API Request CategoryList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categorylist_load_query
 */
class CategoryListLoadQuery extends ListQueryRequest
{
    /** @var string CATEGORY_SHOW_ALL */
    const CATEGORY_SHOW_ALL = 'All';

    /** @var string CATEGORY_SHOW_ACTIVE */
    const CATEGORY_SHOW_ACTIVE = 'Active';

    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CategoryList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'code',
        'name',
        'page_title',
        'parent_category',
        'page_code',
        'dt_created',
        'dt_updated',
        'depth',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'code',
        'name',
        'page_title',
        'active',
        'page_code',
        'parent_category',
        'disp_order',
        'dt_created',
        'dt_updated',
        'depth',
    ];

    /** @var array Requests available on custom filters */
    protected $availableCustomFilters = [
        'Category_Show' => [
            self::CATEGORY_SHOW_ALL,
            self::CATEGORY_SHOW_ACTIVE,
        ],
    ];

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryListLoadQuery($this, $httpResponse, $data);
    }
}
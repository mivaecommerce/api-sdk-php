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
use MerchantAPI\Model\Store;
use MerchantAPI\BaseClient;

/**
 * Handles API Request StoreList_Load_Query.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/storelist_load_query
 */
class StoreListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected $function = 'StoreList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'code',
        'license',
        'name',
        'owner',
        'email',
        'company',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'fax',
        'country',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'code',
        'license',
        'name',
        'owner',
        'email',
        'company',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'fax',
        'country',
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
        return new \MerchantAPI\Response\StoreListLoadQuery($this, $httpResponse, $data);
    }
}
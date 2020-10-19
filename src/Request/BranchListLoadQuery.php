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
use MerchantAPI\Model\Branch;
use MerchantAPI\BaseClient;

/**
 * Handles API Request BranchList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branchlist_load_query
 */
class BranchListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BranchList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'immutable',
        'branchkey',
        'name',
        'framework',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'immutable',
        'branchkey',
        'name',
        'framework',
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
        return new \MerchantAPI\Response\BranchListLoadQuery($this, $httpResponse, $data);
    }
}
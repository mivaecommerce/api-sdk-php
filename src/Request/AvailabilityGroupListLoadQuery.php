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
use MerchantAPI\Model\AvailabilityGroup;
use MerchantAPI\BaseClient;

/**
 * Handles API Request AvailabilityGroupList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygrouplist_load_query
 */
class AvailabilityGroupListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AvailabilityGroupList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'name',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'name',
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
        return new \MerchantAPI\Response\AvailabilityGroupListLoadQuery($this, $httpResponse, $data);
    }
}
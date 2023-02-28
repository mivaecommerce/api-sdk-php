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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PriceGroupList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegrouplist_load_query
 */
class PriceGroupListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroupList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'name',
        'type',
        'module_id',
        'custscope',
        'rate',
        'discount',
        'markup',
        'dt_start',
        'dt_end',
        'priority',
        'exclusion',
        'descrip',
        'display',
        'qmn_subtot',
        'qmx_subtot',
        'qmn_quan',
        'qmx_quan',
        'qmn_weight',
        'qmx_weight',
        'bmn_subtot',
        'bmx_subtot',
        'bmn_quan',
        'bmx_quan',
        'bmn_weight',
        'bmx_weight',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'name',
        'type',
        'module_id',
        'custscope',
        'rate',
        'discount',
        'markup',
        'dt_start',
        'dt_end',
        'priority',
        'exclusion',
        'descrip',
        'display',
        'qmn_subtot',
        'qmx_subtot',
        'qmn_quan',
        'qmx_quan',
        'qmn_weight',
        'qmx_weight',
        'bmn_subtot',
        'bmx_subtot',
        'bmn_quan',
        'bmx_quan',
        'bmn_weight',
        'bmx_weight',
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
        return new \MerchantAPI\Response\PriceGroupListLoadQuery($this, $httpResponse, $data);
    }
}
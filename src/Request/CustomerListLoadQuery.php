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
use MerchantAPI\Model\Customer;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CustomerList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customerlist_load_query
 */
class CustomerListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'login',
        'pw_email',
        'ship_fname',
        'ship_lname',
        'ship_email',
        'ship_comp',
        'ship_phone',
        'ship_fax',
        'ship_addr1',
        'ship_addr2',
        'ship_city',
        'ship_state',
        'ship_zip',
        'ship_cntry',
        'ship_res',
        'bill_fname',
        'bill_lname',
        'bill_email',
        'bill_comp',
        'bill_phone',
        'bill_fax',
        'bill_addr1',
        'bill_addr2',
        'bill_city',
        'bill_state',
        'bill_zip',
        'bill_cntry',
        'business_title',
        'note_count',
        'dt_created',
        'dt_login',
        'credit',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'login',
        'pw_email',
        'ship_fname',
        'ship_lname',
        'ship_email',
        'ship_comp',
        'ship_phone',
        'ship_fax',
        'ship_addr1',
        'ship_addr2',
        'ship_city',
        'ship_state',
        'ship_zip',
        'ship_cntry',
        'ship_res',
        'bill_fname',
        'bill_lname',
        'bill_email',
        'bill_comp',
        'bill_phone',
        'bill_fax',
        'bill_addr1',
        'bill_addr2',
        'bill_city',
        'bill_state',
        'bill_zip',
        'bill_cntry',
        'business_title',
        'note_count',
        'dt_created',
        'dt_login',
        'credit',
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
        return new \MerchantAPI\Response\CustomerListLoadQuery($this, $httpResponse, $data);
    }
}
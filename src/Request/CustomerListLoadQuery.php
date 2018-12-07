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
use MerchantAPI\Model\Customer;

/**
 * Handles API Request CustomerList_Load_Query.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customerlist_load_query
 */
class CustomerListLoadQuery extends ListQueryRequest
{
    /** @var string The API function name */
    protected $function = 'CustomerList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
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
    protected $availableSortFields = [
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
        return new \MerchantAPI\Response\CustomerListLoadQuery($this, $httpResponse, $data);
    }
}
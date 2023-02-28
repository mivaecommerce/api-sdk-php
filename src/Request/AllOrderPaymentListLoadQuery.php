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
use MerchantAPI\Model\AllOrderPayment;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AllOrderPaymentList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/allorderpaymentlist_load_query
 */
class AllOrderPaymentListLoadQuery extends OrderListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AllOrderPaymentList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'type',
        'refnum',
        'available',
        'expires,',
        'payment_ip',
        'amount',
        'payment_dtstamp',
        'id',
        'batch_id',
        'status',
        'pay_status',
        'orderdate',
        'dt_instock',
        'ship_res',
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
        'ship_data',
        'source',
        'source_id',
        'total',
        'total_ship',
        'total_tax',
        'total_auth',
        'total_capt',
        'total_rfnd',
        'net_capt',
        'pend_count',
        'bord_count',
        'cust_login',
        'cust_pw_email',
        'business_title',
        'note_count',
        'payment_module',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'type',
        'refnum',
        'available',
        'expires,',
        'payment_ip',
        'amount',
        'payment_dtstamp',
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
        return new \MerchantAPI\Response\AllOrderPaymentListLoadQuery($this, $httpResponse, $data);
    }
}
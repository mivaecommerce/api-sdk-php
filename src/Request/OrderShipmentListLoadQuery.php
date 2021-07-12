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
use MerchantAPI\Model\OrderShipment;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderShipmentList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordershipmentlist_load_query
 */
class OrderShipmentListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderShipmentList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'order_id',
        'code',
        'tracknum',
        'tracktype',
        'weight',
        'cost',
        'status',
        'ship_date',
        'batch_id',
        'order_batch_id',
        'order_pay_id',
        'order_status',
        'order_pay_status',
        'order_stk_status',
        'order_orderdate',
        'order_dt_instock',
        'order_cust_id',
        'order_ship_res',
        'order_ship_fname',
        'order_ship_lname',
        'order_ship_email',
        'order_ship_comp',
        'order_ship_phone',
        'order_ship_fax',
        'order_ship_addr1',
        'order_ship_addr2',
        'order_ship_city',
        'order_ship_state',
        'order_ship_zip',
        'order_ship_cntry',
        'order_bill_fname',
        'order_bill_lname',
        'order_bill_email',
        'order_bill_comp',
        'order_bill_phone',
        'order_bill_fax',
        'order_bill_addr1',
        'order_bill_addr2',
        'order_bill_city',
        'order_bill_state',
        'order_bill_zip',
        'order_bill_cntry',
        'order_ship_id',
        'order_ship_data',
        'order_source',
        'order_source_id',
        'order_total',
        'order_total_ship',
        'order_total_tax',
        'order_total_auth',
        'order_total_capt',
        'order_total_rfnd',
        'order_net_capt',
        'order_pend_count',
        'order_bord_count',
        'order_note_count',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'order_id',
        'code',
        'tracknum',
        'tracktype',
        'weight',
        'cost',
        'status',
        'ship_date',
        'batch_id',
        'order_batch_id',
        'order_pay_id',
        'order_status',
        'order_pay_status',
        'order_stk_status',
        'order_dt_instock',
        'order_orderdate',
        'order_cust_id',
        'order_ship_res',
        'order_ship_fname',
        'order_ship_lname',
        'order_ship_email',
        'order_ship_comp',
        'order_ship_phone',
        'order_ship_fax',
        'order_ship_addr1',
        'order_ship_addr2',
        'order_ship_city',
        'order_ship_state',
        'order_ship_zip',
        'order_ship_cntry',
        'order_bill_fname',
        'order_bill_lname',
        'order_bill_email',
        'order_bill_comp',
        'order_bill_phone',
        'order_bill_fax',
        'order_bill_addr1',
        'order_bill_addr2',
        'order_bill_city',
        'order_bill_state',
        'order_bill_zip',
        'order_bill_cntry',
        'order_ship_id',
        'order_ship_data',
        'order_source',
        'order_source_id',
        'order_total',
        'order_total_ship',
        'order_total_tax',
        'order_total_auth',
        'order_total_capt',
        'order_total_rfnd',
        'order_net_capt',
        'order_pend_count',
        'order_bord_count',
        'order_note_count',
    ];

    /** @var array Requests available on demand columns */
    protected $availableOnDemandColumns = [
        'items',
        'include_order',
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
        return new \MerchantAPI\Response\OrderShipmentListLoadQuery($this, $httpResponse, $data);
    }
}
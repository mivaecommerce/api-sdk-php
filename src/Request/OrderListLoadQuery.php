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
use MerchantAPI\Model\Order;

/**
 * Handles API Request OrderList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderlist_load_query
 */
class OrderListLoadQuery extends ListQueryRequest
{
    /** @var string PAY_STATUS_FILTER_AUTH_ONLY */
    const PAY_STATUS_FILTER_AUTH_ONLY = 'auth_0_capt';

    /** @var string PAY_STATUS_FILTER_PARTIAL_CAPTURE */
    const PAY_STATUS_FILTER_PARTIAL_CAPTURE = 'partial_capt';

    /** @var string PAY_STATUS_FILTER_CAPTURED_NOT_SHIPPED */
    const PAY_STATUS_FILTER_CAPTURED_NOT_SHIPPED = 'capt_not_ship';

    /** @var string PAY_STATUS_FILTER_SHIPPED_NOT_CAPTURED */
    const PAY_STATUS_FILTER_SHIPPED_NOT_CAPTURED = 'ship_not_capt';

    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
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
        'ship_id',
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
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
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

    /** @var array Requests available on demand columns */
    protected $availableOnDemandColumns = [
        'ship_method',
        'cust_login',
        'cust_pw_email',
        'business_title',
        'payment_module',
        'customer',
        'items',
        'charges',
        'coupons',
        'discounts',
        'payments',
        'notes',
    ];

    /** @var array Requests available on custom filters */
    protected $availableCustomFilters = [
        'Customer_ID' => 'int',
        'BusinessAccount_ID' => 'int',
        'pay_id' => 'int',
        'payment' => [
            self::PAY_STATUS_FILTER_AUTH_ONLY,
            self::PAY_STATUS_FILTER_PARTIAL_CAPTURE,
            self::PAY_STATUS_FILTER_CAPTURED_NOT_SHIPPED,
            self::PAY_STATUS_FILTER_SHIPPED_NOT_CAPTURED,
        ],
        'product_code' => 'string',
    ];

    /** @var string */
    protected $passphrase;

    /**
     * Get Passphrase.
     *
     * @return string
     */
    public function getPassphrase()
    {
        return $this->passphrase;
    }

    /**
     * Set Passphrase.
     *
     * @param string
     * @return $this
     */
    public function setPassphrase($passphrase)
    {
        $this->passphrase = $passphrase;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if (!is_null($this->getPassphrase())) {
            $data['Passphrase'] = $this->getPassphrase();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderListLoadQuery($this, $httpResponse, $data);
    }
}
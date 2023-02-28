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
use MerchantAPI\Model\Subscription;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request SubscriptionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/subscriptionlist_load_query
 */
class SubscriptionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'SubscriptionList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'order_id',
        'quantity',
        'termrem',
        'termproc',
        'firstdate',
        'lastdate',
        'nextdate',
        'status',
        'message',
        'cncldate',
        'tax',
        'shipping',
        'subtotal',
        'total',
        'authfails',
        'lastafail',
        'frequency',
        'term',
        'descrip',
        'n',
        'fixed_dow',
        'fixed_dom',
        'sub_count',
        'customer_login',
        'customer_pw_email',
        'customer_business_title',
        'product_code',
        'product_name',
        'product_sku',
        'product_price',
        'product_cost',
        'product_weight',
        'product_descrip',
        'product_taxable',
        'product_thumbnail',
        'product_image',
        'product_active',
        'product_page_title',
        'product_cancat_code',
        'product_page_code',
        'address_descrip',
        'address_fname',
        'address_lname',
        'address_email',
        'address_phone',
        'address_fax',
        'address_comp',
        'address_addr1',
        'address_addr2',
        'address_city',
        'address_state',
        'address_zip',
        'address_cntry',
        'product_inventory_active',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'order_id',
        'custpc_id',
        'quantity',
        'termrem',
        'termproc',
        'firstdate',
        'lastdate',
        'nextdate',
        'status',
        'message',
        'cncldate',
        'tax',
        'shipping',
        'subtotal',
        'total',
        'authfails',
        'lastafail',
        'frequency',
        'term',
        'descrip',
        'n',
        'fixed_dow',
        'fixed_dom',
        'sub_count',
        'customer_login',
        'customer_pw_email',
        'customer_business_title',
        'product_code',
        'product_name',
        'product_sku',
        'product_cancat_code',
        'product_page_code',
        'product_price',
        'product_cost',
        'product_weight',
        'product_descrip',
        'product_taxable',
        'product_thumbnail',
        'product_image',
        'product_active',
        'product_page_title',
        'address_descrip',
        'address_fname',
        'address_lname',
        'address_email',
        'address_phone',
        'address_fax',
        'address_comp',
        'address_addr1',
        'address_addr2',
        'address_city',
        'address_state',
        'address_zip',
        'address_cntry',
        'product_inventory',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'imagetypes',
        'imagetype_count',
        'product_descrip',
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
        return new \MerchantAPI\Response\SubscriptionListLoadQuery($this, $httpResponse, $data);
    }
}
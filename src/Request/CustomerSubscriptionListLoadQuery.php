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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Customer;
use MerchantAPI\Model\CustomerSubscription;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CustomerSubscriptionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customersubscriptionlist_load_query
 */
class CustomerSubscriptionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerSubscriptionList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
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
        'product_inventory',
        'product_inventory_active',
        'product_inventory',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
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
    protected $availableOnDemandColumns = [
        'imagetypes',
        'imagetype_count',
        'product_descrip',
    ];

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $editCustomer;

    /** @var string */
    protected $customerLogin;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Customer
     */
    public function __construct(BaseClient $client = null, Customer $customer = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($customer) {
            if ($customer->getId()) {
                $this->setCustomerId($customer->getId());
            } else if ($customer->getLogin()) {
                $this->setEditCustomer($customer->getLogin());
            }
            if ($customer->getCustomFieldValues()) {
                $this->setCustomFieldValues(clone $customer->getCustomFieldValues());
            }
        }
    }

    /**
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Get Edit_Customer.
     *
     * @return string
     */
    public function getEditCustomer()
    {
        return $this->editCustomer;
    }

    /**
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin()
    {
        return $this->customerLogin;
    }

    /**
     * Get CustomField_Values.
     *
     * @return CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->customFieldValues;
    }

    /**
     * Set Customer_ID.
     *
     * @param int
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Edit_Customer.
     *
     * @param string
     * @return $this
     */
    public function setEditCustomer($editCustomer)
    {
        $this->editCustomer = $editCustomer;

        return $this;
    }

    /**
     * Set Customer_Login.
     *
     * @param string
     * @return $this
     */
    public function setCustomerLogin($customerLogin)
    {
        $this->customerLogin = $customerLogin;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|null
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues)
    {
        if (is_array($customFieldValues)) {
            $customFieldValues = new CustomFieldValues($customFieldValues);
        } else if (!$customFieldValues instanceof CustomFieldValues) {
            throw new \InvalidArgumentException(sprintf('Expected instance of CustomFieldValues or an array but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }

        $this->customFieldValues = $customFieldValues;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerSubscriptionListLoadQuery($this, $httpResponse, $data);
    }
}
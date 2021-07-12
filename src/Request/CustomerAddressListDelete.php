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

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\CustomerAddress;
use MerchantAPI\Model\Customer;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CustomerAddressList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customeraddresslist_delete
 */
class CustomerAddressListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerAddressList_Delete';

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $customerLogin;

    /** @var string */
    protected $editCustomer;

    /** @var int[] */
    protected $customerAddressIds = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Customer
     */
    public function __construct(BaseClient $client = null, Customer $customer = null)
    {
        parent::__construct($client);
        if ($customer) {
            if ($customer->getId()) {
                $this->setCustomerId($customer->getId());
            } else if ($customer->getLogin()) {
                $this->setCustomerLogin($customer->getLogin());
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
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin()
    {
        return $this->customerLogin;
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
     * Get CustomerAddress_IDs.
     *
     * @return array
     */
    public function getCustomerAddressIds()
    {
        return $this->customerAddressIds;
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
     * Add CustomerAddress_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addCustomerAddress_ID($customerAddressId)
    {
        $this->customerAddressIds[] = $customerAddressId;
        return $this;
    }

    /**
     * Add CustomerAddress model.
     *
     * @param \MerchantAPI\Model\CustomerAddress
     * @return $this
     */
    public function addCustomerAddress(CustomerAddress $customerAddress)
    {
        if ($customerAddress->getId()) {
            $this->customerAddressIds[] = $customerAddress->getId();
        }

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
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        }

        $data['CustomerAddress_IDs'] = $this->getCustomerAddressIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerAddressListDelete($this, $httpResponse, $data);
    }
}
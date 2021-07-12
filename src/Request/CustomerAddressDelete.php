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
use MerchantAPI\BaseClient;

/**
 * Handles API Request CustomerAddress_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customeraddress_delete
 */
class CustomerAddressDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerAddress_Delete';

    /** @var int */
    protected $addressId;

    /** @var int */
    protected $customerAddressId;

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $customerLogin;

    /** @var string */
    protected $editCustomer;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\CustomerAddress
     */
    public function __construct(BaseClient $client = null, CustomerAddress $customerAddress = null)
    {
        parent::__construct($client);
        if ($customerAddress) {
            if ($customerAddress->getCustomerId()) {
                $this->setCustomerId($customerAddress->getCustomerId());
            }

            if ($customerAddress->getId()) {
                $this->setAddressId($customerAddress->getId());
            }
        }
    }

    /**
     * Get Address_ID.
     *
     * @return int
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Get CustomerAddress_ID.
     *
     * @return int
     */
    public function getCustomerAddressId()
    {
        return $this->customerAddressId;
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
     * Set Address_ID.
     *
     * @param int
     * @return $this
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Set CustomerAddress_ID.
     *
     * @param int
     * @return $this
     */
    public function setCustomerAddressId($customerAddressId)
    {
        $this->customerAddressId = $customerAddressId;

        return $this;
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

        if ($this->getAddressId()) {
            $data['Address_ID'] = $this->getAddressId();
        } else if ($this->getCustomerAddressId()) {
            $data['CustomerAddress_ID'] = $this->getCustomerAddressId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerAddressDelete($this, $httpResponse, $data);
    }
}
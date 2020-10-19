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
use MerchantAPI\Model\Customer;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CustomerCreditHistory_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customercredithistory_insert
 */
class CustomerCreditHistoryInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerCreditHistory_Insert';

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $editCustomer;

    /** @var string */
    protected $customerLogin;

    /** @var float */
    protected $amount;

    /** @var string */
    protected $description;

    /** @var string */
    protected $transactionReference;

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
                $this->setEditCustomer($customer->getLogin());
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
     * Get Amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get TransactionReference.
     *
     * @return string
     */
    public function getTransactionReference()
    {
        return $this->transactionReference;
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
     * Set Amount.
     *
     * @param float
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set TransactionReference.
     *
     * @param string
     * @return $this
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;

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

        $data['Amount'] = $this->getAmount();

        $data['Description'] = $this->getDescription();

        if (!is_null($this->getTransactionReference())) {
            $data['TransactionReference'] = $this->getTransactionReference();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerCreditHistoryInsert($this, $httpResponse, $data);
    }
}
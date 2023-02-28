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
use MerchantAPI\Model\CustomerCreditHistory;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerCreditHistory_Insert';

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?float */
    protected ?float $amount = null;

    /** @var ?string */
    protected ?string $description = null;

    /** @var ?string */
    protected ?string $transactionReference = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Customer $customer
     */
    public function __construct(?BaseClient $client = null, ?Customer $customer = null)
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
    public function getCustomerId() : ?int
    {
        return $this->customerId;
    }

    /**
     * Get Edit_Customer.
     *
     * @return string
     */
    public function getEditCustomer() : ?string
    {
        return $this->editCustomer;
    }

    /**
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->customerLogin;
    }

    /**
     * Get Amount.
     *
     * @return float
     */
    public function getAmount() : ?float
    {
        return $this->amount;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription() : ?string
    {
        return $this->description;
    }

    /**
     * Get TransactionReference.
     *
     * @return string
     */
    public function getTransactionReference() : ?string
    {
        return $this->transactionReference;
    }

    /**
     * Set Customer_ID.
     *
     * @param ?int $customerId
     * @return $this
     */
    public function setCustomerId(?int $customerId) : self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Edit_Customer.
     *
     * @param ?string $editCustomer
     * @return $this
     */
    public function setEditCustomer(?string $editCustomer) : self
    {
        $this->editCustomer = $editCustomer;

        return $this;
    }

    /**
     * Set Customer_Login.
     *
     * @param ?string $customerLogin
     * @return $this
     */
    public function setCustomerLogin(?string $customerLogin) : self
    {
        $this->customerLogin = $customerLogin;

        return $this;
    }

    /**
     * Set Amount.
     *
     * @param ?float $amount
     * @return $this
     */
    public function setAmount(?float $amount) : self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param ?string $description
     * @return $this
     */
    public function setDescription(?string $description) : self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set TransactionReference.
     *
     * @param ?string $transactionReference
     * @return $this
     */
    public function setTransactionReference(?string $transactionReference) : self
    {
        $this->transactionReference = $transactionReference;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerCreditHistoryInsert($this, $httpResponse, $data);
    }
}
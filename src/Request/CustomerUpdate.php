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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Customer;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Customer_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customer_update
 */
class CustomerUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Customer_Update';

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?string */
    protected ?string $customerPasswordEmail = null;

    /** @var ?string */
    protected ?string $customerPassword = null;

    /** @var ?bool */
    protected ?bool $customerShipResidential = null;

    /** @var ?string */
    protected ?string $customerShipFirstName = null;

    /** @var ?string */
    protected ?string $customerShipLastName = null;

    /** @var ?string */
    protected ?string $customerShipEmail = null;

    /** @var ?string */
    protected ?string $customerShipCompany = null;

    /** @var ?string */
    protected ?string $customerShipPhone = null;

    /** @var ?string */
    protected ?string $customerShipFax = null;

    /** @var ?string */
    protected ?string $customerShipAddress1 = null;

    /** @var ?string */
    protected ?string $customerShipAddress2 = null;

    /** @var ?string */
    protected ?string $customerShipCity = null;

    /** @var ?string */
    protected ?string $customerShipState = null;

    /** @var ?string */
    protected ?string $customerShipZip = null;

    /** @var ?string */
    protected ?string $customerShipCountry = null;

    /** @var ?string */
    protected ?string $customerBillFirstName = null;

    /** @var ?string */
    protected ?string $customerBillLastName = null;

    /** @var ?string */
    protected ?string $customerBillEmail = null;

    /** @var ?string */
    protected ?string $customerBillCompany = null;

    /** @var ?string */
    protected ?string $customerBillPhone = null;

    /** @var ?string */
    protected ?string $customerBillFax = null;

    /** @var ?string */
    protected ?string $customerBillAddress1 = null;

    /** @var ?string */
    protected ?string $customerBillAddress2 = null;

    /** @var ?string */
    protected ?string $customerBillCity = null;

    /** @var ?string */
    protected ?string $customerBillState = null;

    /** @var ?string */
    protected ?string $customerBillZip = null;

    /** @var ?string */
    protected ?string $customerBillCountry = null;

    /** @var ?bool */
    protected ?bool $customerTaxExempt = null;

    /** @var ?string */
    protected ?string $customerBusinessAccount = null;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Customer $customer
     */
    public function __construct(?BaseClient $client = null, ?Customer $customer = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($customer) {
            if ($customer->getId()) {
                $this->setCustomerId($customer->getId());
            } else if ($customer->getLogin()) {
                $this->setEditCustomer($customer->getLogin());
            }

            $this->setCustomerLogin($customer->getLogin());
            $this->setCustomerPasswordEmail($customer->getPasswordEmail());
            $this->setCustomerShipResidential($customer->getShippingResidential());
            $this->setCustomerShipFirstName($customer->getShipFirstName());
            $this->setCustomerShipLastName($customer->getShipLastName());
            $this->setCustomerShipEmail($customer->getShipEmail());
            $this->setCustomerShipCompany($customer->getShipCompany());
            $this->setCustomerShipPhone($customer->getShipPhone());
            $this->setCustomerShipFax($customer->getShipFax());
            $this->setCustomerShipAddress1($customer->getShipAddress1());
            $this->setCustomerShipAddress2($customer->getShipAddress2());
            $this->setCustomerShipCity($customer->getShipCity());
            $this->setCustomerShipState($customer->getShipState());
            $this->setCustomerShipZip($customer->getShipZip());
            $this->setCustomerShipCountry($customer->getShipCountry());
            $this->setCustomerBillFirstName($customer->getBillFirstName());
            $this->setCustomerBillLastName($customer->getBillLastName());
            $this->setCustomerBillEmail($customer->getBillEmail());
            $this->setCustomerBillCompany($customer->getBillCompany());
            $this->setCustomerBillPhone($customer->getBillPhone());
            $this->setCustomerBillFax($customer->getBillFax());
            $this->setCustomerBillAddress1($customer->getBillAddress1());
            $this->setCustomerBillAddress2($customer->getBillAddress2());
            $this->setCustomerBillCity($customer->getBillCity());
            $this->setCustomerBillState($customer->getBillState());
            $this->setCustomerBillZip($customer->getBillZip());
            $this->setCustomerBillCountry($customer->getBillCountry());
            $this->setCustomerTaxExempt($customer->getTaxExempt());
            $this->setCustomerBusinessAccount($customer->getBusinessTitle());

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
     * Get Customer_PasswordEmail.
     *
     * @return string
     */
    public function getCustomerPasswordEmail() : ?string
    {
        return $this->customerPasswordEmail;
    }

    /**
     * Get Customer_Password.
     *
     * @return string
     */
    public function getCustomerPassword() : ?string
    {
        return $this->customerPassword;
    }

    /**
     * Get Customer_ShipResidential.
     *
     * @return bool
     */
    public function getCustomerShipResidential() : ?bool
    {
        return $this->customerShipResidential;
    }

    /**
     * Get Customer_ShipFirstName.
     *
     * @return string
     */
    public function getCustomerShipFirstName() : ?string
    {
        return $this->customerShipFirstName;
    }

    /**
     * Get Customer_ShipLastName.
     *
     * @return string
     */
    public function getCustomerShipLastName() : ?string
    {
        return $this->customerShipLastName;
    }

    /**
     * Get Customer_ShipEmail.
     *
     * @return string
     */
    public function getCustomerShipEmail() : ?string
    {
        return $this->customerShipEmail;
    }

    /**
     * Get Customer_ShipCompany.
     *
     * @return string
     */
    public function getCustomerShipCompany() : ?string
    {
        return $this->customerShipCompany;
    }

    /**
     * Get Customer_ShipPhone.
     *
     * @return string
     */
    public function getCustomerShipPhone() : ?string
    {
        return $this->customerShipPhone;
    }

    /**
     * Get Customer_ShipFax.
     *
     * @return string
     */
    public function getCustomerShipFax() : ?string
    {
        return $this->customerShipFax;
    }

    /**
     * Get Customer_ShipAddress1.
     *
     * @return string
     */
    public function getCustomerShipAddress1() : ?string
    {
        return $this->customerShipAddress1;
    }

    /**
     * Get Customer_ShipAddress2.
     *
     * @return string
     */
    public function getCustomerShipAddress2() : ?string
    {
        return $this->customerShipAddress2;
    }

    /**
     * Get Customer_ShipCity.
     *
     * @return string
     */
    public function getCustomerShipCity() : ?string
    {
        return $this->customerShipCity;
    }

    /**
     * Get Customer_ShipState.
     *
     * @return string
     */
    public function getCustomerShipState() : ?string
    {
        return $this->customerShipState;
    }

    /**
     * Get Customer_ShipZip.
     *
     * @return string
     */
    public function getCustomerShipZip() : ?string
    {
        return $this->customerShipZip;
    }

    /**
     * Get Customer_ShipCountry.
     *
     * @return string
     */
    public function getCustomerShipCountry() : ?string
    {
        return $this->customerShipCountry;
    }

    /**
     * Get Customer_BillFirstName.
     *
     * @return string
     */
    public function getCustomerBillFirstName() : ?string
    {
        return $this->customerBillFirstName;
    }

    /**
     * Get Customer_BillLastName.
     *
     * @return string
     */
    public function getCustomerBillLastName() : ?string
    {
        return $this->customerBillLastName;
    }

    /**
     * Get Customer_BillEmail.
     *
     * @return string
     */
    public function getCustomerBillEmail() : ?string
    {
        return $this->customerBillEmail;
    }

    /**
     * Get Customer_BillCompany.
     *
     * @return string
     */
    public function getCustomerBillCompany() : ?string
    {
        return $this->customerBillCompany;
    }

    /**
     * Get Customer_BillPhone.
     *
     * @return string
     */
    public function getCustomerBillPhone() : ?string
    {
        return $this->customerBillPhone;
    }

    /**
     * Get Customer_BillFax.
     *
     * @return string
     */
    public function getCustomerBillFax() : ?string
    {
        return $this->customerBillFax;
    }

    /**
     * Get Customer_BillAddress1.
     *
     * @return string
     */
    public function getCustomerBillAddress1() : ?string
    {
        return $this->customerBillAddress1;
    }

    /**
     * Get Customer_BillAddress2.
     *
     * @return string
     */
    public function getCustomerBillAddress2() : ?string
    {
        return $this->customerBillAddress2;
    }

    /**
     * Get Customer_BillCity.
     *
     * @return string
     */
    public function getCustomerBillCity() : ?string
    {
        return $this->customerBillCity;
    }

    /**
     * Get Customer_BillState.
     *
     * @return string
     */
    public function getCustomerBillState() : ?string
    {
        return $this->customerBillState;
    }

    /**
     * Get Customer_BillZip.
     *
     * @return string
     */
    public function getCustomerBillZip() : ?string
    {
        return $this->customerBillZip;
    }

    /**
     * Get Customer_BillCountry.
     *
     * @return string
     */
    public function getCustomerBillCountry() : ?string
    {
        return $this->customerBillCountry;
    }

    /**
     * Get Customer_Tax_Exempt.
     *
     * @return bool
     */
    public function getCustomerTaxExempt() : ?bool
    {
        return $this->customerTaxExempt;
    }

    /**
     * Get Customer_BusinessAccount.
     *
     * @return string
     */
    public function getCustomerBusinessAccount() : ?string
    {
        return $this->customerBusinessAccount;
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->customFieldValues;
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
     * Set Customer_PasswordEmail.
     *
     * @param ?string $customerPasswordEmail
     * @return $this
     */
    public function setCustomerPasswordEmail(?string $customerPasswordEmail) : self
    {
        $this->customerPasswordEmail = $customerPasswordEmail;

        return $this;
    }

    /**
     * Set Customer_Password.
     *
     * @param ?string $customerPassword
     * @return $this
     */
    public function setCustomerPassword(?string $customerPassword) : self
    {
        $this->customerPassword = $customerPassword;

        return $this;
    }

    /**
     * Set Customer_ShipResidential.
     *
     * @param ?bool $customerShipResidential
     * @return $this
     */
    public function setCustomerShipResidential(?bool $customerShipResidential) : self
    {
        $this->customerShipResidential = $customerShipResidential;

        return $this;
    }

    /**
     * Set Customer_ShipFirstName.
     *
     * @param ?string $customerShipFirstName
     * @return $this
     */
    public function setCustomerShipFirstName(?string $customerShipFirstName) : self
    {
        $this->customerShipFirstName = $customerShipFirstName;

        return $this;
    }

    /**
     * Set Customer_ShipLastName.
     *
     * @param ?string $customerShipLastName
     * @return $this
     */
    public function setCustomerShipLastName(?string $customerShipLastName) : self
    {
        $this->customerShipLastName = $customerShipLastName;

        return $this;
    }

    /**
     * Set Customer_ShipEmail.
     *
     * @param ?string $customerShipEmail
     * @return $this
     */
    public function setCustomerShipEmail(?string $customerShipEmail) : self
    {
        $this->customerShipEmail = $customerShipEmail;

        return $this;
    }

    /**
     * Set Customer_ShipCompany.
     *
     * @param ?string $customerShipCompany
     * @return $this
     */
    public function setCustomerShipCompany(?string $customerShipCompany) : self
    {
        $this->customerShipCompany = $customerShipCompany;

        return $this;
    }

    /**
     * Set Customer_ShipPhone.
     *
     * @param ?string $customerShipPhone
     * @return $this
     */
    public function setCustomerShipPhone(?string $customerShipPhone) : self
    {
        $this->customerShipPhone = $customerShipPhone;

        return $this;
    }

    /**
     * Set Customer_ShipFax.
     *
     * @param ?string $customerShipFax
     * @return $this
     */
    public function setCustomerShipFax(?string $customerShipFax) : self
    {
        $this->customerShipFax = $customerShipFax;

        return $this;
    }

    /**
     * Set Customer_ShipAddress1.
     *
     * @param ?string $customerShipAddress1
     * @return $this
     */
    public function setCustomerShipAddress1(?string $customerShipAddress1) : self
    {
        $this->customerShipAddress1 = $customerShipAddress1;

        return $this;
    }

    /**
     * Set Customer_ShipAddress2.
     *
     * @param ?string $customerShipAddress2
     * @return $this
     */
    public function setCustomerShipAddress2(?string $customerShipAddress2) : self
    {
        $this->customerShipAddress2 = $customerShipAddress2;

        return $this;
    }

    /**
     * Set Customer_ShipCity.
     *
     * @param ?string $customerShipCity
     * @return $this
     */
    public function setCustomerShipCity(?string $customerShipCity) : self
    {
        $this->customerShipCity = $customerShipCity;

        return $this;
    }

    /**
     * Set Customer_ShipState.
     *
     * @param ?string $customerShipState
     * @return $this
     */
    public function setCustomerShipState(?string $customerShipState) : self
    {
        $this->customerShipState = $customerShipState;

        return $this;
    }

    /**
     * Set Customer_ShipZip.
     *
     * @param ?string $customerShipZip
     * @return $this
     */
    public function setCustomerShipZip(?string $customerShipZip) : self
    {
        $this->customerShipZip = $customerShipZip;

        return $this;
    }

    /**
     * Set Customer_ShipCountry.
     *
     * @param ?string $customerShipCountry
     * @return $this
     */
    public function setCustomerShipCountry(?string $customerShipCountry) : self
    {
        $this->customerShipCountry = $customerShipCountry;

        return $this;
    }

    /**
     * Set Customer_BillFirstName.
     *
     * @param ?string $customerBillFirstName
     * @return $this
     */
    public function setCustomerBillFirstName(?string $customerBillFirstName) : self
    {
        $this->customerBillFirstName = $customerBillFirstName;

        return $this;
    }

    /**
     * Set Customer_BillLastName.
     *
     * @param ?string $customerBillLastName
     * @return $this
     */
    public function setCustomerBillLastName(?string $customerBillLastName) : self
    {
        $this->customerBillLastName = $customerBillLastName;

        return $this;
    }

    /**
     * Set Customer_BillEmail.
     *
     * @param ?string $customerBillEmail
     * @return $this
     */
    public function setCustomerBillEmail(?string $customerBillEmail) : self
    {
        $this->customerBillEmail = $customerBillEmail;

        return $this;
    }

    /**
     * Set Customer_BillCompany.
     *
     * @param ?string $customerBillCompany
     * @return $this
     */
    public function setCustomerBillCompany(?string $customerBillCompany) : self
    {
        $this->customerBillCompany = $customerBillCompany;

        return $this;
    }

    /**
     * Set Customer_BillPhone.
     *
     * @param ?string $customerBillPhone
     * @return $this
     */
    public function setCustomerBillPhone(?string $customerBillPhone) : self
    {
        $this->customerBillPhone = $customerBillPhone;

        return $this;
    }

    /**
     * Set Customer_BillFax.
     *
     * @param ?string $customerBillFax
     * @return $this
     */
    public function setCustomerBillFax(?string $customerBillFax) : self
    {
        $this->customerBillFax = $customerBillFax;

        return $this;
    }

    /**
     * Set Customer_BillAddress1.
     *
     * @param ?string $customerBillAddress1
     * @return $this
     */
    public function setCustomerBillAddress1(?string $customerBillAddress1) : self
    {
        $this->customerBillAddress1 = $customerBillAddress1;

        return $this;
    }

    /**
     * Set Customer_BillAddress2.
     *
     * @param ?string $customerBillAddress2
     * @return $this
     */
    public function setCustomerBillAddress2(?string $customerBillAddress2) : self
    {
        $this->customerBillAddress2 = $customerBillAddress2;

        return $this;
    }

    /**
     * Set Customer_BillCity.
     *
     * @param ?string $customerBillCity
     * @return $this
     */
    public function setCustomerBillCity(?string $customerBillCity) : self
    {
        $this->customerBillCity = $customerBillCity;

        return $this;
    }

    /**
     * Set Customer_BillState.
     *
     * @param ?string $customerBillState
     * @return $this
     */
    public function setCustomerBillState(?string $customerBillState) : self
    {
        $this->customerBillState = $customerBillState;

        return $this;
    }

    /**
     * Set Customer_BillZip.
     *
     * @param ?string $customerBillZip
     * @return $this
     */
    public function setCustomerBillZip(?string $customerBillZip) : self
    {
        $this->customerBillZip = $customerBillZip;

        return $this;
    }

    /**
     * Set Customer_BillCountry.
     *
     * @param ?string $customerBillCountry
     * @return $this
     */
    public function setCustomerBillCountry(?string $customerBillCountry) : self
    {
        $this->customerBillCountry = $customerBillCountry;

        return $this;
    }

    /**
     * Set Customer_Tax_Exempt.
     *
     * @param ?bool $customerTaxExempt
     * @return $this
     */
    public function setCustomerTaxExempt(?bool $customerTaxExempt) : self
    {
        $this->customerTaxExempt = $customerTaxExempt;

        return $this;
    }

    /**
     * Set Customer_BusinessAccount.
     *
     * @param ?string $customerBusinessAccount
     * @return $this
     */
    public function setCustomerBusinessAccount(?string $customerBusinessAccount) : self
    {
        $this->customerBusinessAccount = $customerBusinessAccount;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|array $customFieldValues
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues) : self
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
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        }

        if (!is_null($this->getCustomerLogin())) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        if (!is_null($this->getCustomerPasswordEmail())) {
            $data['Customer_PasswordEmail'] = $this->getCustomerPasswordEmail();
        }

        if (!is_null($this->getCustomerPassword())) {
            $data['Customer_Password'] = $this->getCustomerPassword();
        }

        if (!is_null($this->getCustomerShipResidential())) {
            $data['Customer_ShipResidential'] = $this->getCustomerShipResidential();
        }

        if (!is_null($this->getCustomerShipFirstName())) {
            $data['Customer_ShipFirstName'] = $this->getCustomerShipFirstName();
        }

        if (!is_null($this->getCustomerShipLastName())) {
            $data['Customer_ShipLastName'] = $this->getCustomerShipLastName();
        }

        if (!is_null($this->getCustomerShipEmail())) {
            $data['Customer_ShipEmail'] = $this->getCustomerShipEmail();
        }

        if (!is_null($this->getCustomerShipCompany())) {
            $data['Customer_ShipCompany'] = $this->getCustomerShipCompany();
        }

        if (!is_null($this->getCustomerShipPhone())) {
            $data['Customer_ShipPhone'] = $this->getCustomerShipPhone();
        }

        if (!is_null($this->getCustomerShipFax())) {
            $data['Customer_ShipFax'] = $this->getCustomerShipFax();
        }

        if (!is_null($this->getCustomerShipAddress1())) {
            $data['Customer_ShipAddress1'] = $this->getCustomerShipAddress1();
        }

        if (!is_null($this->getCustomerShipAddress2())) {
            $data['Customer_ShipAddress2'] = $this->getCustomerShipAddress2();
        }

        if (!is_null($this->getCustomerShipCity())) {
            $data['Customer_ShipCity'] = $this->getCustomerShipCity();
        }

        if (!is_null($this->getCustomerShipState())) {
            $data['Customer_ShipState'] = $this->getCustomerShipState();
        }

        if (!is_null($this->getCustomerShipZip())) {
            $data['Customer_ShipZip'] = $this->getCustomerShipZip();
        }

        if (!is_null($this->getCustomerShipCountry())) {
            $data['Customer_ShipCountry'] = $this->getCustomerShipCountry();
        }

        if (!is_null($this->getCustomerBillFirstName())) {
            $data['Customer_BillFirstName'] = $this->getCustomerBillFirstName();
        }

        if (!is_null($this->getCustomerBillLastName())) {
            $data['Customer_BillLastName'] = $this->getCustomerBillLastName();
        }

        if (!is_null($this->getCustomerBillEmail())) {
            $data['Customer_BillEmail'] = $this->getCustomerBillEmail();
        }

        if (!is_null($this->getCustomerBillCompany())) {
            $data['Customer_BillCompany'] = $this->getCustomerBillCompany();
        }

        if (!is_null($this->getCustomerBillPhone())) {
            $data['Customer_BillPhone'] = $this->getCustomerBillPhone();
        }

        if (!is_null($this->getCustomerBillFax())) {
            $data['Customer_BillFax'] = $this->getCustomerBillFax();
        }

        if (!is_null($this->getCustomerBillAddress1())) {
            $data['Customer_BillAddress1'] = $this->getCustomerBillAddress1();
        }

        if (!is_null($this->getCustomerBillAddress2())) {
            $data['Customer_BillAddress2'] = $this->getCustomerBillAddress2();
        }

        if (!is_null($this->getCustomerBillCity())) {
            $data['Customer_BillCity'] = $this->getCustomerBillCity();
        }

        if (!is_null($this->getCustomerBillState())) {
            $data['Customer_BillState'] = $this->getCustomerBillState();
        }

        if (!is_null($this->getCustomerBillZip())) {
            $data['Customer_BillZip'] = $this->getCustomerBillZip();
        }

        if (!is_null($this->getCustomerBillCountry())) {
            $data['Customer_BillCountry'] = $this->getCustomerBillCountry();
        }

        if (!is_null($this->getCustomerTaxExempt())) {
            $data['Customer_Tax_Exempt'] = $this->getCustomerTaxExempt();
        }

        if (!is_null($this->getCustomerBusinessAccount())) {
            $data['Customer_BusinessAccount'] = $this->getCustomerBusinessAccount();
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerUpdate($this, $httpResponse, $data);
    }
}
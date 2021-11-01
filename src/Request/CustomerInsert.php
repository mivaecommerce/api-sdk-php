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

/**
 * Handles API Request Customer_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customer_insert
 */
class CustomerInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Customer_Insert';

    /** @var string */
    protected $customerLogin;

    /** @var string */
    protected $customerPasswordEmail;

    /** @var string */
    protected $customerPassword;

    /** @var bool */
    protected $customerShipResidential;

    /** @var string */
    protected $customerShipFirstName;

    /** @var string */
    protected $customerShipLastName;

    /** @var string */
    protected $customerShipEmail;

    /** @var string */
    protected $customerShipCompany;

    /** @var string */
    protected $customerShipPhone;

    /** @var string */
    protected $customerShipFax;

    /** @var string */
    protected $customerShipAddress1;

    /** @var string */
    protected $customerShipAddress2;

    /** @var string */
    protected $customerShipCity;

    /** @var string */
    protected $customerShipState;

    /** @var string */
    protected $customerShipZip;

    /** @var string */
    protected $customerShipCountry;

    /** @var string */
    protected $customerBillFirstName;

    /** @var string */
    protected $customerBillLastName;

    /** @var string */
    protected $customerBillEmail;

    /** @var string */
    protected $customerBillCompany;

    /** @var string */
    protected $customerBillPhone;

    /** @var string */
    protected $customerBillFax;

    /** @var string */
    protected $customerBillAddress1;

    /** @var string */
    protected $customerBillAddress2;

    /** @var string */
    protected $customerBillCity;

    /** @var string */
    protected $customerBillState;

    /** @var string */
    protected $customerBillZip;

    /** @var string */
    protected $customerBillCountry;

    /** @var bool */
    protected $customerTaxExempt;

    /** @var string */
    protected $customerBusinessAccount;

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
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin()
    {
        return $this->customerLogin;
    }

    /**
     * Get Customer_PasswordEmail.
     *
     * @return string
     */
    public function getCustomerPasswordEmail()
    {
        return $this->customerPasswordEmail;
    }

    /**
     * Get Customer_Password.
     *
     * @return string
     */
    public function getCustomerPassword()
    {
        return $this->customerPassword;
    }

    /**
     * Get Customer_ShipResidential.
     *
     * @return bool
     */
    public function getCustomerShipResidential()
    {
        return $this->customerShipResidential;
    }

    /**
     * Get Customer_ShipFirstName.
     *
     * @return string
     */
    public function getCustomerShipFirstName()
    {
        return $this->customerShipFirstName;
    }

    /**
     * Get Customer_ShipLastName.
     *
     * @return string
     */
    public function getCustomerShipLastName()
    {
        return $this->customerShipLastName;
    }

    /**
     * Get Customer_ShipEmail.
     *
     * @return string
     */
    public function getCustomerShipEmail()
    {
        return $this->customerShipEmail;
    }

    /**
     * Get Customer_ShipCompany.
     *
     * @return string
     */
    public function getCustomerShipCompany()
    {
        return $this->customerShipCompany;
    }

    /**
     * Get Customer_ShipPhone.
     *
     * @return string
     */
    public function getCustomerShipPhone()
    {
        return $this->customerShipPhone;
    }

    /**
     * Get Customer_ShipFax.
     *
     * @return string
     */
    public function getCustomerShipFax()
    {
        return $this->customerShipFax;
    }

    /**
     * Get Customer_ShipAddress1.
     *
     * @return string
     */
    public function getCustomerShipAddress1()
    {
        return $this->customerShipAddress1;
    }

    /**
     * Get Customer_ShipAddress2.
     *
     * @return string
     */
    public function getCustomerShipAddress2()
    {
        return $this->customerShipAddress2;
    }

    /**
     * Get Customer_ShipCity.
     *
     * @return string
     */
    public function getCustomerShipCity()
    {
        return $this->customerShipCity;
    }

    /**
     * Get Customer_ShipState.
     *
     * @return string
     */
    public function getCustomerShipState()
    {
        return $this->customerShipState;
    }

    /**
     * Get Customer_ShipZip.
     *
     * @return string
     */
    public function getCustomerShipZip()
    {
        return $this->customerShipZip;
    }

    /**
     * Get Customer_ShipCountry.
     *
     * @return string
     */
    public function getCustomerShipCountry()
    {
        return $this->customerShipCountry;
    }

    /**
     * Get Customer_BillFirstName.
     *
     * @return string
     */
    public function getCustomerBillFirstName()
    {
        return $this->customerBillFirstName;
    }

    /**
     * Get Customer_BillLastName.
     *
     * @return string
     */
    public function getCustomerBillLastName()
    {
        return $this->customerBillLastName;
    }

    /**
     * Get Customer_BillEmail.
     *
     * @return string
     */
    public function getCustomerBillEmail()
    {
        return $this->customerBillEmail;
    }

    /**
     * Get Customer_BillCompany.
     *
     * @return string
     */
    public function getCustomerBillCompany()
    {
        return $this->customerBillCompany;
    }

    /**
     * Get Customer_BillPhone.
     *
     * @return string
     */
    public function getCustomerBillPhone()
    {
        return $this->customerBillPhone;
    }

    /**
     * Get Customer_BillFax.
     *
     * @return string
     */
    public function getCustomerBillFax()
    {
        return $this->customerBillFax;
    }

    /**
     * Get Customer_BillAddress1.
     *
     * @return string
     */
    public function getCustomerBillAddress1()
    {
        return $this->customerBillAddress1;
    }

    /**
     * Get Customer_BillAddress2.
     *
     * @return string
     */
    public function getCustomerBillAddress2()
    {
        return $this->customerBillAddress2;
    }

    /**
     * Get Customer_BillCity.
     *
     * @return string
     */
    public function getCustomerBillCity()
    {
        return $this->customerBillCity;
    }

    /**
     * Get Customer_BillState.
     *
     * @return string
     */
    public function getCustomerBillState()
    {
        return $this->customerBillState;
    }

    /**
     * Get Customer_BillZip.
     *
     * @return string
     */
    public function getCustomerBillZip()
    {
        return $this->customerBillZip;
    }

    /**
     * Get Customer_BillCountry.
     *
     * @return string
     */
    public function getCustomerBillCountry()
    {
        return $this->customerBillCountry;
    }

    /**
     * Get Customer_Tax_Exempt.
     *
     * @return bool
     */
    public function getCustomerTaxExempt()
    {
        return $this->customerTaxExempt;
    }

    /**
     * Get Customer_BusinessAccount.
     *
     * @return string
     */
    public function getCustomerBusinessAccount()
    {
        return $this->customerBusinessAccount;
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
     * Set Customer_PasswordEmail.
     *
     * @param string
     * @return $this
     */
    public function setCustomerPasswordEmail($customerPasswordEmail)
    {
        $this->customerPasswordEmail = $customerPasswordEmail;

        return $this;
    }

    /**
     * Set Customer_Password.
     *
     * @param string
     * @return $this
     */
    public function setCustomerPassword($customerPassword)
    {
        $this->customerPassword = $customerPassword;

        return $this;
    }

    /**
     * Set Customer_ShipResidential.
     *
     * @param bool
     * @return $this
     */
    public function setCustomerShipResidential($customerShipResidential)
    {
        $this->customerShipResidential = $customerShipResidential;

        return $this;
    }

    /**
     * Set Customer_ShipFirstName.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipFirstName($customerShipFirstName)
    {
        $this->customerShipFirstName = $customerShipFirstName;

        return $this;
    }

    /**
     * Set Customer_ShipLastName.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipLastName($customerShipLastName)
    {
        $this->customerShipLastName = $customerShipLastName;

        return $this;
    }

    /**
     * Set Customer_ShipEmail.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipEmail($customerShipEmail)
    {
        $this->customerShipEmail = $customerShipEmail;

        return $this;
    }

    /**
     * Set Customer_ShipCompany.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipCompany($customerShipCompany)
    {
        $this->customerShipCompany = $customerShipCompany;

        return $this;
    }

    /**
     * Set Customer_ShipPhone.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipPhone($customerShipPhone)
    {
        $this->customerShipPhone = $customerShipPhone;

        return $this;
    }

    /**
     * Set Customer_ShipFax.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipFax($customerShipFax)
    {
        $this->customerShipFax = $customerShipFax;

        return $this;
    }

    /**
     * Set Customer_ShipAddress1.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipAddress1($customerShipAddress1)
    {
        $this->customerShipAddress1 = $customerShipAddress1;

        return $this;
    }

    /**
     * Set Customer_ShipAddress2.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipAddress2($customerShipAddress2)
    {
        $this->customerShipAddress2 = $customerShipAddress2;

        return $this;
    }

    /**
     * Set Customer_ShipCity.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipCity($customerShipCity)
    {
        $this->customerShipCity = $customerShipCity;

        return $this;
    }

    /**
     * Set Customer_ShipState.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipState($customerShipState)
    {
        $this->customerShipState = $customerShipState;

        return $this;
    }

    /**
     * Set Customer_ShipZip.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipZip($customerShipZip)
    {
        $this->customerShipZip = $customerShipZip;

        return $this;
    }

    /**
     * Set Customer_ShipCountry.
     *
     * @param string
     * @return $this
     */
    public function setCustomerShipCountry($customerShipCountry)
    {
        $this->customerShipCountry = $customerShipCountry;

        return $this;
    }

    /**
     * Set Customer_BillFirstName.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillFirstName($customerBillFirstName)
    {
        $this->customerBillFirstName = $customerBillFirstName;

        return $this;
    }

    /**
     * Set Customer_BillLastName.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillLastName($customerBillLastName)
    {
        $this->customerBillLastName = $customerBillLastName;

        return $this;
    }

    /**
     * Set Customer_BillEmail.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillEmail($customerBillEmail)
    {
        $this->customerBillEmail = $customerBillEmail;

        return $this;
    }

    /**
     * Set Customer_BillCompany.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillCompany($customerBillCompany)
    {
        $this->customerBillCompany = $customerBillCompany;

        return $this;
    }

    /**
     * Set Customer_BillPhone.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillPhone($customerBillPhone)
    {
        $this->customerBillPhone = $customerBillPhone;

        return $this;
    }

    /**
     * Set Customer_BillFax.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillFax($customerBillFax)
    {
        $this->customerBillFax = $customerBillFax;

        return $this;
    }

    /**
     * Set Customer_BillAddress1.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillAddress1($customerBillAddress1)
    {
        $this->customerBillAddress1 = $customerBillAddress1;

        return $this;
    }

    /**
     * Set Customer_BillAddress2.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillAddress2($customerBillAddress2)
    {
        $this->customerBillAddress2 = $customerBillAddress2;

        return $this;
    }

    /**
     * Set Customer_BillCity.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillCity($customerBillCity)
    {
        $this->customerBillCity = $customerBillCity;

        return $this;
    }

    /**
     * Set Customer_BillState.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillState($customerBillState)
    {
        $this->customerBillState = $customerBillState;

        return $this;
    }

    /**
     * Set Customer_BillZip.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillZip($customerBillZip)
    {
        $this->customerBillZip = $customerBillZip;

        return $this;
    }

    /**
     * Set Customer_BillCountry.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBillCountry($customerBillCountry)
    {
        $this->customerBillCountry = $customerBillCountry;

        return $this;
    }

    /**
     * Set Customer_Tax_Exempt.
     *
     * @param bool
     * @return $this
     */
    public function setCustomerTaxExempt($customerTaxExempt)
    {
        $this->customerTaxExempt = $customerTaxExempt;

        return $this;
    }

    /**
     * Set Customer_BusinessAccount.
     *
     * @param string
     * @return $this
     */
    public function setCustomerBusinessAccount($customerBusinessAccount)
    {
        $this->customerBusinessAccount = $customerBusinessAccount;

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

        $data['Customer_Login'] = $this->getCustomerLogin();

        $data['Customer_PasswordEmail'] = $this->getCustomerPasswordEmail();

        $data['Customer_Password'] = $this->getCustomerPassword();

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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerInsert($this, $httpResponse, $data);
    }
}
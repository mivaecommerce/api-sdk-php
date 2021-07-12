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
 * Handles API Request CustomerAddress_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customeraddress_update
 */
class CustomerAddressUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerAddress_Update';

    /** @var int */
    protected $addressId;

    /** @var int */
    protected $customerAddressId;

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $customerLogin;

    /** @var string */
    protected $description;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /** @var string */
    protected $email;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $fax;

    /** @var string */
    protected $company;

    /** @var string */
    protected $address1;

    /** @var string */
    protected $address2;

    /** @var string */
    protected $city;

    /** @var string */
    protected $state;

    /** @var string */
    protected $zip;

    /** @var string */
    protected $country;

    /** @var bool */
    protected $residential;

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

            $this->setDescription($customerAddress->getDescription());
            $this->setFirstName($customerAddress->getFirstName());
            $this->setLastName($customerAddress->getLastName());
            $this->setEmail($customerAddress->getEmail());
            $this->setFax($customerAddress->getPhone());
            $this->setCompany($customerAddress->getCompany());
            $this->setAddress1($customerAddress->getAddress1());
            $this->setAddress2($customerAddress->getAddress2());
            $this->setCity($customerAddress->getCity());
            $this->setState($customerAddress->getState());
            $this->setZip($customerAddress->getZip());
            $this->setCountry($customerAddress->getCountry());
            $this->setResidential($customerAddress->getResidential());
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
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get FirstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get LastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get Phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get Fax.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get Company.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get Address1.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Get Address2.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Get City.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get State.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get Zip.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Get Country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get Residential.
     *
     * @return bool
     */
    public function getResidential()
    {
        return $this->residential;
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
     * Set FirstName.
     *
     * @param string
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set LastName.
     *
     * @param string
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set Email.
     *
     * @param string
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set Phone.
     *
     * @param string
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Set Fax.
     *
     * @param string
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Set Company.
     *
     * @param string
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Set Address1.
     *
     * @param string
     * @return $this
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Set Address2.
     *
     * @param string
     * @return $this
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Set City.
     *
     * @param string
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Set State.
     *
     * @param string
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Set Zip.
     *
     * @param string
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Set Country.
     *
     * @param string
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set Residential.
     *
     * @param bool
     * @return $this
     */
    public function setResidential($residential)
    {
        $this->residential = $residential;

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
        }

        if ($this->getAddressId()) {
            $data['Address_ID'] = $this->getAddressId();
        } else if ($this->getCustomerAddressId()) {
            $data['CustomerAddress_ID'] = $this->getCustomerAddressId();
        }

        if (!is_null($this->getDescription())) {
            $data['Description'] = $this->getDescription();
        }

        if (!is_null($this->getFirstName())) {
            $data['FirstName'] = $this->getFirstName();
        }

        if (!is_null($this->getLastName())) {
            $data['LastName'] = $this->getLastName();
        }

        if (!is_null($this->getEmail())) {
            $data['Email'] = $this->getEmail();
        }

        if (!is_null($this->getPhone())) {
            $data['Phone'] = $this->getPhone();
        }

        if (!is_null($this->getFax())) {
            $data['Fax'] = $this->getFax();
        }

        if (!is_null($this->getCompany())) {
            $data['Company'] = $this->getCompany();
        }

        if (!is_null($this->getAddress1())) {
            $data['Address1'] = $this->getAddress1();
        }

        if (!is_null($this->getAddress2())) {
            $data['Address2'] = $this->getAddress2();
        }

        if (!is_null($this->getCity())) {
            $data['City'] = $this->getCity();
        }

        if (!is_null($this->getState())) {
            $data['State'] = $this->getState();
        }

        if (!is_null($this->getZip())) {
            $data['Zip'] = $this->getZip();
        }

        if (!is_null($this->getCountry())) {
            $data['Country'] = $this->getCountry();
        }

        if (!is_null($this->getResidential())) {
            $data['Residential'] = $this->getResidential();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerAddressUpdate($this, $httpResponse, $data);
    }
}
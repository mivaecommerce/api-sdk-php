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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerAddress_Update';

    /** @var ?int */
    protected ?int $addressId = null;

    /** @var ?int */
    protected ?int $customerAddressId = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?string */
    protected ?string $description = null;

    /** @var ?string */
    protected ?string $firstName = null;

    /** @var ?string */
    protected ?string $lastName = null;

    /** @var ?string */
    protected ?string $email = null;

    /** @var ?string */
    protected ?string $phone = null;

    /** @var ?string */
    protected ?string $fax = null;

    /** @var ?string */
    protected ?string $company = null;

    /** @var ?string */
    protected ?string $address1 = null;

    /** @var ?string */
    protected ?string $address2 = null;

    /** @var ?string */
    protected ?string $city = null;

    /** @var ?string */
    protected ?string $state = null;

    /** @var ?string */
    protected ?string $zip = null;

    /** @var ?string */
    protected ?string $country = null;

    /** @var ?bool */
    protected ?bool $residential = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CustomerAddress $customerAddress
     */
    public function __construct(?BaseClient $client = null, ?CustomerAddress $customerAddress = null)
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
            $this->setPhone($customerAddress->getPhone());
            $this->setFax($customerAddress->getFax());
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
    public function getAddressId() : ?int
    {
        return $this->addressId;
    }

    /**
     * Get CustomerAddress_ID.
     *
     * @return int
     */
    public function getCustomerAddressId() : ?int
    {
        return $this->customerAddressId;
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
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->customerLogin;
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
     * Get FirstName.
     *
     * @return string
     */
    public function getFirstName() : ?string
    {
        return $this->firstName;
    }

    /**
     * Get LastName.
     *
     * @return string
     */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**
     * Get Email.
     *
     * @return string
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * Get Phone.
     *
     * @return string
     */
    public function getPhone() : ?string
    {
        return $this->phone;
    }

    /**
     * Get Fax.
     *
     * @return string
     */
    public function getFax() : ?string
    {
        return $this->fax;
    }

    /**
     * Get Company.
     *
     * @return string
     */
    public function getCompany() : ?string
    {
        return $this->company;
    }

    /**
     * Get Address1.
     *
     * @return string
     */
    public function getAddress1() : ?string
    {
        return $this->address1;
    }

    /**
     * Get Address2.
     *
     * @return string
     */
    public function getAddress2() : ?string
    {
        return $this->address2;
    }

    /**
     * Get City.
     *
     * @return string
     */
    public function getCity() : ?string
    {
        return $this->city;
    }

    /**
     * Get State.
     *
     * @return string
     */
    public function getState() : ?string
    {
        return $this->state;
    }

    /**
     * Get Zip.
     *
     * @return string
     */
    public function getZip() : ?string
    {
        return $this->zip;
    }

    /**
     * Get Country.
     *
     * @return string
     */
    public function getCountry() : ?string
    {
        return $this->country;
    }

    /**
     * Get Residential.
     *
     * @return bool
     */
    public function getResidential() : ?bool
    {
        return $this->residential;
    }

    /**
     * Set Address_ID.
     *
     * @param ?int $addressId
     * @return $this
     */
    public function setAddressId(?int $addressId) : self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Set CustomerAddress_ID.
     *
     * @param ?int $customerAddressId
     * @return $this
     */
    public function setCustomerAddressId(?int $customerAddressId) : self
    {
        $this->customerAddressId = $customerAddressId;

        return $this;
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
     * Set FirstName.
     *
     * @param ?string $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName) : self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set LastName.
     *
     * @param ?string $lastName
     * @return $this
     */
    public function setLastName(?string $lastName) : self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Set Email.
     *
     * @param ?string $email
     * @return $this
     */
    public function setEmail(?string $email) : self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set Phone.
     *
     * @param ?string $phone
     * @return $this
     */
    public function setPhone(?string $phone) : self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Set Fax.
     *
     * @param ?string $fax
     * @return $this
     */
    public function setFax(?string $fax) : self
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Set Company.
     *
     * @param ?string $company
     * @return $this
     */
    public function setCompany(?string $company) : self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Set Address1.
     *
     * @param ?string $address1
     * @return $this
     */
    public function setAddress1(?string $address1) : self
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Set Address2.
     *
     * @param ?string $address2
     * @return $this
     */
    public function setAddress2(?string $address2) : self
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Set City.
     *
     * @param ?string $city
     * @return $this
     */
    public function setCity(?string $city) : self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Set State.
     *
     * @param ?string $state
     * @return $this
     */
    public function setState(?string $state) : self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Set Zip.
     *
     * @param ?string $zip
     * @return $this
     */
    public function setZip(?string $zip) : self
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Set Country.
     *
     * @param ?string $country
     * @return $this
     */
    public function setCountry(?string $country) : self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Set Residential.
     *
     * @param ?bool $residential
     * @return $this
     */
    public function setResidential(?bool $residential) : self
    {
        $this->residential = $residential;

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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerAddressUpdate($this, $httpResponse, $data);
    }
}
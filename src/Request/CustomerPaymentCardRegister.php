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
use MerchantAPI\Model\CustomerPaymentCard;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CustomerPaymentCard_Register.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customerpaymentcard_register
 */
class CustomerPaymentCardRegister extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerPaymentCard_Register';

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?string */
    protected ?string $firstName = null;

    /** @var ?string */
    protected ?string $lastName = null;

    /** @var ?string */
    protected ?string $cardType = null;

    /** @var ?string */
    protected ?string $cardNumber = null;

    /** @var ?int */
    protected ?int $expirationMonth = null;

    /** @var ?int */
    protected ?int $expirationYear = null;

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
     * Get CardType.
     *
     * @return string
     */
    public function getCardType() : ?string
    {
        return $this->cardType;
    }

    /**
     * Get CardNumber.
     *
     * @return string
     */
    public function getCardNumber() : ?string
    {
        return $this->cardNumber;
    }

    /**
     * Get ExpirationMonth.
     *
     * @return int
     */
    public function getExpirationMonth() : ?int
    {
        return $this->expirationMonth;
    }

    /**
     * Get ExpirationYear.
     *
     * @return int
     */
    public function getExpirationYear() : ?int
    {
        return $this->expirationYear;
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
     * Set CardType.
     *
     * @param ?string $cardType
     * @return $this
     */
    public function setCardType(?string $cardType) : self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * Set CardNumber.
     *
     * @param ?string $cardNumber
     * @return $this
     */
    public function setCardNumber(?string $cardNumber) : self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Set ExpirationMonth.
     *
     * @param ?int $expirationMonth
     * @return $this
     */
    public function setExpirationMonth(?int $expirationMonth) : self
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    /**
     * Set ExpirationYear.
     *
     * @param ?int $expirationYear
     * @return $this
     */
    public function setExpirationYear(?int $expirationYear) : self
    {
        $this->expirationYear = $expirationYear;

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

        if (!is_null($this->getFirstName())) {
            $data['FirstName'] = $this->getFirstName();
        }

        if (!is_null($this->getLastName())) {
            $data['LastName'] = $this->getLastName();
        }

        if (!is_null($this->getCardType())) {
            $data['CardType'] = $this->getCardType();
        }

        if (!is_null($this->getCardNumber())) {
            $data['CardNumber'] = $this->getCardNumber();
        }

        if (!is_null($this->getExpirationMonth())) {
            $data['ExpirationMonth'] = $this->getExpirationMonth();
        }

        if (!is_null($this->getExpirationYear())) {
            $data['ExpirationYear'] = $this->getExpirationYear();
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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerPaymentCardRegister($this, $httpResponse, $data);
    }
}
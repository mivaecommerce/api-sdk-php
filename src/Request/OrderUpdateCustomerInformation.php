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
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Order_Update_Customer_Information.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/order_update_customer_information
 */
class OrderUpdateCustomerInformation extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Order_Update_Customer_Information';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?bool */
    protected ?bool $shipResidential = null;

    /** @var ?string */
    protected ?string $shipFirstName = null;

    /** @var ?string */
    protected ?string $shipLastName = null;

    /** @var ?string */
    protected ?string $shipEmail = null;

    /** @var ?string */
    protected ?string $shipPhone = null;

    /** @var ?string */
    protected ?string $shipFax = null;

    /** @var ?string */
    protected ?string $shipCompany = null;

    /** @var ?string */
    protected ?string $shipAddress1 = null;

    /** @var ?string */
    protected ?string $shipAddress2 = null;

    /** @var ?string */
    protected ?string $shipCity = null;

    /** @var ?string */
    protected ?string $shipState = null;

    /** @var ?string */
    protected ?string $shipZip = null;

    /** @var ?string */
    protected ?string $shipCountry = null;

    /** @var ?string */
    protected ?string $billFirstName = null;

    /** @var ?string */
    protected ?string $billLastName = null;

    /** @var ?string */
    protected ?string $billEmail = null;

    /** @var ?string */
    protected ?string $billPhone = null;

    /** @var ?string */
    protected ?string $billFax = null;

    /** @var ?string */
    protected ?string $billCompany = null;

    /** @var ?string */
    protected ?string $billAddress1 = null;

    /** @var ?string */
    protected ?string $billAddress2 = null;

    /** @var ?string */
    protected ?string $billCity = null;

    /** @var ?string */
    protected ?string $billState = null;

    /** @var ?string */
    protected ?string $billZip = null;

    /** @var ?string */
    protected ?string $billCountry = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
    {
        parent::__construct($client);
        if ($order) {
            $this->setOrderId($order->getId());
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId() : ?int
    {
        return $this->orderId;
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
     * Get Ship_Residential.
     *
     * @return bool
     */
    public function getShipResidential() : ?bool
    {
        return $this->shipResidential;
    }

    /**
     * Get Ship_FirstName.
     *
     * @return string
     */
    public function getShipFirstName() : ?string
    {
        return $this->shipFirstName;
    }

    /**
     * Get Ship_LastName.
     *
     * @return string
     */
    public function getShipLastName() : ?string
    {
        return $this->shipLastName;
    }

    /**
     * Get Ship_Email.
     *
     * @return string
     */
    public function getShipEmail() : ?string
    {
        return $this->shipEmail;
    }

    /**
     * Get Ship_Phone.
     *
     * @return string
     */
    public function getShipPhone() : ?string
    {
        return $this->shipPhone;
    }

    /**
     * Get Ship_Fax.
     *
     * @return string
     */
    public function getShipFax() : ?string
    {
        return $this->shipFax;
    }

    /**
     * Get Ship_Company.
     *
     * @return string
     */
    public function getShipCompany() : ?string
    {
        return $this->shipCompany;
    }

    /**
     * Get Ship_Address1.
     *
     * @return string
     */
    public function getShipAddress1() : ?string
    {
        return $this->shipAddress1;
    }

    /**
     * Get Ship_Address2.
     *
     * @return string
     */
    public function getShipAddress2() : ?string
    {
        return $this->shipAddress2;
    }

    /**
     * Get Ship_City.
     *
     * @return string
     */
    public function getShipCity() : ?string
    {
        return $this->shipCity;
    }

    /**
     * Get Ship_State.
     *
     * @return string
     */
    public function getShipState() : ?string
    {
        return $this->shipState;
    }

    /**
     * Get Ship_Zip.
     *
     * @return string
     */
    public function getShipZip() : ?string
    {
        return $this->shipZip;
    }

    /**
     * Get Ship_Country.
     *
     * @return string
     */
    public function getShipCountry() : ?string
    {
        return $this->shipCountry;
    }

    /**
     * Get Bill_FirstName.
     *
     * @return string
     */
    public function getBillFirstName() : ?string
    {
        return $this->billFirstName;
    }

    /**
     * Get Bill_LastName.
     *
     * @return string
     */
    public function getBillLastName() : ?string
    {
        return $this->billLastName;
    }

    /**
     * Get Bill_Email.
     *
     * @return string
     */
    public function getBillEmail() : ?string
    {
        return $this->billEmail;
    }

    /**
     * Get Bill_Phone.
     *
     * @return string
     */
    public function getBillPhone() : ?string
    {
        return $this->billPhone;
    }

    /**
     * Get Bill_Fax.
     *
     * @return string
     */
    public function getBillFax() : ?string
    {
        return $this->billFax;
    }

    /**
     * Get Bill_Company.
     *
     * @return string
     */
    public function getBillCompany() : ?string
    {
        return $this->billCompany;
    }

    /**
     * Get Bill_Address1.
     *
     * @return string
     */
    public function getBillAddress1() : ?string
    {
        return $this->billAddress1;
    }

    /**
     * Get Bill_Address2.
     *
     * @return string
     */
    public function getBillAddress2() : ?string
    {
        return $this->billAddress2;
    }

    /**
     * Get Bill_City.
     *
     * @return string
     */
    public function getBillCity() : ?string
    {
        return $this->billCity;
    }

    /**
     * Get Bill_State.
     *
     * @return string
     */
    public function getBillState() : ?string
    {
        return $this->billState;
    }

    /**
     * Get Bill_Zip.
     *
     * @return string
     */
    public function getBillZip() : ?string
    {
        return $this->billZip;
    }

    /**
     * Get Bill_Country.
     *
     * @return string
     */
    public function getBillCountry() : ?string
    {
        return $this->billCountry;
    }

    /**
     * Set Order_ID.
     *
     * @param ?int $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId) : self
    {
        $this->orderId = $orderId;

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
     * Set Ship_Residential.
     *
     * @param ?bool $shipResidential
     * @return $this
     */
    public function setShipResidential(?bool $shipResidential) : self
    {
        $this->shipResidential = $shipResidential;

        return $this;
    }

    /**
     * Set Ship_FirstName.
     *
     * @param ?string $shipFirstName
     * @return $this
     */
    public function setShipFirstName(?string $shipFirstName) : self
    {
        $this->shipFirstName = $shipFirstName;

        return $this;
    }

    /**
     * Set Ship_LastName.
     *
     * @param ?string $shipLastName
     * @return $this
     */
    public function setShipLastName(?string $shipLastName) : self
    {
        $this->shipLastName = $shipLastName;

        return $this;
    }

    /**
     * Set Ship_Email.
     *
     * @param ?string $shipEmail
     * @return $this
     */
    public function setShipEmail(?string $shipEmail) : self
    {
        $this->shipEmail = $shipEmail;

        return $this;
    }

    /**
     * Set Ship_Phone.
     *
     * @param ?string $shipPhone
     * @return $this
     */
    public function setShipPhone(?string $shipPhone) : self
    {
        $this->shipPhone = $shipPhone;

        return $this;
    }

    /**
     * Set Ship_Fax.
     *
     * @param ?string $shipFax
     * @return $this
     */
    public function setShipFax(?string $shipFax) : self
    {
        $this->shipFax = $shipFax;

        return $this;
    }

    /**
     * Set Ship_Company.
     *
     * @param ?string $shipCompany
     * @return $this
     */
    public function setShipCompany(?string $shipCompany) : self
    {
        $this->shipCompany = $shipCompany;

        return $this;
    }

    /**
     * Set Ship_Address1.
     *
     * @param ?string $shipAddress1
     * @return $this
     */
    public function setShipAddress1(?string $shipAddress1) : self
    {
        $this->shipAddress1 = $shipAddress1;

        return $this;
    }

    /**
     * Set Ship_Address2.
     *
     * @param ?string $shipAddress2
     * @return $this
     */
    public function setShipAddress2(?string $shipAddress2) : self
    {
        $this->shipAddress2 = $shipAddress2;

        return $this;
    }

    /**
     * Set Ship_City.
     *
     * @param ?string $shipCity
     * @return $this
     */
    public function setShipCity(?string $shipCity) : self
    {
        $this->shipCity = $shipCity;

        return $this;
    }

    /**
     * Set Ship_State.
     *
     * @param ?string $shipState
     * @return $this
     */
    public function setShipState(?string $shipState) : self
    {
        $this->shipState = $shipState;

        return $this;
    }

    /**
     * Set Ship_Zip.
     *
     * @param ?string $shipZip
     * @return $this
     */
    public function setShipZip(?string $shipZip) : self
    {
        $this->shipZip = $shipZip;

        return $this;
    }

    /**
     * Set Ship_Country.
     *
     * @param ?string $shipCountry
     * @return $this
     */
    public function setShipCountry(?string $shipCountry) : self
    {
        $this->shipCountry = $shipCountry;

        return $this;
    }

    /**
     * Set Bill_FirstName.
     *
     * @param ?string $billFirstName
     * @return $this
     */
    public function setBillFirstName(?string $billFirstName) : self
    {
        $this->billFirstName = $billFirstName;

        return $this;
    }

    /**
     * Set Bill_LastName.
     *
     * @param ?string $billLastName
     * @return $this
     */
    public function setBillLastName(?string $billLastName) : self
    {
        $this->billLastName = $billLastName;

        return $this;
    }

    /**
     * Set Bill_Email.
     *
     * @param ?string $billEmail
     * @return $this
     */
    public function setBillEmail(?string $billEmail) : self
    {
        $this->billEmail = $billEmail;

        return $this;
    }

    /**
     * Set Bill_Phone.
     *
     * @param ?string $billPhone
     * @return $this
     */
    public function setBillPhone(?string $billPhone) : self
    {
        $this->billPhone = $billPhone;

        return $this;
    }

    /**
     * Set Bill_Fax.
     *
     * @param ?string $billFax
     * @return $this
     */
    public function setBillFax(?string $billFax) : self
    {
        $this->billFax = $billFax;

        return $this;
    }

    /**
     * Set Bill_Company.
     *
     * @param ?string $billCompany
     * @return $this
     */
    public function setBillCompany(?string $billCompany) : self
    {
        $this->billCompany = $billCompany;

        return $this;
    }

    /**
     * Set Bill_Address1.
     *
     * @param ?string $billAddress1
     * @return $this
     */
    public function setBillAddress1(?string $billAddress1) : self
    {
        $this->billAddress1 = $billAddress1;

        return $this;
    }

    /**
     * Set Bill_Address2.
     *
     * @param ?string $billAddress2
     * @return $this
     */
    public function setBillAddress2(?string $billAddress2) : self
    {
        $this->billAddress2 = $billAddress2;

        return $this;
    }

    /**
     * Set Bill_City.
     *
     * @param ?string $billCity
     * @return $this
     */
    public function setBillCity(?string $billCity) : self
    {
        $this->billCity = $billCity;

        return $this;
    }

    /**
     * Set Bill_State.
     *
     * @param ?string $billState
     * @return $this
     */
    public function setBillState(?string $billState) : self
    {
        $this->billState = $billState;

        return $this;
    }

    /**
     * Set Bill_Zip.
     *
     * @param ?string $billZip
     * @return $this
     */
    public function setBillZip(?string $billZip) : self
    {
        $this->billZip = $billZip;

        return $this;
    }

    /**
     * Set Bill_Country.
     *
     * @param ?string $billCountry
     * @return $this
     */
    public function setBillCountry(?string $billCountry) : self
    {
        $this->billCountry = $billCountry;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Order_ID'] = $this->getOrderId();

        if (!is_null($this->getCustomerId())) {
            $data['Customer_ID'] = $this->getCustomerId();
        }

        if (!is_null($this->getShipResidential())) {
            $data['Ship_Residential'] = $this->getShipResidential();
        }

        if (!is_null($this->getShipFirstName())) {
            $data['Ship_FirstName'] = $this->getShipFirstName();
        }

        if (!is_null($this->getShipLastName())) {
            $data['Ship_LastName'] = $this->getShipLastName();
        }

        if (!is_null($this->getShipEmail())) {
            $data['Ship_Email'] = $this->getShipEmail();
        }

        if (!is_null($this->getShipPhone())) {
            $data['Ship_Phone'] = $this->getShipPhone();
        }

        if (!is_null($this->getShipFax())) {
            $data['Ship_Fax'] = $this->getShipFax();
        }

        if (!is_null($this->getShipCompany())) {
            $data['Ship_Company'] = $this->getShipCompany();
        }

        if (!is_null($this->getShipAddress1())) {
            $data['Ship_Address1'] = $this->getShipAddress1();
        }

        if (!is_null($this->getShipAddress2())) {
            $data['Ship_Address2'] = $this->getShipAddress2();
        }

        if (!is_null($this->getShipCity())) {
            $data['Ship_City'] = $this->getShipCity();
        }

        if (!is_null($this->getShipState())) {
            $data['Ship_State'] = $this->getShipState();
        }

        if (!is_null($this->getShipZip())) {
            $data['Ship_Zip'] = $this->getShipZip();
        }

        if (!is_null($this->getShipCountry())) {
            $data['Ship_Country'] = $this->getShipCountry();
        }

        if (!is_null($this->getBillFirstName())) {
            $data['Bill_FirstName'] = $this->getBillFirstName();
        }

        if (!is_null($this->getBillLastName())) {
            $data['Bill_LastName'] = $this->getBillLastName();
        }

        if (!is_null($this->getBillEmail())) {
            $data['Bill_Email'] = $this->getBillEmail();
        }

        if (!is_null($this->getBillPhone())) {
            $data['Bill_Phone'] = $this->getBillPhone();
        }

        if (!is_null($this->getBillFax())) {
            $data['Bill_Fax'] = $this->getBillFax();
        }

        if (!is_null($this->getBillCompany())) {
            $data['Bill_Company'] = $this->getBillCompany();
        }

        if (!is_null($this->getBillAddress1())) {
            $data['Bill_Address1'] = $this->getBillAddress1();
        }

        if (!is_null($this->getBillAddress2())) {
            $data['Bill_Address2'] = $this->getBillAddress2();
        }

        if (!is_null($this->getBillCity())) {
            $data['Bill_City'] = $this->getBillCity();
        }

        if (!is_null($this->getBillState())) {
            $data['Bill_State'] = $this->getBillState();
        }

        if (!is_null($this->getBillZip())) {
            $data['Bill_Zip'] = $this->getBillZip();
        }

        if (!is_null($this->getBillCountry())) {
            $data['Bill_Country'] = $this->getBillCountry();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderUpdateCustomerInformation($this, $httpResponse, $data);
    }
}
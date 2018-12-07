<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Order;

/**
 * Handles API Request Order_Update_Customer_Information.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/order_update_customer_information
 */
class OrderUpdateCustomerInformation extends Request
{
    /** @var string The API function name */
    protected $function = 'Order_Update_Customer_Information';

    /** @var int */
    protected $orderId;

    /** @var int */
    protected $customerId;

    /** @var bool */
    protected $shipResidential;

    /** @var string */
    protected $shipFirstName;

    /** @var string */
    protected $shipLastName;

    /** @var string */
    protected $shipEmail;

    /** @var string */
    protected $shipPhone;

    /** @var string */
    protected $shipFax;

    /** @var string */
    protected $shipCompany;

    /** @var string */
    protected $shipAddress1;

    /** @var string */
    protected $shipAddress2;

    /** @var string */
    protected $shipCity;

    /** @var string */
    protected $shipState;

    /** @var string */
    protected $shipZip;

    /** @var string */
    protected $shipCountry;

    /** @var string */
    protected $billFirstName;

    /** @var string */
    protected $billLastName;

    /** @var string */
    protected $billEmail;

    /** @var string */
    protected $billPhone;

    /** @var string */
    protected $billFax;

    /** @var string */
    protected $billCompany;

    /** @var string */
    protected $billAddress1;

    /** @var string */
    protected $billAddress2;

    /** @var string */
    protected $billCity;

    /** @var string */
    protected $billState;

    /** @var string */
    protected $billZip;

    /** @var string */
    protected $billCountry;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(Order $order = null)
    {
        if ($order) {
            $this->setOrderId($order->getId());
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
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
     * Get Ship_Residential.
     *
     * @return bool
     */
    public function getShipResidential()
    {
        return $this->shipResidential;
    }

    /**
     * Get Ship_FirstName.
     *
     * @return string
     */
    public function getShipFirstName()
    {
        return $this->shipFirstName;
    }

    /**
     * Get Ship_LastName.
     *
     * @return string
     */
    public function getShipLastName()
    {
        return $this->shipLastName;
    }

    /**
     * Get Ship_Email.
     *
     * @return string
     */
    public function getShipEmail()
    {
        return $this->shipEmail;
    }

    /**
     * Get Ship_Phone.
     *
     * @return string
     */
    public function getShipPhone()
    {
        return $this->shipPhone;
    }

    /**
     * Get Ship_Fax.
     *
     * @return string
     */
    public function getShipFax()
    {
        return $this->shipFax;
    }

    /**
     * Get Ship_Company.
     *
     * @return string
     */
    public function getShipCompany()
    {
        return $this->shipCompany;
    }

    /**
     * Get Ship_Address1.
     *
     * @return string
     */
    public function getShipAddress1()
    {
        return $this->shipAddress1;
    }

    /**
     * Get Ship_Address2.
     *
     * @return string
     */
    public function getShipAddress2()
    {
        return $this->shipAddress2;
    }

    /**
     * Get Ship_City.
     *
     * @return string
     */
    public function getShipCity()
    {
        return $this->shipCity;
    }

    /**
     * Get Ship_State.
     *
     * @return string
     */
    public function getShipState()
    {
        return $this->shipState;
    }

    /**
     * Get Ship_Zip.
     *
     * @return string
     */
    public function getShipZip()
    {
        return $this->shipZip;
    }

    /**
     * Get Ship_Country.
     *
     * @return string
     */
    public function getShipCountry()
    {
        return $this->shipCountry;
    }

    /**
     * Get Bill_FirstName.
     *
     * @return string
     */
    public function getBillFirstName()
    {
        return $this->billFirstName;
    }

    /**
     * Get Bill_LastName.
     *
     * @return string
     */
    public function getBillLastName()
    {
        return $this->billLastName;
    }

    /**
     * Get Bill_Email.
     *
     * @return string
     */
    public function getBillEmail()
    {
        return $this->billEmail;
    }

    /**
     * Get Bill_Phone.
     *
     * @return string
     */
    public function getBillPhone()
    {
        return $this->billPhone;
    }

    /**
     * Get Bill_Fax.
     *
     * @return string
     */
    public function getBillFax()
    {
        return $this->billFax;
    }

    /**
     * Get Bill_Company.
     *
     * @return string
     */
    public function getBillCompany()
    {
        return $this->billCompany;
    }

    /**
     * Get Bill_Address1.
     *
     * @return string
     */
    public function getBillAddress1()
    {
        return $this->billAddress1;
    }

    /**
     * Get Bill_Address2.
     *
     * @return string
     */
    public function getBillAddress2()
    {
        return $this->billAddress2;
    }

    /**
     * Get Bill_City.
     *
     * @return string
     */
    public function getBillCity()
    {
        return $this->billCity;
    }

    /**
     * Get Bill_State.
     *
     * @return string
     */
    public function getBillState()
    {
        return $this->billState;
    }

    /**
     * Get Bill_Zip.
     *
     * @return string
     */
    public function getBillZip()
    {
        return $this->billZip;
    }

    /**
     * Get Bill_Country.
     *
     * @return string
     */
    public function getBillCountry()
    {
        return $this->billCountry;
    }

    /**
     * Set Order_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

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
     * Set Ship_Residential.
     *
     * @param bool
     * @return $this
     */
    public function setShipResidential($shipResidential)
    {
        $this->shipResidential = $shipResidential;

        return $this;
    }

    /**
     * Set Ship_FirstName.
     *
     * @param string
     * @return $this
     */
    public function setShipFirstName($shipFirstName)
    {
        $this->shipFirstName = $shipFirstName;

        return $this;
    }

    /**
     * Set Ship_LastName.
     *
     * @param string
     * @return $this
     */
    public function setShipLastName($shipLastName)
    {
        $this->shipLastName = $shipLastName;

        return $this;
    }

    /**
     * Set Ship_Email.
     *
     * @param string
     * @return $this
     */
    public function setShipEmail($shipEmail)
    {
        $this->shipEmail = $shipEmail;

        return $this;
    }

    /**
     * Set Ship_Phone.
     *
     * @param string
     * @return $this
     */
    public function setShipPhone($shipPhone)
    {
        $this->shipPhone = $shipPhone;

        return $this;
    }

    /**
     * Set Ship_Fax.
     *
     * @param string
     * @return $this
     */
    public function setShipFax($shipFax)
    {
        $this->shipFax = $shipFax;

        return $this;
    }

    /**
     * Set Ship_Company.
     *
     * @param string
     * @return $this
     */
    public function setShipCompany($shipCompany)
    {
        $this->shipCompany = $shipCompany;

        return $this;
    }

    /**
     * Set Ship_Address1.
     *
     * @param string
     * @return $this
     */
    public function setShipAddress1($shipAddress1)
    {
        $this->shipAddress1 = $shipAddress1;

        return $this;
    }

    /**
     * Set Ship_Address2.
     *
     * @param string
     * @return $this
     */
    public function setShipAddress2($shipAddress2)
    {
        $this->shipAddress2 = $shipAddress2;

        return $this;
    }

    /**
     * Set Ship_City.
     *
     * @param string
     * @return $this
     */
    public function setShipCity($shipCity)
    {
        $this->shipCity = $shipCity;

        return $this;
    }

    /**
     * Set Ship_State.
     *
     * @param string
     * @return $this
     */
    public function setShipState($shipState)
    {
        $this->shipState = $shipState;

        return $this;
    }

    /**
     * Set Ship_Zip.
     *
     * @param string
     * @return $this
     */
    public function setShipZip($shipZip)
    {
        $this->shipZip = $shipZip;

        return $this;
    }

    /**
     * Set Ship_Country.
     *
     * @param string
     * @return $this
     */
    public function setShipCountry($shipCountry)
    {
        $this->shipCountry = $shipCountry;

        return $this;
    }

    /**
     * Set Bill_FirstName.
     *
     * @param string
     * @return $this
     */
    public function setBillFirstName($billFirstName)
    {
        $this->billFirstName = $billFirstName;

        return $this;
    }

    /**
     * Set Bill_LastName.
     *
     * @param string
     * @return $this
     */
    public function setBillLastName($billLastName)
    {
        $this->billLastName = $billLastName;

        return $this;
    }

    /**
     * Set Bill_Email.
     *
     * @param string
     * @return $this
     */
    public function setBillEmail($billEmail)
    {
        $this->billEmail = $billEmail;

        return $this;
    }

    /**
     * Set Bill_Phone.
     *
     * @param string
     * @return $this
     */
    public function setBillPhone($billPhone)
    {
        $this->billPhone = $billPhone;

        return $this;
    }

    /**
     * Set Bill_Fax.
     *
     * @param string
     * @return $this
     */
    public function setBillFax($billFax)
    {
        $this->billFax = $billFax;

        return $this;
    }

    /**
     * Set Bill_Company.
     *
     * @param string
     * @return $this
     */
    public function setBillCompany($billCompany)
    {
        $this->billCompany = $billCompany;

        return $this;
    }

    /**
     * Set Bill_Address1.
     *
     * @param string
     * @return $this
     */
    public function setBillAddress1($billAddress1)
    {
        $this->billAddress1 = $billAddress1;

        return $this;
    }

    /**
     * Set Bill_Address2.
     *
     * @param string
     * @return $this
     */
    public function setBillAddress2($billAddress2)
    {
        $this->billAddress2 = $billAddress2;

        return $this;
    }

    /**
     * Set Bill_City.
     *
     * @param string
     * @return $this
     */
    public function setBillCity($billCity)
    {
        $this->billCity = $billCity;

        return $this;
    }

    /**
     * Set Bill_State.
     *
     * @param string
     * @return $this
     */
    public function setBillState($billState)
    {
        $this->billState = $billState;

        return $this;
    }

    /**
     * Set Bill_Zip.
     *
     * @param string
     * @return $this
     */
    public function setBillZip($billZip)
    {
        $this->billZip = $billZip;

        return $this;
    }

    /**
     * Set Bill_Country.
     *
     * @param string
     * @return $this
     */
    public function setBillCountry($billCountry)
    {
        $this->billCountry = $billCountry;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

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

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderUpdateCustomerInformation($this, $httpResponse, $data);
    }
}
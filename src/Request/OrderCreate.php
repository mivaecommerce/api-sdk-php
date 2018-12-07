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
use MerchantAPI\Model\OrderItem;
use MerchantAPI\Model\OrderProduct;
use MerchantAPI\Model\OrderCharge;
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Customer;
use MerchantAPI\Model\Order;

/**
 * Handles API Request Order_Create.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/order_create
 */
class OrderCreate extends Request
{
    /** @var string The API function name */
    protected $function = 'Order_Create';

    /** @var string */
    protected $customerLogin;

    /** @var int */
    protected $customerId;

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

    /** @var bool */
    protected $shipResidential;

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

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderItem[] */
    protected $items = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderProduct[] */
    protected $products = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderCharge[] */
    protected $charges = [];

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected $customFieldValues = null;

    /** @var string */
    protected $shippingModuleCode;

    /** @var string */
    protected $shippingModuleData;

    /** @var bool */
    protected $calculateCharges;

    /** @var bool */
    protected $triggerFulfillmentModules;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Customer
     */
    public function __construct(Customer $customer = null)
    {
        $this->customFieldValues = new CustomFieldValues();

        $this->items = new \MerchantAPI\Collection();
        $this->products = new \MerchantAPI\Collection();
        $this->charges = new \MerchantAPI\Collection();

        if ($customer) {
            if ($customer->getId()) {
                $this->setCustomerId($customer->getId());
            } else if ($customer->getLogin()) {
                $this->setCustomerLogin($customer->getLogin());
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
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Get ShipFirstName.
     *
     * @return string
     */
    public function getShipFirstName()
    {
        return $this->shipFirstName;
    }

    /**
     * Get ShipLastName.
     *
     * @return string
     */
    public function getShipLastName()
    {
        return $this->shipLastName;
    }

    /**
     * Get ShipEmail.
     *
     * @return string
     */
    public function getShipEmail()
    {
        return $this->shipEmail;
    }

    /**
     * Get ShipPhone.
     *
     * @return string
     */
    public function getShipPhone()
    {
        return $this->shipPhone;
    }

    /**
     * Get ShipFax.
     *
     * @return string
     */
    public function getShipFax()
    {
        return $this->shipFax;
    }

    /**
     * Get ShipCompany.
     *
     * @return string
     */
    public function getShipCompany()
    {
        return $this->shipCompany;
    }

    /**
     * Get ShipAddress1.
     *
     * @return string
     */
    public function getShipAddress1()
    {
        return $this->shipAddress1;
    }

    /**
     * Get ShipAddress2.
     *
     * @return string
     */
    public function getShipAddress2()
    {
        return $this->shipAddress2;
    }

    /**
     * Get ShipCity.
     *
     * @return string
     */
    public function getShipCity()
    {
        return $this->shipCity;
    }

    /**
     * Get ShipState.
     *
     * @return string
     */
    public function getShipState()
    {
        return $this->shipState;
    }

    /**
     * Get ShipZip.
     *
     * @return string
     */
    public function getShipZip()
    {
        return $this->shipZip;
    }

    /**
     * Get ShipCountry.
     *
     * @return string
     */
    public function getShipCountry()
    {
        return $this->shipCountry;
    }

    /**
     * Get ShipResidential.
     *
     * @return bool
     */
    public function getShipResidential()
    {
        return $this->shipResidential;
    }

    /**
     * Get BillFirstName.
     *
     * @return string
     */
    public function getBillFirstName()
    {
        return $this->billFirstName;
    }

    /**
     * Get BillLastName.
     *
     * @return string
     */
    public function getBillLastName()
    {
        return $this->billLastName;
    }

    /**
     * Get BillEmail.
     *
     * @return string
     */
    public function getBillEmail()
    {
        return $this->billEmail;
    }

    /**
     * Get BillPhone.
     *
     * @return string
     */
    public function getBillPhone()
    {
        return $this->billPhone;
    }

    /**
     * Get BillFax.
     *
     * @return string
     */
    public function getBillFax()
    {
        return $this->billFax;
    }

    /**
     * Get BillCompany.
     *
     * @return string
     */
    public function getBillCompany()
    {
        return $this->billCompany;
    }

    /**
     * Get BillAddress1.
     *
     * @return string
     */
    public function getBillAddress1()
    {
        return $this->billAddress1;
    }

    /**
     * Get BillAddress2.
     *
     * @return string
     */
    public function getBillAddress2()
    {
        return $this->billAddress2;
    }

    /**
     * Get BillCity.
     *
     * @return string
     */
    public function getBillCity()
    {
        return $this->billCity;
    }

    /**
     * Get BillState.
     *
     * @return string
     */
    public function getBillState()
    {
        return $this->billState;
    }

    /**
     * Get BillZip.
     *
     * @return string
     */
    public function getBillZip()
    {
        return $this->billZip;
    }

    /**
     * Get BillCountry.
     *
     * @return string
     */
    public function getBillCountry()
    {
        return $this->billCountry;
    }

    /**
     * Get Items.
     *
     * @return \MerchantAPI\Model\OrderItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Get Products.
     *
     * @return \MerchantAPI\Model\OrderProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Get Charges.
     *
     * @return \MerchantAPI\Model\OrderCharge[]
     */
    public function getCharges()
    {
        return $this->charges;
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
     * Get Shipping_Module_Code.
     *
     * @return string
     */
    public function getShippingModuleCode()
    {
        return $this->shippingModuleCode;
    }

    /**
     * Get Shipping_Module_Data.
     *
     * @return string
     */
    public function getShippingModuleData()
    {
        return $this->shippingModuleData;
    }

    /**
     * Get CalculateCharges.
     *
     * @return bool
     */
    public function getCalculateCharges()
    {
        return $this->calculateCharges;
    }

    /**
     * Get TriggerFulfillmentModules.
     *
     * @return bool
     */
    public function getTriggerFulfillmentModules()
    {
        return $this->triggerFulfillmentModules;
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
     * Set ShipFirstName.
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
     * Set ShipLastName.
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
     * Set ShipEmail.
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
     * Set ShipPhone.
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
     * Set ShipFax.
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
     * Set ShipCompany.
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
     * Set ShipAddress1.
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
     * Set ShipAddress2.
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
     * Set ShipCity.
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
     * Set ShipState.
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
     * Set ShipZip.
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
     * Set ShipCountry.
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
     * Set ShipResidential.
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
     * Set BillFirstName.
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
     * Set BillLastName.
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
     * Set BillEmail.
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
     * Set BillPhone.
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
     * Set BillFax.
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
     * Set BillCompany.
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
     * Set BillAddress1.
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
     * Set BillAddress2.
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
     * Set BillCity.
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
     * Set BillState.
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
     * Set BillZip.
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
     * Set BillCountry.
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
     * Set Items.
     *
     * @param (\MerchantAPI\Model\OrderItem|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setItems(array $items)
    {
        foreach ($items as &$model) {
            if (is_array($model)) {
                $model = new OrderItem($model);
            } else if (!$model instanceof OrderItem) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItem or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->items = $items;

        return $this;
    }

    /**
     * Set Products.
     *
     * @param (\MerchantAPI\Model\OrderProduct|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setProducts(array $products)
    {
        foreach ($products as &$model) {
            if (is_array($model)) {
                $model = new OrderProduct($model);
            } else if (!$model instanceof OrderProduct) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderProduct or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->products = $products;

        return $this;
    }

    /**
     * Set Charges.
     *
     * @param (\MerchantAPI\Model\OrderCharge|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCharges(array $charges)
    {
        foreach ($charges as &$model) {
            if (is_array($model)) {
                $model = new OrderCharge($model);
            } else if (!$model instanceof OrderCharge) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderCharge or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->charges = $charges;

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
     * Set Shipping_Module_Code.
     *
     * @param string
     * @return $this
     */
    public function setShippingModuleCode($shippingModuleCode)
    {
        $this->shippingModuleCode = $shippingModuleCode;

        return $this;
    }

    /**
     * Set Shipping_Module_Data.
     *
     * @param string
     * @return $this
     */
    public function setShippingModuleData($shippingModuleData)
    {
        $this->shippingModuleData = $shippingModuleData;

        return $this;
    }

    /**
     * Set CalculateCharges.
     *
     * @param bool
     * @return $this
     */
    public function setCalculateCharges($calculateCharges)
    {
        $this->calculateCharges = $calculateCharges;

        return $this;
    }

    /**
     * Set TriggerFulfillmentModules.
     *
     * @param bool
     * @return $this
     */
    public function setTriggerFulfillmentModules($triggerFulfillmentModules)
    {
        $this->triggerFulfillmentModules = $triggerFulfillmentModules;

        return $this;
    }

    /**
     * Add Items.
     *
     * @param \MerchantAPI\Model\OrderItem
     *
     * @return $this
     */
    public function addItem(OrderItem $model)
    {
        $this->items[] = $model;
        return $this;
    }

    /**
     * Add many OrderItem.
     *
     * @param (\MerchantAPI\Model\OrderItem|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addItems(array $items)
    {
        foreach ($items as $e) {
            if (is_array($e)) {
                $this->items[] = new OrderItem($e);
            } else if ($e instanceof OrderItem) {
                $this->items[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItem or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Products.
     *
     * @param \MerchantAPI\Model\OrderProduct
     *
     * @return $this
     */
    public function addProduct(OrderProduct $model)
    {
        $this->products[] = $model;
        return $this;
    }

    /**
     * Add many OrderProduct.
     *
     * @param (\MerchantAPI\Model\OrderProduct|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addProducts(array $products)
    {
        foreach ($products as $e) {
            if (is_array($e)) {
                $this->products[] = new OrderProduct($e);
            } else if ($e instanceof OrderProduct) {
                $this->products[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderProduct or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Charges.
     *
     * @param \MerchantAPI\Model\OrderCharge
     *
     * @return $this
     */
    public function addCharge(OrderCharge $model)
    {
        $this->charges[] = $model;
        return $this;
    }

    /**
     * Add many OrderCharge.
     *
     * @param (\MerchantAPI\Model\OrderCharge|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addCharges(array $charges)
    {
        foreach ($charges as $e) {
            if (is_array($e)) {
                $this->charges[] = new OrderCharge($e);
            } else if ($e instanceof OrderCharge) {
                $this->charges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderCharge or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        if (!is_null($this->getShipFirstName())) {
            $data['ShipFirstName'] = $this->getShipFirstName();
        }

        if (!is_null($this->getShipLastName())) {
            $data['ShipLastName'] = $this->getShipLastName();
        }

        if (!is_null($this->getShipEmail())) {
            $data['ShipEmail'] = $this->getShipEmail();
        }

        if (!is_null($this->getShipPhone())) {
            $data['ShipPhone'] = $this->getShipPhone();
        }

        if (!is_null($this->getShipFax())) {
            $data['ShipFax'] = $this->getShipFax();
        }

        if (!is_null($this->getShipCompany())) {
            $data['ShipCompany'] = $this->getShipCompany();
        }

        if (!is_null($this->getShipAddress1())) {
            $data['ShipAddress1'] = $this->getShipAddress1();
        }

        if (!is_null($this->getShipAddress2())) {
            $data['ShipAddress2'] = $this->getShipAddress2();
        }

        if (!is_null($this->getShipCity())) {
            $data['ShipCity'] = $this->getShipCity();
        }

        if (!is_null($this->getShipState())) {
            $data['ShipState'] = $this->getShipState();
        }

        if (!is_null($this->getShipZip())) {
            $data['ShipZip'] = $this->getShipZip();
        }

        if (!is_null($this->getShipCountry())) {
            $data['ShipCountry'] = $this->getShipCountry();
        }

        if (!is_null($this->getShipResidential())) {
            $data['ShipResidential'] = $this->getShipResidential();
        }

        if (!is_null($this->getBillFirstName())) {
            $data['BillFirstName'] = $this->getBillFirstName();
        }

        if (!is_null($this->getBillLastName())) {
            $data['BillLastName'] = $this->getBillLastName();
        }

        if (!is_null($this->getBillEmail())) {
            $data['BillEmail'] = $this->getBillEmail();
        }

        if (!is_null($this->getBillPhone())) {
            $data['BillPhone'] = $this->getBillPhone();
        }

        if (!is_null($this->getBillFax())) {
            $data['BillFax'] = $this->getBillFax();
        }

        if (!is_null($this->getBillCompany())) {
            $data['BillCompany'] = $this->getBillCompany();
        }

        if (!is_null($this->getBillAddress1())) {
            $data['BillAddress1'] = $this->getBillAddress1();
        }

        if (!is_null($this->getBillAddress2())) {
            $data['BillAddress2'] = $this->getBillAddress2();
        }

        if (!is_null($this->getBillCity())) {
            $data['BillCity'] = $this->getBillCity();
        }

        if (!is_null($this->getBillState())) {
            $data['BillState'] = $this->getBillState();
        }

        if (!is_null($this->getBillZip())) {
            $data['BillZip'] = $this->getBillZip();
        }

        if (!is_null($this->getBillCountry())) {
            $data['BillCountry'] = $this->getBillCountry();
        }

        if (count($this->getItems())) {
            $data['Items'] = [];

            foreach ($this->getItems() as $i => $item) {
                if ($item->hasData()) {
                    $data['Items'][] = $item->getData();
                }
            }
        }

        if (count($this->getProducts())) {
            $data['Products'] = [];

            foreach ($this->getProducts() as $i => $product) {
                if ($product->hasData()) {
                    $data['Products'][] = $product->getData();
                }
            }
        }

        if (count($this->getCharges())) {
            $data['Charges'] = [];

            foreach ($this->getCharges() as $i => $charge) {
                if ($charge->hasData()) {
                    $data['Charges'][] = $charge->getData();
                }
            }
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        if (!is_null($this->getShippingModuleCode())) {
            $data['Shipping_Module_Code'] = $this->getShippingModuleCode();
        }

        if (!is_null($this->getShippingModuleData())) {
            $data['Shipping_Module_Data'] = $this->getShippingModuleData();
        }

        if (!is_null($this->getCalculateCharges())) {
            $data['CalculateCharges'] = $this->getCalculateCharges();
        }

        if (!is_null($this->getTriggerFulfillmentModules())) {
            $data['TriggerFulfillmentModules'] = $this->getTriggerFulfillmentModules();
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
        return new \MerchantAPI\Response\OrderCreate($this, $httpResponse, $data);
    }
}
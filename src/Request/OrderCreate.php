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
use MerchantAPI\Model\OrderItem;
use MerchantAPI\Model\OrderProduct;
use MerchantAPI\Model\OrderCharge;
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Customer;
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request Order_Create.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/order_create
 */
class OrderCreate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Order_Create';

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?int */
    protected ?int $customerId = null;

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

    /** @var ?bool */
    protected ?bool $shipResidential = null;

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

    /** @var \MerchantAPI\Collection */
    protected Collection $items;

    /** @var \MerchantAPI\Collection */
    protected Collection $products;

    /** @var \MerchantAPI\Collection */
    protected Collection $charges;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

    /** @var ?string */
    protected ?string $shippingModuleCode = null;

    /** @var ?string */
    protected ?string $shippingModuleData = null;

    /** @var ?bool */
    protected ?bool $calculateCharges = null;

    /** @var ?bool */
    protected ?bool $triggerFulfillmentModules = null;

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

        $this->items = new Collection();
        $this->products = new Collection();
        $this->charges = new Collection();

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
    public function getCustomerLogin() : ?string
    {
        return $this->customerLogin;
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
     * Get ShipFirstName.
     *
     * @return string
     */
    public function getShipFirstName() : ?string
    {
        return $this->shipFirstName;
    }

    /**
     * Get ShipLastName.
     *
     * @return string
     */
    public function getShipLastName() : ?string
    {
        return $this->shipLastName;
    }

    /**
     * Get ShipEmail.
     *
     * @return string
     */
    public function getShipEmail() : ?string
    {
        return $this->shipEmail;
    }

    /**
     * Get ShipPhone.
     *
     * @return string
     */
    public function getShipPhone() : ?string
    {
        return $this->shipPhone;
    }

    /**
     * Get ShipFax.
     *
     * @return string
     */
    public function getShipFax() : ?string
    {
        return $this->shipFax;
    }

    /**
     * Get ShipCompany.
     *
     * @return string
     */
    public function getShipCompany() : ?string
    {
        return $this->shipCompany;
    }

    /**
     * Get ShipAddress1.
     *
     * @return string
     */
    public function getShipAddress1() : ?string
    {
        return $this->shipAddress1;
    }

    /**
     * Get ShipAddress2.
     *
     * @return string
     */
    public function getShipAddress2() : ?string
    {
        return $this->shipAddress2;
    }

    /**
     * Get ShipCity.
     *
     * @return string
     */
    public function getShipCity() : ?string
    {
        return $this->shipCity;
    }

    /**
     * Get ShipState.
     *
     * @return string
     */
    public function getShipState() : ?string
    {
        return $this->shipState;
    }

    /**
     * Get ShipZip.
     *
     * @return string
     */
    public function getShipZip() : ?string
    {
        return $this->shipZip;
    }

    /**
     * Get ShipCountry.
     *
     * @return string
     */
    public function getShipCountry() : ?string
    {
        return $this->shipCountry;
    }

    /**
     * Get ShipResidential.
     *
     * @return bool
     */
    public function getShipResidential() : ?bool
    {
        return $this->shipResidential;
    }

    /**
     * Get BillFirstName.
     *
     * @return string
     */
    public function getBillFirstName() : ?string
    {
        return $this->billFirstName;
    }

    /**
     * Get BillLastName.
     *
     * @return string
     */
    public function getBillLastName() : ?string
    {
        return $this->billLastName;
    }

    /**
     * Get BillEmail.
     *
     * @return string
     */
    public function getBillEmail() : ?string
    {
        return $this->billEmail;
    }

    /**
     * Get BillPhone.
     *
     * @return string
     */
    public function getBillPhone() : ?string
    {
        return $this->billPhone;
    }

    /**
     * Get BillFax.
     *
     * @return string
     */
    public function getBillFax() : ?string
    {
        return $this->billFax;
    }

    /**
     * Get BillCompany.
     *
     * @return string
     */
    public function getBillCompany() : ?string
    {
        return $this->billCompany;
    }

    /**
     * Get BillAddress1.
     *
     * @return string
     */
    public function getBillAddress1() : ?string
    {
        return $this->billAddress1;
    }

    /**
     * Get BillAddress2.
     *
     * @return string
     */
    public function getBillAddress2() : ?string
    {
        return $this->billAddress2;
    }

    /**
     * Get BillCity.
     *
     * @return string
     */
    public function getBillCity() : ?string
    {
        return $this->billCity;
    }

    /**
     * Get BillState.
     *
     * @return string
     */
    public function getBillState() : ?string
    {
        return $this->billState;
    }

    /**
     * Get BillZip.
     *
     * @return string
     */
    public function getBillZip() : ?string
    {
        return $this->billZip;
    }

    /**
     * Get BillCountry.
     *
     * @return string
     */
    public function getBillCountry() : ?string
    {
        return $this->billCountry;
    }

    /**
     * Get Items.
     *
     * @return \MerchantAPI\Collection
     */
    public function getItems() : ?Collection
    {
        return $this->items;
    }

    /**
     * Get Products.
     *
     * @return \MerchantAPI\Collection
     */
    public function getProducts() : ?Collection
    {
        return $this->products;
    }

    /**
     * Get Charges.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCharges() : ?Collection
    {
        return $this->charges;
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
     * Get Shipping_Module_Code.
     *
     * @return string
     */
    public function getShippingModuleCode() : ?string
    {
        return $this->shippingModuleCode;
    }

    /**
     * Get Shipping_Module_Data.
     *
     * @return string
     */
    public function getShippingModuleData() : ?string
    {
        return $this->shippingModuleData;
    }

    /**
     * Get CalculateCharges.
     *
     * @return bool
     */
    public function getCalculateCharges() : ?bool
    {
        return $this->calculateCharges;
    }

    /**
     * Get TriggerFulfillmentModules.
     *
     * @return bool
     */
    public function getTriggerFulfillmentModules() : ?bool
    {
        return $this->triggerFulfillmentModules;
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
     * Set ShipFirstName.
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
     * Set ShipLastName.
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
     * Set ShipEmail.
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
     * Set ShipPhone.
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
     * Set ShipFax.
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
     * Set ShipCompany.
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
     * Set ShipAddress1.
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
     * Set ShipAddress2.
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
     * Set ShipCity.
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
     * Set ShipState.
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
     * Set ShipZip.
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
     * Set ShipCountry.
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
     * Set ShipResidential.
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
     * Set BillFirstName.
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
     * Set BillLastName.
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
     * Set BillEmail.
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
     * Set BillPhone.
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
     * Set BillFax.
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
     * Set BillCompany.
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
     * Set BillAddress1.
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
     * Set BillAddress2.
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
     * Set BillCity.
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
     * Set BillState.
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
     * Set BillZip.
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
     * Set BillCountry.
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
     * Set Items.
     *
     * @param \MerchantAPI\Collection|array $items
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setItems($items) : self
    {
        if (!is_array($items) && !$items instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($items) ? get_class($items) : gettype($items)));
        }

        foreach ($items as &$model) {
            if (is_array($model)) {
                $model = new OrderItem($model);
            } else if (!$model instanceof OrderItem) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItem or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->items = new Collection($items);

        return $this;
    }

    /**
     * Set Products.
     *
     * @param \MerchantAPI\Collection|array $products
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setProducts($products) : self
    {
        if (!is_array($products) && !$products instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($products) ? get_class($products) : gettype($products)));
        }

        foreach ($products as &$model) {
            if (is_array($model)) {
                $model = new OrderProduct($model);
            } else if (!$model instanceof OrderProduct) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderProduct or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->products = new Collection($products);

        return $this;
    }

    /**
     * Set Charges.
     *
     * @param \MerchantAPI\Collection|array $charges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCharges($charges) : self
    {
        if (!is_array($charges) && !$charges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($charges) ? get_class($charges) : gettype($charges)));
        }

        foreach ($charges as &$model) {
            if (is_array($model)) {
                $model = new OrderCharge($model);
            } else if (!$model instanceof OrderCharge) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderCharge or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->charges = new Collection($charges);

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
     * Set Shipping_Module_Code.
     *
     * @param ?string $shippingModuleCode
     * @return $this
     */
    public function setShippingModuleCode(?string $shippingModuleCode) : self
    {
        $this->shippingModuleCode = $shippingModuleCode;

        return $this;
    }

    /**
     * Set Shipping_Module_Data.
     *
     * @param ?string $shippingModuleData
     * @return $this
     */
    public function setShippingModuleData(?string $shippingModuleData) : self
    {
        $this->shippingModuleData = $shippingModuleData;

        return $this;
    }

    /**
     * Set CalculateCharges.
     *
     * @param ?bool $calculateCharges
     * @return $this
     */
    public function setCalculateCharges(?bool $calculateCharges) : self
    {
        $this->calculateCharges = $calculateCharges;

        return $this;
    }

    /**
     * Set TriggerFulfillmentModules.
     *
     * @param ?bool $triggerFulfillmentModules
     * @return $this
     */
    public function setTriggerFulfillmentModules(?bool $triggerFulfillmentModules) : self
    {
        $this->triggerFulfillmentModules = $triggerFulfillmentModules;

        return $this;
    }

    /**
     * Add Items.
     *
     * @param \MerchantAPI\Model\OrderItem
     * @return $this
     */
    public function addItem(OrderItem $model) : self
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
    public function addItems(array $items) : self
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
     * @return $this
     */
    public function addProduct(OrderProduct $model) : self
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
    public function addProducts(array $products) : self
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
     * @return $this
     */
    public function addCharge(OrderCharge $model) : self
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
    public function addCharges(array $charges) : self
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
    public function toArray() : array
    {
        $data = parent::toArray();

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderCreate($this, $httpResponse, $data);
    }
}
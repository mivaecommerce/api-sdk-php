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
use MerchantAPI\Model\SubscriptionAttribute;
use MerchantAPI\Model\Subscription;
use MerchantAPI\BaseClient;

/**
 * Handles API Request Subscription_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/subscription_update
 */
class SubscriptionUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Subscription_Update';

    /** @var int */
    protected $subscriptionId;

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $editCustomer;

    /** @var string */
    protected $customerLogin;

    /** @var int */
    protected $addressId;

    /** @var int */
    protected $customerAddressId;

    /** @var int */
    protected $productId;

    /** @var string */
    protected $editProduct;

    /** @var string */
    protected $productCode;

    /** @var int */
    protected $productSubscriptionTermId;

    /** @var string */
    protected $productSubscriptionTermDescription;

    /** @var int */
    protected $quantity;

    /** @var int */
    protected $nextDate;

    /** @var int */
    protected $paymentCardId;

    /** @var int */
    protected $shipId;

    /** @var string */
    protected $shipData;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\SubscriptionAttribute[] */
    protected $attributes = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Subscription
     */
    public function __construct(BaseClient $client = null, Subscription $subscription = null)
    {
        parent::__construct($client);
        $this->attributes = new \MerchantAPI\Collection();

        if ($subscription) {
            if ($subscription->getId()) {
                $this->setSubscriptionId($subscription->getId());
            }

            $this->setSubscriptionId($subscription->getId());
        }
    }

    /**
     * Get Subscription_ID.
     *
     * @return int
     */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
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
     * Get Edit_Customer.
     *
     * @return string
     */
    public function getEditCustomer()
    {
        return $this->editCustomer;
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
     * Get Product_ID.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct()
    {
        return $this->editProduct;
    }

    /**
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Get ProductSubscriptionTerm_ID.
     *
     * @return int
     */
    public function getProductSubscriptionTermId()
    {
        return $this->productSubscriptionTermId;
    }

    /**
     * Get ProductSubscriptionTerm_Description.
     *
     * @return string
     */
    public function getProductSubscriptionTermDescription()
    {
        return $this->productSubscriptionTermDescription;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get NextDate.
     *
     * @return int
     */
    public function getNextDate()
    {
        return $this->nextDate;
    }

    /**
     * Get PaymentCard_ID.
     *
     * @return int
     */
    public function getPaymentCardId()
    {
        return $this->paymentCardId;
    }

    /**
     * Get Ship_ID.
     *
     * @return int
     */
    public function getShipId()
    {
        return $this->shipId;
    }

    /**
     * Get Ship_Data.
     *
     * @return string
     */
    public function getShipData()
    {
        return $this->shipData;
    }

    /**
     * Get Attributes.
     *
     * @return \MerchantAPI\Model\SubscriptionAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set Subscription_ID.
     *
     * @param int
     * @return $this
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->subscriptionId = $subscriptionId;

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
     * Set Edit_Customer.
     *
     * @param string
     * @return $this
     */
    public function setEditCustomer($editCustomer)
    {
        $this->editCustomer = $editCustomer;

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
     * Set Product_ID.
     *
     * @param int
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Set Edit_Product.
     *
     * @param string
     * @return $this
     */
    public function setEditProduct($editProduct)
    {
        $this->editProduct = $editProduct;

        return $this;
    }

    /**
     * Set Product_Code.
     *
     * @param string
     * @return $this
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * Set ProductSubscriptionTerm_ID.
     *
     * @param int
     * @return $this
     */
    public function setProductSubscriptionTermId($productSubscriptionTermId)
    {
        $this->productSubscriptionTermId = $productSubscriptionTermId;

        return $this;
    }

    /**
     * Set ProductSubscriptionTerm_Description.
     *
     * @param string
     * @return $this
     */
    public function setProductSubscriptionTermDescription($productSubscriptionTermDescription)
    {
        $this->productSubscriptionTermDescription = $productSubscriptionTermDescription;

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param int
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set NextDate.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setNextDate($nextDate)
    {
        if ($nextDate instanceof \DateTime) {
            $this->nextDate = $nextDate->getTimestamp();
        } else {
            $this->nextDate = $nextDate;
        }

        return $this;
    }

    /**
     * Set PaymentCard_ID.
     *
     * @param int
     * @return $this
     */
    public function setPaymentCardId($paymentCardId)
    {
        $this->paymentCardId = $paymentCardId;

        return $this;
    }

    /**
     * Set Ship_ID.
     *
     * @param int
     * @return $this
     */
    public function setShipId($shipId)
    {
        $this->shipId = $shipId;

        return $this;
    }

    /**
     * Set Ship_Data.
     *
     * @param string
     * @return $this
     */
    public function setShipData($shipData)
    {
        $this->shipData = $shipData;

        return $this;
    }

    /**
     * Set Attributes.
     *
     * @param (\MerchantAPI\Model\SubscriptionAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new SubscriptionAttribute($model);
            } else if (!$model instanceof SubscriptionAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of SubscriptionAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->attributes = new \MerchantAPI\Collection($attributes);

        return $this;
    }

    /**
     * Add Attributes.
     *
     * @param \MerchantAPI\Model\SubscriptionAttribute
     *
     * @return $this
     */
    public function addAttribute(SubscriptionAttribute $model)
    {
        $this->attributes[] = $model;
        return $this;
    }

    /**
     * Add many SubscriptionAttribute.
     *
     * @param (\MerchantAPI\Model\SubscriptionAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addAttributes(array $attributes)
    {
        foreach ($attributes as $e) {
            if (is_array($e)) {
                $this->attributes[] = new SubscriptionAttribute($e);
            } else if ($e instanceof SubscriptionAttribute) {
                $this->attributes[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of SubscriptionAttribute or an array of arrays but got %s',
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
        $data = parent::toArray();

        if ($this->getSubscriptionId()) {
            $data['Subscription_ID'] = $this->getSubscriptionId();
        }

        if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        }

        if ($this->getProductSubscriptionTermId()) {
            $data['ProductSubscriptionTerm_ID'] = $this->getProductSubscriptionTermId();
        } else if ($this->getProductSubscriptionTermDescription()) {
            $data['ProductSubscriptionTerm_Description'] = $this->getProductSubscriptionTermDescription();
        }

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        if ($this->getAddressId()) {
            $data['Address_ID'] = $this->getAddressId();
        } else if ($this->getCustomerAddressId()) {
            $data['CustomerAddress_ID'] = $this->getCustomerAddressId();
        }

        if (!is_null($this->getSubscriptionId())) {
            $data['Subscription_ID'] = $this->getSubscriptionId();
        }

        $data['Quantity'] = $this->getQuantity();

        $data['NextDate'] = $this->getNextDate();

        if (!is_null($this->getPaymentCardId())) {
            $data['PaymentCard_ID'] = $this->getPaymentCardId();
        }

        if (!is_null($this->getShipId())) {
            $data['Ship_ID'] = $this->getShipId();
        }

        if (!is_null($this->getShipData())) {
            $data['Ship_Data'] = $this->getShipData();
        }

        if (count($this->getAttributes())) {
            $data['Attributes'] = [];

            foreach ($this->getAttributes() as $i => $attribute) {
                if ($attribute->hasData()) {
                    $data['Attributes'][] = $attribute->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\SubscriptionUpdate($this, $httpResponse, $data);
    }
}
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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\SubscriptionAttribute;
use MerchantAPI\Model\Product;
use MerchantAPI\Model\SubscriptionShippingMethod;
use MerchantAPI\BaseClient;

/**
 * Handles API Request SubscriptionShippingMethodList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/subscriptionshippingmethodlist_load_query
 */
class SubscriptionShippingMethodListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'SubscriptionShippingMethodList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'method',
        'price',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'method',
        'price',
    ];

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
    protected $customerAddressId;

    /** @var int */
    protected $addressId;

    /** @var int */
    protected $paymentCardId;

    /** @var int */
    protected $customerPaymentCardId;

    /** @var int */
    protected $customerId;

    /** @var string */
    protected $editCustomer;

    /** @var string */
    protected $customerLogin;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\SubscriptionAttribute[] */
    protected $attributes = [];

    /** @var int */
    protected $quantity;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client);
        $this->attributes = new \MerchantAPI\Collection();

        if ($product) {
            if ($product->getId()) {
                $this->setProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setEditProduct($product->getCode());
            }
        }
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
     * Get CustomerAddress_ID.
     *
     * @return int
     */
    public function getCustomerAddressId()
    {
        return $this->customerAddressId;
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
     * Get PaymentCard_ID.
     *
     * @return int
     */
    public function getPaymentCardId()
    {
        return $this->paymentCardId;
    }

    /**
     * Get CustomerPaymentCard_ID.
     *
     * @return int
     */
    public function getCustomerPaymentCardId()
    {
        return $this->customerPaymentCardId;
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
     * Get Attributes.
     *
     * @return \MerchantAPI\Model\SubscriptionAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
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
     * Set CustomerPaymentCard_ID.
     *
     * @param int
     * @return $this
     */
    public function setCustomerPaymentCardId($customerPaymentCardId)
    {
        $this->customerPaymentCardId = $customerPaymentCardId;

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
     * Add Attributes.
     *
     * @param \MerchantAPI\Model\SubscriptionAttribute
     *
     * @return $this
     */
    public function addSubscriptionAttribute(SubscriptionAttribute $model)
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

        if ($this->getCustomerAddressId()) {
            $data['CustomerAddress_ID'] = $this->getCustomerAddressId();
        } else if ($this->getAddressId()) {
            $data['Address_ID'] = $this->getAddressId();
        }

        if ($this->getPaymentCardId()) {
            $data['PaymentCard_ID'] = $this->getPaymentCardId();
        } else if ($this->getCustomerPaymentCardId()) {
            $data['CustomerPaymentCard_ID'] = $this->getCustomerPaymentCardId();
        }

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        if (count($this->getAttributes())) {
            $data['Attributes'] = [];

            foreach ($this->getAttributes() as $i => $subscriptionAttribute) {
                if ($subscriptionAttribute->hasData()) {
                    $data['Attributes'][] = $subscriptionAttribute->getData();
                }
            }
        }

        $data['Quantity'] = $this->getQuantity();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\SubscriptionShippingMethodListLoadQuery($this, $httpResponse, $data);
    }
}
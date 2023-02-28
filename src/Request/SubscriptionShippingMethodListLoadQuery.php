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
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'SubscriptionShippingMethodList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'method',
        'price',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'method',
        'price',
    ];

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?int */
    protected ?int $productSubscriptionTermId = null;

    /** @var ?string */
    protected ?string $productSubscriptionTermDescription = null;

    /** @var ?int */
    protected ?int $customerAddressId = null;

    /** @var ?int */
    protected ?int $addressId = null;

    /** @var ?int */
    protected ?int $paymentCardId = null;

    /** @var ?int */
    protected ?int $customerPaymentCardId = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $attributes;

    /** @var ?int */
    protected ?int $quantity = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
    {
        parent::__construct($client);
        $this->attributes = new Collection();

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
    public function getProductId() : ?int
    {
        return $this->productId;
    }

    /**
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct() : ?string
    {
        return $this->editProduct;
    }

    /**
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode() : ?string
    {
        return $this->productCode;
    }

    /**
     * Get ProductSubscriptionTerm_ID.
     *
     * @return int
     */
    public function getProductSubscriptionTermId() : ?int
    {
        return $this->productSubscriptionTermId;
    }

    /**
     * Get ProductSubscriptionTerm_Description.
     *
     * @return string
     */
    public function getProductSubscriptionTermDescription() : ?string
    {
        return $this->productSubscriptionTermDescription;
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
     * Get Address_ID.
     *
     * @return int
     */
    public function getAddressId() : ?int
    {
        return $this->addressId;
    }

    /**
     * Get PaymentCard_ID.
     *
     * @return int
     */
    public function getPaymentCardId() : ?int
    {
        return $this->paymentCardId;
    }

    /**
     * Get CustomerPaymentCard_ID.
     *
     * @return int
     */
    public function getCustomerPaymentCardId() : ?int
    {
        return $this->customerPaymentCardId;
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
     * Get Attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAttributes() : ?Collection
    {
        return $this->attributes;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity() : ?int
    {
        return $this->quantity;
    }

    /**
     * Set Product_ID.
     *
     * @param ?int $productId
     * @return $this
     */
    public function setProductId(?int $productId) : self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Set Edit_Product.
     *
     * @param ?string $editProduct
     * @return $this
     */
    public function setEditProduct(?string $editProduct) : self
    {
        $this->editProduct = $editProduct;

        return $this;
    }

    /**
     * Set Product_Code.
     *
     * @param ?string $productCode
     * @return $this
     */
    public function setProductCode(?string $productCode) : self
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * Set ProductSubscriptionTerm_ID.
     *
     * @param ?int $productSubscriptionTermId
     * @return $this
     */
    public function setProductSubscriptionTermId(?int $productSubscriptionTermId) : self
    {
        $this->productSubscriptionTermId = $productSubscriptionTermId;

        return $this;
    }

    /**
     * Set ProductSubscriptionTerm_Description.
     *
     * @param ?string $productSubscriptionTermDescription
     * @return $this
     */
    public function setProductSubscriptionTermDescription(?string $productSubscriptionTermDescription) : self
    {
        $this->productSubscriptionTermDescription = $productSubscriptionTermDescription;

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
     * Set PaymentCard_ID.
     *
     * @param ?int $paymentCardId
     * @return $this
     */
    public function setPaymentCardId(?int $paymentCardId) : self
    {
        $this->paymentCardId = $paymentCardId;

        return $this;
    }

    /**
     * Set CustomerPaymentCard_ID.
     *
     * @param ?int $customerPaymentCardId
     * @return $this
     */
    public function setCustomerPaymentCardId(?int $customerPaymentCardId) : self
    {
        $this->customerPaymentCardId = $customerPaymentCardId;

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
     * Set Attributes.
     *
     * @param \MerchantAPI\Collection|array $attributes
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes($attributes) : self
    {
        if (!is_array($attributes) && !$attributes instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($attributes) ? get_class($attributes) : gettype($attributes)));
        }

        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new SubscriptionAttribute($model);
            } else if (!$model instanceof SubscriptionAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of SubscriptionAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->attributes = new Collection($attributes);

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param ?int $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity) : self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Add Attributes.
     *
     * @param \MerchantAPI\Model\SubscriptionAttribute
     * @return $this
     */
    public function addSubscriptionAttribute(SubscriptionAttribute $model) : self
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
    public function addAttributes(array $attributes) : self
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
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\SubscriptionShippingMethodListLoadQuery($this, $httpResponse, $data);
    }
}
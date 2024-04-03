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
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ProductVariantPricing_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariantpricing_update
 */
class ProductVariantPricingUpdate extends Request
{
    /** @var string VARIANT_PRICING_METHOD_MASTER */
    const VARIANT_PRICING_METHOD_MASTER = 'master';

    /** @var string VARIANT_PRICING_METHOD_SPECIFIC */
    const VARIANT_PRICING_METHOD_SPECIFIC = 'specific';

    /** @var string VARIANT_PRICING_METHOD_SUM */
    const VARIANT_PRICING_METHOD_SUM = 'sum';

    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductVariantPricing_Update';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $productSku = null;

    /** @var ?int */
    protected ?int $variantId = null;

    /** @var ?string */
    protected ?string $method = null;

    /** @var ?float */
    protected ?float $price = null;

    /** @var ?float */
    protected ?float $cost = null;

    /** @var ?float */
    protected ?float $weight = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
    {
        parent::__construct($client);
        if ($product) {
            if ($product->getId()) {
                $this->setProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setEditProduct($product->getCode());
            } else if ($product->getSku()) {
                $this->setProductSku($product->getSku());
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSku() : ?string
    {
        return $this->productSku;
    }

    /**
     * Get Variant_ID.
     *
     * @return int
     */
    public function getVariantId() : ?int
    {
        return $this->variantId;
    }

    /**
     * Get Method.
     *
     * @return string
     */
    public function getMethod() : ?string
    {
        return $this->method;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice() : ?float
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float
     */
    public function getCost() : ?float
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight() : ?float
    {
        return $this->weight;
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
     * Set Product_SKU.
     *
     * @param ?string $productSku
     * @return $this
     */
    public function setProductSku(?string $productSku) : self
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Set Variant_ID.
     *
     * @param ?int $variantId
     * @return $this
     */
    public function setVariantId(?int $variantId) : self
    {
        $this->variantId = $variantId;

        return $this;
    }

    /**
     * Set Method.
     *
     * @param ?string $method
     * @return $this
     */
    public function setMethod(?string $method) : self
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param ?float $cost
     * @return $this
     */
    public function setCost(?float $cost) : self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        $this->weight = $weight;

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
        } else if ($this->getProductSku()) {
            $data['Product_SKU'] = $this->getProductSku();
        }

        $data['Variant_ID'] = $this->getVariantId();

        $data['Method'] = $this->getMethod();

        if (!is_null($this->getPrice())) {
            $data['Price'] = $this->getPrice();
        }

        if (!is_null($this->getCost())) {
            $data['Cost'] = $this->getCost();
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = $this->getWeight();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductVariantPricingUpdate($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\ProductVariantLimit;
use MerchantAPI\Model\ProductVariantExclusion;
use MerchantAPI\Model\Product;
use MerchantAPI\Model\ProductVariant;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request ProductVariantList_Load_Product.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariantlist_load_product
 */
class ProductVariantListLoadProduct extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductVariantList_Load_Product';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $productSku = null;

    /** @var ?bool */
    protected ?bool $includeDefaultVariant = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $limits;

    /** @var \MerchantAPI\Collection */
    protected Collection $exclusions;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
    {
        parent::__construct($client);
        $this->limits = new Collection();
        $this->exclusions = new Collection();

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
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode() : ?string
    {
        return $this->productCode;
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSku() : ?string
    {
        return $this->productSku;
    }

    /**
     * Get Include_Default_Variant.
     *
     * @return bool
     */
    public function getIncludeDefaultVariant() : ?bool
    {
        return $this->includeDefaultVariant;
    }

    /**
     * Get Limits.
     *
     * @return \MerchantAPI\Collection
     */
    public function getLimits() : ?Collection
    {
        return $this->limits;
    }

    /**
     * Get Exclusions.
     *
     * @return \MerchantAPI\Collection
     */
    public function getExclusions() : ?Collection
    {
        return $this->exclusions;
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
     * Set Include_Default_Variant.
     *
     * @param ?bool $includeDefaultVariant
     * @return $this
     */
    public function setIncludeDefaultVariant(?bool $includeDefaultVariant) : self
    {
        $this->includeDefaultVariant = $includeDefaultVariant;

        return $this;
    }

    /**
     * Set Limits.
     *
     * @param \MerchantAPI\Collection|array $limits
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setLimits($limits) : self
    {
        if (!is_array($limits) && !$limits instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($limits) ? get_class($limits) : gettype($limits)));
        }

        foreach ($limits as &$model) {
            if (is_array($model)) {
                $model = new ProductVariantLimit($model);
            } else if (!$model instanceof ProductVariantLimit) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantLimit or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->limits = new Collection($limits);

        return $this;
    }

    /**
     * Set Exclusions.
     *
     * @param \MerchantAPI\Collection|array $exclusions
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setExclusions($exclusions) : self
    {
        if (!is_array($exclusions) && !$exclusions instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($exclusions) ? get_class($exclusions) : gettype($exclusions)));
        }

        foreach ($exclusions as &$model) {
            if (is_array($model)) {
                $model = new ProductVariantExclusion($model);
            } else if (!$model instanceof ProductVariantExclusion) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantExclusion or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->exclusions = new Collection($exclusions);

        return $this;
    }

    /**
     * Add Limits.
     *
     * @param \MerchantAPI\Model\ProductVariantLimit
     * @return $this
     */
    public function addLimit(ProductVariantLimit $model) : self
    {
        $this->limits[] = $model;
        return $this;
    }

    /**
     * Add many ProductVariantLimit.
     *
     * @param (\MerchantAPI\Model\ProductVariantLimit|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addLimits(array $limits) : self
    {
        foreach ($limits as $e) {
            if (is_array($e)) {
                $this->limits[] = new ProductVariantLimit($e);
            } else if ($e instanceof ProductVariantLimit) {
                $this->limits[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantLimit or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Exclusions.
     *
     * @param \MerchantAPI\Model\ProductVariantExclusion
     * @return $this
     */
    public function addExclusion(ProductVariantExclusion $model) : self
    {
        $this->exclusions[] = $model;
        return $this;
    }

    /**
     * Add many ProductVariantExclusion.
     *
     * @param (\MerchantAPI\Model\ProductVariantExclusion|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addExclusions(array $exclusions) : self
    {
        foreach ($exclusions as $e) {
            if (is_array($e)) {
                $this->exclusions[] = new ProductVariantExclusion($e);
            } else if ($e instanceof ProductVariantExclusion) {
                $this->exclusions[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantExclusion or an array of arrays but got %s',
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
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductSku()) {
            $data['Product_SKU'] = $this->getProductSku();
        }

        if (!is_null($this->getIncludeDefaultVariant())) {
            $data['Include_Default_Variant'] = $this->getIncludeDefaultVariant();
        }

        if (count($this->getLimits())) {
            $data['Limits'] = [];

            foreach ($this->getLimits() as $i => $limit) {
                if ($limit->hasData()) {
                    $data['Limits'][] = $limit->getData();
                }
            }
        }

        if (count($this->getExclusions())) {
            $data['Exclusions'] = [];

            foreach ($this->getExclusions() as $i => $exclusion) {
                if ($exclusion->hasData()) {
                    $data['Exclusions'][] = $exclusion->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductVariantListLoadProduct($this, $httpResponse, $data);
    }
}
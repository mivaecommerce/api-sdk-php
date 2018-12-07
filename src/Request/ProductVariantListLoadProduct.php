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
use MerchantAPI\Model\ProductVariantLimit;
use MerchantAPI\Model\ProductVariantExclusion;
use MerchantAPI\Model\Product;
use MerchantAPI\Model\ProductVariant;

/**
 * Handles API Request ProductVariantList_Load_Product.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariantlist_load_product
 */
class ProductVariantListLoadProduct extends Request
{
    /** @var string The API function name */
    protected $function = 'ProductVariantList_Load_Product';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var string */
    protected $productSKU;

    /** @var bool */
    protected $includeDefaultVariant;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariantLimit[] */
    protected $limits = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariantExclusion[] */
    protected $exclusions = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(Product $product = null)
    {
        $this->limits = new \MerchantAPI\Collection();
        $this->exclusions = new \MerchantAPI\Collection();

        if ($product) {
            if ($product->getId()) {
                $this->setProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setEditProduct($product->getCode());
            } else if ($product->getSku()) {
                $this->setProductSKU($product->getSku());
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
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSKU()
    {
        return $this->productSKU;
    }

    /**
     * Get Include_Default_Variant.
     *
     * @return bool
     */
    public function getIncludeDefaultVariant()
    {
        return $this->includeDefaultVariant;
    }

    /**
     * Get Limits.
     *
     * @return \MerchantAPI\Model\ProductVariantLimit[]
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * Get Exclusions.
     *
     * @return \MerchantAPI\Model\ProductVariantExclusion[]
     */
    public function getExclusions()
    {
        return $this->exclusions;
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
     * Set Product_SKU.
     *
     * @param string
     * @return $this
     */
    public function setProductSKU($productSKU)
    {
        $this->productSKU = $productSKU;

        return $this;
    }

    /**
     * Set Include_Default_Variant.
     *
     * @param bool
     * @return $this
     */
    public function setIncludeDefaultVariant($includeDefaultVariant)
    {
        $this->includeDefaultVariant = $includeDefaultVariant;

        return $this;
    }

    /**
     * Set Limits.
     *
     * @param (\MerchantAPI\Model\ProductVariantLimit|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setLimits(array $limits)
    {
        foreach ($limits as &$model) {
            if (is_array($model)) {
                $model = new ProductVariantLimit($model);
            } else if (!$model instanceof ProductVariantLimit) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantLimit or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->limits = $limits;

        return $this;
    }

    /**
     * Set Exclusions.
     *
     * @param (\MerchantAPI\Model\ProductVariantExclusion|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setExclusions(array $exclusions)
    {
        foreach ($exclusions as &$model) {
            if (is_array($model)) {
                $model = new ProductVariantExclusion($model);
            } else if (!$model instanceof ProductVariantExclusion) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantExclusion or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->exclusions = $exclusions;

        return $this;
    }

    /**
     * Add Limits.
     *
     * @param \MerchantAPI\Model\ProductVariantLimit
     *
     * @return $this
     */
    public function addLimit(ProductVariantLimit $model)
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
    public function addLimits(array $limits)
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
     *
     * @return $this
     */
    public function addExclusion(ProductVariantExclusion $model)
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
    public function addExclusions(array $exclusions)
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
    public function toArray()
    {
        $data = [];

        if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductSKU()) {
            $data['Product_SKU'] = $this->getProductSKU();
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
        return new \MerchantAPI\Response\ProductVariantListLoadProduct($this, $httpResponse, $data);
    }
}
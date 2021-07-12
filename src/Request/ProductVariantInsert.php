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
use MerchantAPI\Model\VariantAttribute;
use MerchantAPI\Model\VariantPart;
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ProductVariant_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariant_insert
 */
class ProductVariantInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ProductVariant_Insert';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\VariantAttribute[] */
    protected $attributes = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\VariantPart[] */
    protected $parts = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client);
        $this->attributes = new \MerchantAPI\Collection();
        $this->parts = new \MerchantAPI\Collection();

        if ($product) {
            if ($product->getId()) {
                $this->setProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setProductCode($product->getCode());
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
     * Get Attributes.
     *
     * @return \MerchantAPI\Model\VariantAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get Parts.
     *
     * @return \MerchantAPI\Model\VariantPart[]
     */
    public function getParts()
    {
        return $this->parts;
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
     * Set Attributes.
     *
     * @param (\MerchantAPI\Model\VariantAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new VariantAttribute($model);
            } else if (!$model instanceof VariantAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->attributes = new \MerchantAPI\Collection($attributes);

        return $this;
    }

    /**
     * Set Parts.
     *
     * @param (\MerchantAPI\Model\VariantPart|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setParts(array $parts)
    {
        foreach ($parts as &$model) {
            if (is_array($model)) {
                $model = new VariantPart($model);
            } else if (!$model instanceof VariantPart) {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantPart or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->parts = new \MerchantAPI\Collection($parts);

        return $this;
    }

    /**
     * Add Attributes.
     *
     * @param \MerchantAPI\Model\VariantAttribute
     *
     * @return $this
     */
    public function addVariantAttribute(VariantAttribute $model)
    {
        $this->attributes[] = $model;
        return $this;
    }

    /**
     * Add many VariantAttribute.
     *
     * @param (\MerchantAPI\Model\VariantAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addAttributes(array $attributes)
    {
        foreach ($attributes as $e) {
            if (is_array($e)) {
                $this->attributes[] = new VariantAttribute($e);
            } else if ($e instanceof VariantAttribute) {
                $this->attributes[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantAttribute or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Parts.
     *
     * @param \MerchantAPI\Model\VariantPart
     *
     * @return $this
     */
    public function addVariantPart(VariantPart $model)
    {
        $this->parts[] = $model;
        return $this;
    }

    /**
     * Add many VariantPart.
     *
     * @param (\MerchantAPI\Model\VariantPart|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addParts(array $parts)
    {
        foreach ($parts as $e) {
            if (is_array($e)) {
                $this->parts[] = new VariantPart($e);
            } else if ($e instanceof VariantPart) {
                $this->parts[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantPart or an array of arrays but got %s',
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
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        }

        if (count($this->getAttributes())) {
            $data['Attributes'] = [];

            foreach ($this->getAttributes() as $i => $variantAttribute) {
                $data['Attributes'][] = $variantAttribute->getData();
            }
        }

        if (count($this->getParts())) {
            $data['Parts'] = [];

            foreach ($this->getParts() as $i => $variantPart) {
                $data['Parts'][] = $variantPart->getData();
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductVariantInsert($this, $httpResponse, $data);
    }
}
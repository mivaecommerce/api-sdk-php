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
use MerchantAPI\Model\KitPart;
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ProductKit_Update_Parts.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productkit_update_parts
 */
class ProductKitUpdateParts extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ProductKit_Update_Parts';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var int */
    protected $attributeId;

    /** @var int */
    protected $attributeTemplateAttributeId;

    /** @var int */
    protected $optionId;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\KitPart[] */
    protected $parts = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client);
        $this->parts = new \MerchantAPI\Collection();

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
     * Get Attribute_ID.
     *
     * @return int
     */
    public function getAttributeId()
    {
        return $this->attributeId;
    }

    /**
     * Get AttributeTemplateAttribute_ID.
     *
     * @return int
     */
    public function getAttributeTemplateAttributeId()
    {
        return $this->attributeTemplateAttributeId;
    }

    /**
     * Get Option_ID.
     *
     * @return int
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Get Parts.
     *
     * @return \MerchantAPI\Model\KitPart[]
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
     * Set Attribute_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateAttributeId($attributeTemplateAttributeId)
    {
        $this->attributeTemplateAttributeId = $attributeTemplateAttributeId;

        return $this;
    }

    /**
     * Set Option_ID.
     *
     * @param int
     * @return $this
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Set Parts.
     *
     * @param (\MerchantAPI\Model\KitPart|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setParts(array $parts)
    {
        foreach ($parts as &$model) {
            if (is_array($model)) {
                $model = new KitPart($model);
            } else if (!$model instanceof KitPart) {
                throw new \InvalidArgumentException(sprintf('Expected array of KitPart or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->parts = new \MerchantAPI\Collection($parts);

        return $this;
    }

    /**
     * Add Parts.
     *
     * @param \MerchantAPI\Model\KitPart
     *
     * @return $this
     */
    public function addKitPart(KitPart $model)
    {
        $this->parts[] = $model;
        return $this;
    }

    /**
     * Add many KitPart.
     *
     * @param (\MerchantAPI\Model\KitPart|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addParts(array $parts)
    {
        foreach ($parts as $e) {
            if (is_array($e)) {
                $this->parts[] = new KitPart($e);
            } else if ($e instanceof KitPart) {
                $this->parts[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of KitPart or an array of arrays but got %s',
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

        if ($this->getAttributeId()) {
            $data['Attribute_ID'] = $this->getAttributeId();
        }

        if ($this->getAttributeTemplateAttributeId()) {
            $data['AttributeTemplateAttribute_ID'] = $this->getAttributeTemplateAttributeId();
        }

        if ($this->getOptionId()) {
            $data['Option_ID'] = $this->getOptionId();
        }

        if (count($this->getParts())) {
            $data['Parts'] = [];

            foreach ($this->getParts() as $i => $kitPart) {
                $data['Parts'][] = $kitPart->getData();
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductKitUpdateParts($this, $httpResponse, $data);
    }
}
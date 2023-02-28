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
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductKit_Update_Parts';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $attributeId = null;

    /** @var ?int */
    protected ?int $attributeTemplateAttributeId = null;

    /** @var ?int */
    protected ?int $optionId = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $parts;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
    {
        parent::__construct($client);
        $this->parts = new Collection();

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
     * Get Attribute_ID.
     *
     * @return int
     */
    public function getAttributeId() : ?int
    {
        return $this->attributeId;
    }

    /**
     * Get AttributeTemplateAttribute_ID.
     *
     * @return int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->attributeTemplateAttributeId;
    }

    /**
     * Get Option_ID.
     *
     * @return int
     */
    public function getOptionId() : ?int
    {
        return $this->optionId;
    }

    /**
     * Get Parts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getParts() : ?Collection
    {
        return $this->parts;
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
     * Set Attribute_ID.
     *
     * @param ?int $attributeId
     * @return $this
     */
    public function setAttributeId(?int $attributeId) : self
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_ID.
     *
     * @param ?int $attributeTemplateAttributeId
     * @return $this
     */
    public function setAttributeTemplateAttributeId(?int $attributeTemplateAttributeId) : self
    {
        $this->attributeTemplateAttributeId = $attributeTemplateAttributeId;

        return $this;
    }

    /**
     * Set Option_ID.
     *
     * @param ?int $optionId
     * @return $this
     */
    public function setOptionId(?int $optionId) : self
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Set Parts.
     *
     * @param \MerchantAPI\Collection|array $parts
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setParts($parts) : self
    {
        if (!is_array($parts) && !$parts instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($parts) ? get_class($parts) : gettype($parts)));
        }

        foreach ($parts as &$model) {
            if (is_array($model)) {
                $model = new KitPart($model);
            } else if (!$model instanceof KitPart) {
                throw new \InvalidArgumentException(sprintf('Expected array of KitPart or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->parts = new Collection($parts);

        return $this;
    }

    /**
     * Add Parts.
     *
     * @param \MerchantAPI\Model\KitPart
     * @return $this
     */
    public function addKitPart(KitPart $model) : self
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
    public function addParts(array $parts) : self
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
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductKitUpdateParts($this, $httpResponse, $data);
    }
}
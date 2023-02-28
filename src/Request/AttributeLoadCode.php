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
use MerchantAPI\Model\ProductAttribute;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Attribute_Load_Code.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attribute_load_code
 */
class AttributeLoadCode extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Attribute_Load_Code';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $attributeCode = null;

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
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId() : ?int
    {
        return $this->customerId;
    }

    /**
     * Get Attribute_Code.
     *
     * @return string
     */
    public function getAttributeCode() : ?string
    {
        return $this->attributeCode;
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
     * Set Attribute_Code.
     *
     * @param ?string $attributeCode
     * @return $this
     */
    public function setAttributeCode(?string $attributeCode) : self
    {
        $this->attributeCode = $attributeCode;

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

        if (!is_null($this->getCustomerId())) {
            $data['Customer_ID'] = $this->getCustomerId();
        }

        $data['Attribute_Code'] = $this->getAttributeCode();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeLoadCode($this, $httpResponse, $data);
    }
}
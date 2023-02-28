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
use MerchantAPI\Model\ProductOption;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Option_Load_Code.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/option_load_code
 */
class OptionLoadCode extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Option_Load_Code';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $attributeId = null;

    /** @var ?string */
    protected ?string $attributeCode = null;

    /** @var ?string */
    protected ?string $editAttribute = null;

    /** @var ?string */
    protected ?string $optionCode = null;

    /** @var ?int */
    protected ?int $customerId = null;

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
     * Get Attribute_Code.
     *
     * @return string
     */
    public function getAttributeCode() : ?string
    {
        return $this->attributeCode;
    }

    /**
     * Get Edit_Attribute.
     *
     * @return string
     */
    public function getEditAttribute() : ?string
    {
        return $this->editAttribute;
    }

    /**
     * Get Option_Code.
     *
     * @return string
     */
    public function getOptionCode() : ?string
    {
        return $this->optionCode;
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
     * Set Edit_Attribute.
     *
     * @param ?string $editAttribute
     * @return $this
     */
    public function setEditAttribute(?string $editAttribute) : self
    {
        $this->editAttribute = $editAttribute;

        return $this;
    }

    /**
     * Set Option_Code.
     *
     * @param ?string $optionCode
     * @return $this
     */
    public function setOptionCode(?string $optionCode) : self
    {
        $this->optionCode = $optionCode;

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
        } else if ($this->getAttributeCode()) {
            $data['Attribute_Code'] = $this->getAttributeCode();
        } else if ($this->getEditAttribute()) {
            $data['Edit_Attribute'] = $this->getEditAttribute();
        }

        if ($this->getOptionCode()) {
            $data['Option_Code'] = $this->getOptionCode();
        }

        if (!is_null($this->getCustomerId())) {
            $data['Customer_ID'] = $this->getCustomerId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OptionLoadCode($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\ProductAttribute;
use MerchantAPI\Model\ProductOption;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OptionList_Load_Attribute.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/optionlist_load_attribute
 */
class OptionListLoadAttribute extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OptionList_Load_Attribute';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var int */
    protected $attributeId;

    /** @var string */
    protected $editAttribute;

    /** @var string */
    protected $attributeCode;

    /** @var int */
    protected $customerId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\ProductAttribute
     */
    public function __construct(BaseClient $client = null, ProductAttribute $productAttribute = null)
    {
        parent::__construct($client);
        if ($productAttribute) {
            if ($productAttribute->getProductId()) {
                $this->setProductId($productAttribute->getProductId());
            }

            if ($productAttribute->getId()) {
                $this->setAttributeId($productAttribute->getId());
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
     * Get Edit_Attribute.
     *
     * @return string
     */
    public function getEditAttribute()
    {
        return $this->editAttribute;
    }

    /**
     * Get Attribute_Code.
     *
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->attributeCode;
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
     * Set Edit_Attribute.
     *
     * @param string
     * @return $this
     */
    public function setEditAttribute($editAttribute)
    {
        $this->editAttribute = $editAttribute;

        return $this;
    }

    /**
     * Set Attribute_Code.
     *
     * @param string
     * @return $this
     */
    public function setAttributeCode($attributeCode)
    {
        $this->attributeCode = $attributeCode;

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

        if ($this->getAttributeId()) {
            $data['Attribute_ID'] = $this->getAttributeId();
        } else if ($this->getEditAttribute()) {
            $data['Edit_Attribute'] = $this->getEditAttribute();
        } else if ($this->getAttributeCode()) {
            $data['Attribute_Code'] = $this->getAttributeCode();
        }

        if (!is_null($this->getCustomerId())) {
            $data['Customer_ID'] = $this->getCustomerId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OptionListLoadAttribute($this, $httpResponse, $data);
    }
}
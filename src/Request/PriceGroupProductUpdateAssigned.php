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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;

/**
 * Handles API Request PriceGroupProduct_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupproduct_update_assigned
 */
class PriceGroupProductUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PriceGroupProduct_Update_Assigned';

    /** @var int */
    protected $priceGroupId;

    /** @var string */
    protected $priceGroupName;

    /** @var string */
    protected $editProduct;

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $productSku;

    /** @var bool */
    protected $assigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\PriceGroup
     */
    public function __construct(BaseClient $client = null, PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setPriceGroupId($priceGroup->getId());
            } else if ($priceGroup->getName()) {
                $this->setPriceGroupName($priceGroup->getName());
            }

            $this->setPriceGroupName($priceGroup->getName());
        }
    }

    /**
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId()
    {
        return $this->priceGroupId;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName()
    {
        return $this->priceGroupName;
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Set PriceGroup_ID.
     *
     * @param int
     * @return $this
     */
    public function setPriceGroupId($priceGroupId)
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param string
     * @return $this
     */
    public function setPriceGroupName($priceGroupName)
    {
        $this->priceGroupName = $priceGroupName;

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
     * Set Product_SKU.
     *
     * @param string
     * @return $this
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param bool
     * @return $this
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getProductSku()) {
            $data['Product_SKU'] = $this->getProductSku();
        }

        if (!is_null($this->getPriceGroupName())) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PriceGroupProductUpdateAssigned($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\RelatedProduct;
use MerchantAPI\BaseClient;

/**
 * Handles API Request RelatedProduct_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/relatedproduct_update_assigned
 */
class RelatedProductUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'RelatedProduct_Update_Assigned';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var int */
    protected $relatedProductId;

    /** @var string */
    protected $relatedProductCode;

    /** @var string */
    protected $editRelatedProduct;

    /** @var bool */
    protected $assigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client);
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
     * Get RelatedProduct_ID.
     *
     * @return int
     */
    public function getRelatedProductId()
    {
        return $this->relatedProductId;
    }

    /**
     * Get RelatedProduct_Code.
     *
     * @return string
     */
    public function getRelatedProductCode()
    {
        return $this->relatedProductCode;
    }

    /**
     * Get Edit_RelatedProduct.
     *
     * @return string
     */
    public function getEditRelatedProduct()
    {
        return $this->editRelatedProduct;
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
     * Set RelatedProduct_ID.
     *
     * @param int
     * @return $this
     */
    public function setRelatedProductId($relatedProductId)
    {
        $this->relatedProductId = $relatedProductId;

        return $this;
    }

    /**
     * Set RelatedProduct_Code.
     *
     * @param string
     * @return $this
     */
    public function setRelatedProductCode($relatedProductCode)
    {
        $this->relatedProductCode = $relatedProductCode;

        return $this;
    }

    /**
     * Set Edit_RelatedProduct.
     *
     * @param string
     * @return $this
     */
    public function setEditRelatedProduct($editRelatedProduct)
    {
        $this->editRelatedProduct = $editRelatedProduct;

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

        if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        }

        if ($this->getRelatedProductId()) {
            $data['RelatedProduct_ID'] = $this->getRelatedProductId();
        } else if ($this->getRelatedProductCode()) {
            $data['RelatedProduct_Code'] = $this->getRelatedProductCode();
        } else if ($this->getEditRelatedProduct()) {
            $data['Edit_RelatedProduct'] = $this->getEditRelatedProduct();
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
        return new \MerchantAPI\Response\RelatedProductUpdateAssigned($this, $httpResponse, $data);
    }
}
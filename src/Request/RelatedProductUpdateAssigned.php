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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'RelatedProduct_Update_Assigned';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $relatedProductId = null;

    /** @var ?string */
    protected ?string $relatedProductCode = null;

    /** @var ?string */
    protected ?string $editRelatedProduct = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

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
     * Get RelatedProduct_ID.
     *
     * @return int
     */
    public function getRelatedProductId() : ?int
    {
        return $this->relatedProductId;
    }

    /**
     * Get RelatedProduct_Code.
     *
     * @return string
     */
    public function getRelatedProductCode() : ?string
    {
        return $this->relatedProductCode;
    }

    /**
     * Get Edit_RelatedProduct.
     *
     * @return string
     */
    public function getEditRelatedProduct() : ?string
    {
        return $this->editRelatedProduct;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
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
     * Set RelatedProduct_ID.
     *
     * @param ?int $relatedProductId
     * @return $this
     */
    public function setRelatedProductId(?int $relatedProductId) : self
    {
        $this->relatedProductId = $relatedProductId;

        return $this;
    }

    /**
     * Set RelatedProduct_Code.
     *
     * @param ?string $relatedProductCode
     * @return $this
     */
    public function setRelatedProductCode(?string $relatedProductCode) : self
    {
        $this->relatedProductCode = $relatedProductCode;

        return $this;
    }

    /**
     * Set Edit_RelatedProduct.
     *
     * @param ?string $editRelatedProduct
     * @return $this
     */
    public function setEditRelatedProduct(?string $editRelatedProduct) : self
    {
        $this->editRelatedProduct = $editRelatedProduct;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param ?bool $assigned
     * @return $this
     */
    public function setAssigned(?bool $assigned) : self
    {
        $this->assigned = $assigned;

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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\RelatedProductUpdateAssigned($this, $httpResponse, $data);
    }
}
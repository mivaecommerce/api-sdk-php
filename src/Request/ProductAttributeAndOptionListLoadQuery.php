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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Product;
use MerchantAPI\Model\ProductAttributeListAttribute;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ProductAttributeAndOptionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productattributeandoptionlist_load_query
 */
class ProductAttributeAndOptionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ProductAttributeAndOptionList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'code',
        'prompt',
        'price',
        'cost',
        'weight',
        'image',
        'type',
        'template',
        'required',
        'inventory',
        'attr_code',
        'attr_prompt',
        'attr_price',
        'attr_cost',
        'attr_weight',
        'attr_image',
        'opt_code',
        'opt_prompt',
        'opt_price',
        'opt_cost',
        'opt_weight',
        'opt_image',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'code',
        'prompt',
        'price',
        'cost',
        'weight',
        'image',
        'type',
        'required',
        'inventory',
        'attr_code',
        'attr_prompt',
        'attr_price',
        'attr_cost',
        'attr_weight',
        'attr_image',
        'opt_code',
        'opt_prompt',
        'opt_price',
        'opt_cost',
        'opt_weight',
        'opt_image',
        'disporder',
    ];

    /** @var int */
    protected $productId;

    /** @var string */
    protected $editProduct;

    /** @var string */
    protected $productCode;

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
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct()
    {
        return $this->editProduct;
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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductAttributeAndOptionListLoadQuery($this, $httpResponse, $data);
    }
}
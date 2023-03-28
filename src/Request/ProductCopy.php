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
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Product_Copy.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/product_copy
 */
class ProductCopy extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Product_Copy';

    /** @var ?string */
    protected ?string $productCopySessionId = null;

    /** @var ?int */
    protected ?int $copyProductRulesId = null;

    /** @var ?string */
    protected ?string $copyProductRulesName = null;

    /** @var ?int */
    protected ?int $sourceProductId = null;

    /** @var ?string */
    protected ?string $sourceProductCode = null;

    /** @var ?string */
    protected ?string $destinationProductCode = null;

    /** @var ?string */
    protected ?string $destinationProductName = null;

    /** @var ?string */
    protected ?string $destinationProductSku = null;

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
                $this->setSourceProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setSourceProductCode($product->getCode());
            }
        }
    }

    /**
     * Get Product_Copy_Session_ID.
     *
     * @return string
     */
    public function getProductCopySessionId() : ?string
    {
        return $this->productCopySessionId;
    }

    /**
     * Get CopyProductRules_ID.
     *
     * @return int
     */
    public function getCopyProductRulesId() : ?int
    {
        return $this->copyProductRulesId;
    }

    /**
     * Get CopyProductRules_Name.
     *
     * @return string
     */
    public function getCopyProductRulesName() : ?string
    {
        return $this->copyProductRulesName;
    }

    /**
     * Get Source_Product_ID.
     *
     * @return int
     */
    public function getSourceProductId() : ?int
    {
        return $this->sourceProductId;
    }

    /**
     * Get Source_Product_Code.
     *
     * @return string
     */
    public function getSourceProductCode() : ?string
    {
        return $this->sourceProductCode;
    }

    /**
     * Get destination_product_code.
     *
     * @return string
     */
    public function getDestinationProductCode() : ?string
    {
        return $this->destinationProductCode;
    }

    /**
     * Get destination_product_name.
     *
     * @return string
     */
    public function getDestinationProductName() : ?string
    {
        return $this->destinationProductName;
    }

    /**
     * Get destination_product_sku.
     *
     * @return string
     */
    public function getDestinationProductSku() : ?string
    {
        return $this->destinationProductSku;
    }

    /**
     * Set Product_Copy_Session_ID.
     *
     * @param ?string $productCopySessionId
     * @return $this
     */
    public function setProductCopySessionId(?string $productCopySessionId) : self
    {
        $this->productCopySessionId = $productCopySessionId;

        return $this;
    }

    /**
     * Set CopyProductRules_ID.
     *
     * @param ?int $copyProductRulesId
     * @return $this
     */
    public function setCopyProductRulesId(?int $copyProductRulesId) : self
    {
        $this->copyProductRulesId = $copyProductRulesId;

        return $this;
    }

    /**
     * Set CopyProductRules_Name.
     *
     * @param ?string $copyProductRulesName
     * @return $this
     */
    public function setCopyProductRulesName(?string $copyProductRulesName) : self
    {
        $this->copyProductRulesName = $copyProductRulesName;

        return $this;
    }

    /**
     * Set Source_Product_ID.
     *
     * @param ?int $sourceProductId
     * @return $this
     */
    public function setSourceProductId(?int $sourceProductId) : self
    {
        $this->sourceProductId = $sourceProductId;

        return $this;
    }

    /**
     * Set Source_Product_Code.
     *
     * @param ?string $sourceProductCode
     * @return $this
     */
    public function setSourceProductCode(?string $sourceProductCode) : self
    {
        $this->sourceProductCode = $sourceProductCode;

        return $this;
    }

    /**
     * Set destination_product_code.
     *
     * @param ?string $destinationProductCode
     * @return $this
     */
    public function setDestinationProductCode(?string $destinationProductCode) : self
    {
        $this->destinationProductCode = $destinationProductCode;

        return $this;
    }

    /**
     * Set destination_product_name.
     *
     * @param ?string $destinationProductName
     * @return $this
     */
    public function setDestinationProductName(?string $destinationProductName) : self
    {
        $this->destinationProductName = $destinationProductName;

        return $this;
    }

    /**
     * Set destination_product_sku.
     *
     * @param ?string $destinationProductSku
     * @return $this
     */
    public function setDestinationProductSku(?string $destinationProductSku) : self
    {
        $this->destinationProductSku = $destinationProductSku;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getSourceProductId()) {
            $data['Source_Product_ID'] = $this->getSourceProductId();
        } else if ($this->getSourceProductCode()) {
            $data['Source_Product_Code'] = $this->getSourceProductCode();
        }

        if ($this->getDestinationProductCode()) {
            $data['Dest_Product_Code'] = $this->getDestinationProductCode();
        }

        if ($this->getCopyProductRulesId()) {
            $data['CopyProductRules_ID'] = $this->getCopyProductRulesId();
        } else if ($this->getCopyProductRulesName()) {
            $data['CopyProductRules_Name'] = $this->getCopyProductRulesName();
        }

        $data['Product_Copy_Session_ID'] = $this->getProductCopySessionId();

        if (!is_null($this->getCopyProductRulesId())) {
            $data['CopyProductRules_ID'] = $this->getCopyProductRulesId();
        }

        if (!is_null($this->getCopyProductRulesName())) {
            $data['CopyProductRules_Name'] = $this->getCopyProductRulesName();
        }

        if (!is_null($this->getDestinationProductCode())) {
            $data['Dest_Product_Code'] = $this->getDestinationProductCode();
        }

        if (!is_null($this->getDestinationProductName())) {
            $data['Dest_Product_Name'] = $this->getDestinationProductName();
        }

        if (!is_null($this->getDestinationProductSku())) {
            $data['Dest_Product_SKU'] = $this->getDestinationProductSku();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductCopy($this, $httpResponse, $data);
    }
}
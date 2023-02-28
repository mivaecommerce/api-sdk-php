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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Option_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/option_insert
 */
class OptionInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Option_Insert';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $attributeId = null;

    /** @var ?string */
    protected ?string $editAttribute = null;

    /** @var ?string */
    protected ?string $attributeCode = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $prompt = null;

    /** @var ?string */
    protected ?string $image = null;

    /** @var ?float */
    protected ?float $price = null;

    /** @var ?float */
    protected ?float $cost = null;

    /** @var ?float */
    protected ?float $weight = null;

    /** @var ?bool */
    protected ?bool $default = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\ProductAttribute $productAttribute
     */
    public function __construct(?BaseClient $client = null, ?ProductAttribute $productAttribute = null)
    {
        parent::__construct($client);
        if ($productAttribute) {
            if ($productAttribute->getProductId()) {
                $this->setProductId($productAttribute->getProductId());
            }

            if ($productAttribute->getId()) {
                $this->setAttributeId($productAttribute->getId());
            } else if ($productAttribute->getCode()) {
                $this->setEditAttribute($productAttribute->getCode());
            } else if ($productAttribute->getCode()) {
                $this->setAttributeCode($productAttribute->getCode());
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
     * Get Edit_Attribute.
     *
     * @return string
     */
    public function getEditAttribute() : ?string
    {
        return $this->editAttribute;
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
     * Get Code.
     *
     * @return string
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * Get Prompt.
     *
     * @return string
     */
    public function getPrompt() : ?string
    {
        return $this->prompt;
    }

    /**
     * Get Image.
     *
     * @return string
     */
    public function getImage() : ?string
    {
        return $this->image;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice() : ?float
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float
     */
    public function getCost() : ?float
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight() : ?float
    {
        return $this->weight;
    }

    /**
     * Get Default.
     *
     * @return bool
     */
    public function getDefault() : ?bool
    {
        return $this->default;
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
     * Set Code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Prompt.
     *
     * @param ?string $prompt
     * @return $this
     */
    public function setPrompt(?string $prompt) : self
    {
        $this->prompt = $prompt;

        return $this;
    }

    /**
     * Set Image.
     *
     * @param ?string $image
     * @return $this
     */
    public function setImage(?string $image) : self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param ?float $cost
     * @return $this
     */
    public function setCost(?float $cost) : self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Set Default.
     *
     * @param ?bool $default
     * @return $this
     */
    public function setDefault(?bool $default) : self
    {
        $this->default = $default;

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

        $data['Code'] = $this->getCode();

        $data['Prompt'] = $this->getPrompt();

        if (!is_null($this->getImage())) {
            $data['Image'] = $this->getImage();
        }

        if (!is_null($this->getPrice())) {
            $data['Price'] = $this->getPrice();
        }

        if (!is_null($this->getCost())) {
            $data['Cost'] = $this->getCost();
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = $this->getWeight();
        }

        if (!is_null($this->getDefault())) {
            $data['Default'] = $this->getDefault();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OptionInsert($this, $httpResponse, $data);
    }
}
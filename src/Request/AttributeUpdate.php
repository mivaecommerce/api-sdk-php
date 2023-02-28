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
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Attribute_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attribute_update
 */
class AttributeUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Attribute_Update';

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
    protected ?string $type = null;

    /** @var ?string */
    protected ?string $image = null;

    /** @var ?float */
    protected ?float $price = null;

    /** @var ?float */
    protected ?float $cost = null;

    /** @var ?float */
    protected ?float $weight = null;

    /** @var ?bool */
    protected ?bool $copy = null;

    /** @var ?bool */
    protected ?bool $required = null;

    /** @var ?bool */
    protected ?bool $inventory = null;

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

            $this->setEditAttribute($productAttribute->getCode());
            $this->setCode($productAttribute->getCode());
            $this->setPrompt($productAttribute->getPrompt());
            $this->setType($productAttribute->getType());
            $this->setImage($productAttribute->getImage());
            $this->setPrice($productAttribute->getPrice());
            $this->setCost($productAttribute->getCost());
            $this->setWeight($productAttribute->getWeight());
            $this->setRequired($productAttribute->getRequired());
            $this->setInventory($productAttribute->getInventory());
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
     * Get Type.
     *
     * @return string
     */
    public function getType() : ?string
    {
        return $this->type;
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
     * Get Copy.
     *
     * @return bool
     */
    public function getCopy() : ?bool
    {
        return $this->copy;
    }

    /**
     * Get Required.
     *
     * @return bool
     */
    public function getRequired() : ?bool
    {
        return $this->required;
    }

    /**
     * Get Inventory.
     *
     * @return bool
     */
    public function getInventory() : ?bool
    {
        return $this->inventory;
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
     * Set Type.
     *
     * @param ?string $type
     * @return $this
     */
    public function setType(?string $type) : self
    {
        $this->type = $type;

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
     * Set Copy.
     *
     * @param ?bool $copy
     * @return $this
     */
    public function setCopy(?bool $copy) : self
    {
        $this->copy = $copy;

        return $this;
    }

    /**
     * Set Required.
     *
     * @param ?bool $required
     * @return $this
     */
    public function setRequired(?bool $required) : self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set Inventory.
     *
     * @param ?bool $inventory
     * @return $this
     */
    public function setInventory(?bool $inventory) : self
    {
        $this->inventory = $inventory;

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
        } else if ($this->getEditAttribute()) {
            $data['Edit_Attribute'] = $this->getEditAttribute();
        } else if ($this->getAttributeCode()) {
            $data['Attribute_Code'] = $this->getAttributeCode();
        }

        if (!is_null($this->getEditAttribute())) {
            $data['Edit_Attribute'] = $this->getEditAttribute();
        }

        if (!is_null($this->getCode())) {
            $data['Code'] = $this->getCode();
        }

        if (!is_null($this->getPrompt())) {
            $data['Prompt'] = $this->getPrompt();
        }

        if (!is_null($this->getType())) {
            $data['Type'] = $this->getType();
        }

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

        if (!is_null($this->getCopy())) {
            $data['Copy'] = $this->getCopy();
        }

        if (!is_null($this->getRequired())) {
            $data['Required'] = $this->getRequired();
        }

        if (!is_null($this->getInventory())) {
            $data['Inventory'] = $this->getInventory();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeUpdate($this, $httpResponse, $data);
    }
}
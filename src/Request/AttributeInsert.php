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
use MerchantAPI\DecimalHelper;

/**
 * Handles API Request Attribute_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attribute_insert
 */
class AttributeInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Attribute_Insert';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $prompt = null;

    /** @var ?string */
    protected ?string $type = null;

    /** @var ?string */
    protected ?string $image = null;

    /** @var ?(float|Decimal) */
    protected $price = null;

    /** @var ?(float|Decimal) */
    protected $cost = null;

    /** @var ?(float|Decimal) */
    protected $weight = null;

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

            $this->setProductCode($product->getCode());
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
     * @return float|Decimal
     */
    public function getPrice() 
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float|Decimal
     */
    public function getCost() 
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float|Decimal
     */
    public function getWeight() 
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
     * Set Code.
     *
     * @param string $code
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
     * @param string $type
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
     * @param ?(float|string|int|Decimal) $price
     * @return $this
     */
    public function setPrice($price) : self
    {
        $this->price = DecimalHelper::create($price, 16);

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param ?(float|string|int|Decimal) $cost
     * @return $this
     */
    public function setCost($cost) : self
    {
        $this->cost = DecimalHelper::create($cost, 16);

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?(float|string|int|Decimal) $weight
     * @return $this
     */
    public function setWeight($weight) : self
    {
        $this->weight = DecimalHelper::create($weight, 16);

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
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        }

        if (!is_null($this->getProductCode())) {
            $data['Product_Code'] = $this->getProductCode();
        }

        $data['Code'] = $this->getCode();

        if (!is_null($this->getPrompt())) {
            $data['Prompt'] = $this->getPrompt();
        }

        $data['Type'] = $this->getType();

        if (!is_null($this->getImage())) {
            $data['Image'] = $this->getImage();
        }

        if (!is_null($this->getPrice())) {
            $data['Price'] = DecimalHelper::serialize($this->getPrice(), 8);
        }

        if (!is_null($this->getCost())) {
            $data['Cost'] = DecimalHelper::serialize($this->getCost(), 8);
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = DecimalHelper::serialize($this->getWeight(), 8);
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
        return new \MerchantAPI\Response\AttributeInsert($this, $httpResponse, $data);
    }
}
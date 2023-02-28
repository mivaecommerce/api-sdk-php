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
use MerchantAPI\Model\VariantAttribute;
use MerchantAPI\Model\VariantPart;
use MerchantAPI\Model\ProductVariant;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request ProductVariant_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariant_update
 */
class ProductVariantUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductVariant_Update';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?int */
    protected ?int $variantId = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $attributes;

    /** @var \MerchantAPI\Collection */
    protected Collection $parts;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\ProductVariant $productVariant
     */
    public function __construct(?BaseClient $client = null, ?ProductVariant $productVariant = null)
    {
        parent::__construct($client);
        $this->attributes = new Collection();
        $this->parts = new Collection();

        if ($productVariant) {
            if ($productVariant->getProductId()) {
                $this->setProductId($productVariant->getProductId());
            }

            if ($productVariant->getVariantId()) {
                $this->setVariantId($productVariant->getVariantId());
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
     * Get Variant_ID.
     *
     * @return int
     */
    public function getVariantId() : ?int
    {
        return $this->variantId;
    }

    /**
     * Get Attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAttributes() : ?Collection
    {
        return $this->attributes;
    }

    /**
     * Get Parts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getParts() : ?Collection
    {
        return $this->parts;
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
     * Set Variant_ID.
     *
     * @param ?int $variantId
     * @return $this
     */
    public function setVariantId(?int $variantId) : self
    {
        $this->variantId = $variantId;

        return $this;
    }

    /**
     * Set Attributes.
     *
     * @param \MerchantAPI\Collection|array $attributes
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes($attributes) : self
    {
        if (!is_array($attributes) && !$attributes instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($attributes) ? get_class($attributes) : gettype($attributes)));
        }

        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new VariantAttribute($model);
            } else if (!$model instanceof VariantAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->attributes = new Collection($attributes);

        return $this;
    }

    /**
     * Set Parts.
     *
     * @param \MerchantAPI\Collection|array $parts
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setParts($parts) : self
    {
        if (!is_array($parts) && !$parts instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($parts) ? get_class($parts) : gettype($parts)));
        }

        foreach ($parts as &$model) {
            if (is_array($model)) {
                $model = new VariantPart($model);
            } else if (!$model instanceof VariantPart) {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantPart or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->parts = new Collection($parts);

        return $this;
    }

    /**
     * Add Attributes.
     *
     * @param \MerchantAPI\Model\VariantAttribute
     * @return $this
     */
    public function addVariantAttribute(VariantAttribute $model) : self
    {
        $this->attributes[] = $model;
        return $this;
    }

    /**
     * Add many VariantAttribute.
     *
     * @param (\MerchantAPI\Model\VariantAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addAttributes(array $attributes) : self
    {
        foreach ($attributes as $e) {
            if (is_array($e)) {
                $this->attributes[] = new VariantAttribute($e);
            } else if ($e instanceof VariantAttribute) {
                $this->attributes[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantAttribute or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Parts.
     *
     * @param \MerchantAPI\Model\VariantPart
     * @return $this
     */
    public function addVariantPart(VariantPart $model) : self
    {
        $this->parts[] = $model;
        return $this;
    }

    /**
     * Add many VariantPart.
     *
     * @param (\MerchantAPI\Model\VariantPart|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addParts(array $parts) : self
    {
        foreach ($parts as $e) {
            if (is_array($e)) {
                $this->parts[] = new VariantPart($e);
            } else if ($e instanceof VariantPart) {
                $this->parts[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of VariantPart or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

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

        if ($this->getVariantId()) {
            $data['Variant_ID'] = $this->getVariantId();
        }

        if (count($this->getAttributes())) {
            $data['Attributes'] = [];

            foreach ($this->getAttributes() as $i => $variantAttribute) {
                if ($variantAttribute->hasData()) {
                    $data['Attributes'][] = $variantAttribute->getData();
                }
            }
        }

        if (count($this->getParts())) {
            $data['Parts'] = [];

            foreach ($this->getParts() as $i => $variantPart) {
                $data['Parts'][] = $variantPart->getData();
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductVariantUpdate($this, $httpResponse, $data);
    }
}
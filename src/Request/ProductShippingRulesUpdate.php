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
use MerchantAPI\Model\ShippingRuleMethod;
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request ProductShippingRules_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productshippingrules_update
 */
class ProductShippingRulesUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductShippingRules_Update';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $productSku = null;

    /** @var ?bool */
    protected ?bool $shipsInOwnPackaging = null;

    /** @var ?bool */
    protected ?bool $limitShippingMethods = null;

    /** @var ?float */
    protected ?float $width = null;

    /** @var ?float */
    protected ?float $length = null;

    /** @var ?float */
    protected ?float $height = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $shippingMethods;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
    {
        parent::__construct($client);
        $this->shippingMethods = new Collection();

        if ($product) {
            if ($product->getId()) {
                $this->setProductId($product->getId());
            } else if ($product->getCode()) {
                $this->setEditProduct($product->getCode());
            } else if ($product->getSku()) {
                $this->setProductSku($product->getSku());
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
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct() : ?string
    {
        return $this->editProduct;
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSku() : ?string
    {
        return $this->productSku;
    }

    /**
     * Get ShipsInOwnPackaging.
     *
     * @return bool
     */
    public function getShipsInOwnPackaging() : ?bool
    {
        return $this->shipsInOwnPackaging;
    }

    /**
     * Get LimitShippingMethods.
     *
     * @return bool
     */
    public function getLimitShippingMethods() : ?bool
    {
        return $this->limitShippingMethods;
    }

    /**
     * Get Width.
     *
     * @return float
     */
    public function getWidth() : ?float
    {
        return $this->width;
    }

    /**
     * Get Length.
     *
     * @return float
     */
    public function getLength() : ?float
    {
        return $this->length;
    }

    /**
     * Get Height.
     *
     * @return float
     */
    public function getHeight() : ?float
    {
        return $this->height;
    }

    /**
     * Get ShippingMethods.
     *
     * @return \MerchantAPI\Collection
     */
    public function getShippingMethods() : ?Collection
    {
        return $this->shippingMethods;
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
     * Set Product_SKU.
     *
     * @param ?string $productSku
     * @return $this
     */
    public function setProductSku(?string $productSku) : self
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Set ShipsInOwnPackaging.
     *
     * @param ?bool $shipsInOwnPackaging
     * @return $this
     */
    public function setShipsInOwnPackaging(?bool $shipsInOwnPackaging) : self
    {
        $this->shipsInOwnPackaging = $shipsInOwnPackaging;

        return $this;
    }

    /**
     * Set LimitShippingMethods.
     *
     * @param ?bool $limitShippingMethods
     * @return $this
     */
    public function setLimitShippingMethods(?bool $limitShippingMethods) : self
    {
        $this->limitShippingMethods = $limitShippingMethods;

        return $this;
    }

    /**
     * Set Width.
     *
     * @param ?float $width
     * @return $this
     */
    public function setWidth(?float $width) : self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Set Length.
     *
     * @param ?float $length
     * @return $this
     */
    public function setLength(?float $length) : self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Set Height.
     *
     * @param ?float $height
     * @return $this
     */
    public function setHeight(?float $height) : self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set ShippingMethods.
     *
     * @param \MerchantAPI\Collection|array $shippingMethods
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setShippingMethods($shippingMethods) : self
    {
        if (!is_array($shippingMethods) && !$shippingMethods instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($shippingMethods) ? get_class($shippingMethods) : gettype($shippingMethods)));
        }

        foreach ($shippingMethods as &$model) {
            if (is_array($model)) {
                $model = new ShippingRuleMethod($model);
            } else if (!$model instanceof ShippingRuleMethod) {
                throw new \InvalidArgumentException(sprintf('Expected array of ShippingRuleMethod or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->shippingMethods = new Collection($shippingMethods);

        return $this;
    }

    /**
     * Add ShippingMethods.
     *
     * @param \MerchantAPI\Model\ShippingRuleMethod
     * @return $this
     */
    public function addShippingMethod(ShippingRuleMethod $model) : self
    {
        $this->shippingMethods[] = $model;
        return $this;
    }

    /**
     * Add many ShippingRuleMethod.
     *
     * @param (\MerchantAPI\Model\ShippingRuleMethod|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addShippingMethods(array $shippingMethods) : self
    {
        foreach ($shippingMethods as $e) {
            if (is_array($e)) {
                $this->shippingMethods[] = new ShippingRuleMethod($e);
            } else if ($e instanceof ShippingRuleMethod) {
                $this->shippingMethods[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ShippingRuleMethod or an array of arrays but got %s',
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
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        } else if ($this->getProductSku()) {
            $data['Product_SKU'] = $this->getProductSku();
        }

        if (!is_null($this->getShipsInOwnPackaging())) {
            $data['ShipsInOwnPackaging'] = $this->getShipsInOwnPackaging();
        }

        if (!is_null($this->getLimitShippingMethods())) {
            $data['LimitShippingMethods'] = $this->getLimitShippingMethods();
        }

        if (!is_null($this->getWidth())) {
            $data['Width'] = $this->getWidth();
        }

        if (!is_null($this->getLength())) {
            $data['Length'] = $this->getLength();
        }

        if (!is_null($this->getHeight())) {
            $data['Height'] = $this->getHeight();
        }

        if (count($this->getShippingMethods())) {
            $data['ShippingMethods'] = [];

            foreach ($this->getShippingMethods() as $i => $shippingMethod) {
                if ($shippingMethod->hasData()) {
                    $data['ShippingMethods'][] = $shippingMethod->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductShippingRulesUpdate($this, $httpResponse, $data);
    }
}
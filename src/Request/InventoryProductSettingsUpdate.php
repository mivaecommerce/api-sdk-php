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
 * Handles API Request InventoryProductSettings_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/inventoryproductsettings_update
 */
class InventoryProductSettingsUpdate extends Request
{
    /** @var string INVENTORY_CHOICE_DEFAULT */
    const INVENTORY_CHOICE_DEFAULT = 'Default';

    /** @var string INVENTORY_CHOICE_YES */
    const INVENTORY_CHOICE_YES = 'Yes';

    /** @var string INVENTORY_CHOICE_NO */
    const INVENTORY_CHOICE_NO = 'No';

    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'InventoryProductSettings_Update';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $trackLowStockLevel = null;

    /** @var ?string */
    protected ?string $trackOutOfStockLevel = null;

    /** @var ?string */
    protected ?string $hideOutOfStockProducts = null;

    /** @var ?int */
    protected ?int $lowStockLevel = null;

    /** @var ?int */
    protected ?int $outOfStockLevel = null;

    /** @var ?bool */
    protected ?bool $trackProduct = null;

    /** @var ?string */
    protected ?string $inStockMessageShort = null;

    /** @var ?string */
    protected ?string $inStockMessageLong = null;

    /** @var ?string */
    protected ?string $lowStockMessageShort = null;

    /** @var ?string */
    protected ?string $lowStockMessageLong = null;

    /** @var ?string */
    protected ?string $outOfStockMessageShort = null;

    /** @var ?string */
    protected ?string $outOfStockMessageLong = null;

    /** @var ?string */
    protected ?string $limitedStockMessage = null;

    /** @var ?int */
    protected ?int $adjustStockBy = null;

    /** @var ?int */
    protected ?int $currentStock = null;

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
     * Get TrackLowStockLevel.
     *
     * @return string
     */
    public function getTrackLowStockLevel() : ?string
    {
        return $this->trackLowStockLevel;
    }

    /**
     * Get TrackOutOfStockLevel.
     *
     * @return string
     */
    public function getTrackOutOfStockLevel() : ?string
    {
        return $this->trackOutOfStockLevel;
    }

    /**
     * Get HideOutOfStockProducts.
     *
     * @return string
     */
    public function getHideOutOfStockProducts() : ?string
    {
        return $this->hideOutOfStockProducts;
    }

    /**
     * Get LowStockLevel.
     *
     * @return int
     */
    public function getLowStockLevel() : ?int
    {
        return $this->lowStockLevel;
    }

    /**
     * Get OutOfStockLevel.
     *
     * @return int
     */
    public function getOutOfStockLevel() : ?int
    {
        return $this->outOfStockLevel;
    }

    /**
     * Get TrackProduct.
     *
     * @return bool
     */
    public function getTrackProduct() : ?bool
    {
        return $this->trackProduct;
    }

    /**
     * Get InStockMessageShort.
     *
     * @return string
     */
    public function getInStockMessageShort() : ?string
    {
        return $this->inStockMessageShort;
    }

    /**
     * Get InStockMessageLong.
     *
     * @return string
     */
    public function getInStockMessageLong() : ?string
    {
        return $this->inStockMessageLong;
    }

    /**
     * Get LowStockMessageShort.
     *
     * @return string
     */
    public function getLowStockMessageShort() : ?string
    {
        return $this->lowStockMessageShort;
    }

    /**
     * Get LowStockMessageLong.
     *
     * @return string
     */
    public function getLowStockMessageLong() : ?string
    {
        return $this->lowStockMessageLong;
    }

    /**
     * Get OutOfStockMessageShort.
     *
     * @return string
     */
    public function getOutOfStockMessageShort() : ?string
    {
        return $this->outOfStockMessageShort;
    }

    /**
     * Get OutOfStockMessageLong.
     *
     * @return string
     */
    public function getOutOfStockMessageLong() : ?string
    {
        return $this->outOfStockMessageLong;
    }

    /**
     * Get LimitedStockMessage.
     *
     * @return string
     */
    public function getLimitedStockMessage() : ?string
    {
        return $this->limitedStockMessage;
    }

    /**
     * Get AdjustStockBy.
     *
     * @return int
     */
    public function getAdjustStockBy() : ?int
    {
        return $this->adjustStockBy;
    }

    /**
     * Get CurrentStock.
     *
     * @return int
     */
    public function getCurrentStock() : ?int
    {
        return $this->currentStock;
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
     * Set TrackLowStockLevel.
     *
     * @param ?string $trackLowStockLevel
     * @return $this
     */
    public function setTrackLowStockLevel(?string $trackLowStockLevel) : self
    {
        $this->trackLowStockLevel = $trackLowStockLevel;

        return $this;
    }

    /**
     * Set TrackOutOfStockLevel.
     *
     * @param ?string $trackOutOfStockLevel
     * @return $this
     */
    public function setTrackOutOfStockLevel(?string $trackOutOfStockLevel) : self
    {
        $this->trackOutOfStockLevel = $trackOutOfStockLevel;

        return $this;
    }

    /**
     * Set HideOutOfStockProducts.
     *
     * @param ?string $hideOutOfStockProducts
     * @return $this
     */
    public function setHideOutOfStockProducts(?string $hideOutOfStockProducts) : self
    {
        $this->hideOutOfStockProducts = $hideOutOfStockProducts;

        return $this;
    }

    /**
     * Set LowStockLevel.
     *
     * @param ?int $lowStockLevel
     * @return $this
     */
    public function setLowStockLevel(?int $lowStockLevel) : self
    {
        $this->lowStockLevel = $lowStockLevel;

        return $this;
    }

    /**
     * Set OutOfStockLevel.
     *
     * @param ?int $outOfStockLevel
     * @return $this
     */
    public function setOutOfStockLevel(?int $outOfStockLevel) : self
    {
        $this->outOfStockLevel = $outOfStockLevel;

        return $this;
    }

    /**
     * Set TrackProduct.
     *
     * @param ?bool $trackProduct
     * @return $this
     */
    public function setTrackProduct(?bool $trackProduct) : self
    {
        $this->trackProduct = $trackProduct;

        return $this;
    }

    /**
     * Set InStockMessageShort.
     *
     * @param ?string $inStockMessageShort
     * @return $this
     */
    public function setInStockMessageShort(?string $inStockMessageShort) : self
    {
        $this->inStockMessageShort = $inStockMessageShort;

        return $this;
    }

    /**
     * Set InStockMessageLong.
     *
     * @param ?string $inStockMessageLong
     * @return $this
     */
    public function setInStockMessageLong(?string $inStockMessageLong) : self
    {
        $this->inStockMessageLong = $inStockMessageLong;

        return $this;
    }

    /**
     * Set LowStockMessageShort.
     *
     * @param ?string $lowStockMessageShort
     * @return $this
     */
    public function setLowStockMessageShort(?string $lowStockMessageShort) : self
    {
        $this->lowStockMessageShort = $lowStockMessageShort;

        return $this;
    }

    /**
     * Set LowStockMessageLong.
     *
     * @param ?string $lowStockMessageLong
     * @return $this
     */
    public function setLowStockMessageLong(?string $lowStockMessageLong) : self
    {
        $this->lowStockMessageLong = $lowStockMessageLong;

        return $this;
    }

    /**
     * Set OutOfStockMessageShort.
     *
     * @param ?string $outOfStockMessageShort
     * @return $this
     */
    public function setOutOfStockMessageShort(?string $outOfStockMessageShort) : self
    {
        $this->outOfStockMessageShort = $outOfStockMessageShort;

        return $this;
    }

    /**
     * Set OutOfStockMessageLong.
     *
     * @param ?string $outOfStockMessageLong
     * @return $this
     */
    public function setOutOfStockMessageLong(?string $outOfStockMessageLong) : self
    {
        $this->outOfStockMessageLong = $outOfStockMessageLong;

        return $this;
    }

    /**
     * Set LimitedStockMessage.
     *
     * @param ?string $limitedStockMessage
     * @return $this
     */
    public function setLimitedStockMessage(?string $limitedStockMessage) : self
    {
        $this->limitedStockMessage = $limitedStockMessage;

        return $this;
    }

    /**
     * Set AdjustStockBy.
     *
     * @param ?int $adjustStockBy
     * @return $this
     */
    public function setAdjustStockBy(?int $adjustStockBy) : self
    {
        $this->adjustStockBy = $adjustStockBy;

        return $this;
    }

    /**
     * Set CurrentStock.
     *
     * @param ?int $currentStock
     * @return $this
     */
    public function setCurrentStock(?int $currentStock) : self
    {
        $this->currentStock = $currentStock;

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

        if (!is_null($this->getTrackLowStockLevel())) {
            $data['TrackLowStockLevel'] = $this->getTrackLowStockLevel();
        }

        if (!is_null($this->getTrackOutOfStockLevel())) {
            $data['TrackOutOfStockLevel'] = $this->getTrackOutOfStockLevel();
        }

        if (!is_null($this->getHideOutOfStockProducts())) {
            $data['HideOutOfStockProducts'] = $this->getHideOutOfStockProducts();
        }

        if (!is_null($this->getLowStockLevel())) {
            $data['LowStockLevel'] = $this->getLowStockLevel();
        }

        if (!is_null($this->getOutOfStockLevel())) {
            $data['OutOfStockLevel'] = $this->getOutOfStockLevel();
        }

        if (!is_null($this->getTrackProduct())) {
            $data['TrackProduct'] = $this->getTrackProduct();
        }

        if (!is_null($this->getInStockMessageShort())) {
            $data['InStockMessageShort'] = $this->getInStockMessageShort();
        }

        if (!is_null($this->getInStockMessageLong())) {
            $data['InStockMessageLong'] = $this->getInStockMessageLong();
        }

        if (!is_null($this->getLowStockMessageShort())) {
            $data['LowStockMessageShort'] = $this->getLowStockMessageShort();
        }

        if (!is_null($this->getLowStockMessageLong())) {
            $data['LowStockMessageLong'] = $this->getLowStockMessageLong();
        }

        if (!is_null($this->getOutOfStockMessageShort())) {
            $data['OutOfStockMessageShort'] = $this->getOutOfStockMessageShort();
        }

        if (!is_null($this->getOutOfStockMessageLong())) {
            $data['OutOfStockMessageLong'] = $this->getOutOfStockMessageLong();
        }

        if (!is_null($this->getLimitedStockMessage())) {
            $data['LimitedStockMessage'] = $this->getLimitedStockMessage();
        }

        if (!is_null($this->getAdjustStockBy())) {
            $data['AdjustStockBy'] = $this->getAdjustStockBy();
        }

        if (!is_null($this->getCurrentStock())) {
            $data['CurrentStock'] = $this->getCurrentStock();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\InventoryProductSettingsUpdate($this, $httpResponse, $data);
    }
}
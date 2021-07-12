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
    const INVENTORY_CHOICE_DEFAULT = 'd';

    /** @var string INVENTORY_CHOICE_YES */
    const INVENTORY_CHOICE_YES = 'y';

    /** @var string INVENTORY_CHOICE_NO */
    const INVENTORY_CHOICE_NO = 'n';

    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'InventoryProductSettings_Update';

    /** @var int */
    protected $productId;

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $editProduct;

    /** @var string */
    protected $trackLowStockLevel;

    /** @var string */
    protected $trackOutOfStockLevel;

    /** @var string */
    protected $hideOutOfStockProducts;

    /** @var int */
    protected $lowStockLevel;

    /** @var int */
    protected $outOfStockLevel;

    /** @var bool */
    protected $trackProduct;

    /** @var string */
    protected $inStockMessageShort;

    /** @var string */
    protected $inStockMessageLong;

    /** @var string */
    protected $lowStockMessageShort;

    /** @var string */
    protected $lowStockMessageLong;

    /** @var string */
    protected $outOfStockMessageShort;

    /** @var string */
    protected $outOfStockMessageLong;

    /** @var string */
    protected $limitedStockMessage;

    /** @var int */
    protected $adjustStockBy;

    /** @var int */
    protected $currentStock;

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
     * Get TrackLowStockLevel.
     *
     * @return string
     */
    public function getTrackLowStockLevel()
    {
        return $this->trackLowStockLevel;
    }

    /**
     * Get TrackOutOfStockLevel.
     *
     * @return string
     */
    public function getTrackOutOfStockLevel()
    {
        return $this->trackOutOfStockLevel;
    }

    /**
     * Get HideOutOfStockProducts.
     *
     * @return string
     */
    public function getHideOutOfStockProducts()
    {
        return $this->hideOutOfStockProducts;
    }

    /**
     * Get LowStockLevel.
     *
     * @return int
     */
    public function getLowStockLevel()
    {
        return $this->lowStockLevel;
    }

    /**
     * Get OutOfStockLevel.
     *
     * @return int
     */
    public function getOutOfStockLevel()
    {
        return $this->outOfStockLevel;
    }

    /**
     * Get TrackProduct.
     *
     * @return bool
     */
    public function getTrackProduct()
    {
        return $this->trackProduct;
    }

    /**
     * Get InStockMessageShort.
     *
     * @return string
     */
    public function getInStockMessageShort()
    {
        return $this->inStockMessageShort;
    }

    /**
     * Get InStockMessageLong.
     *
     * @return string
     */
    public function getInStockMessageLong()
    {
        return $this->inStockMessageLong;
    }

    /**
     * Get LowStockMessageShort.
     *
     * @return string
     */
    public function getLowStockMessageShort()
    {
        return $this->lowStockMessageShort;
    }

    /**
     * Get LowStockMessageLong.
     *
     * @return string
     */
    public function getLowStockMessageLong()
    {
        return $this->lowStockMessageLong;
    }

    /**
     * Get OutOfStockMessageShort.
     *
     * @return string
     */
    public function getOutOfStockMessageShort()
    {
        return $this->outOfStockMessageShort;
    }

    /**
     * Get OutOfStockMessageLong.
     *
     * @return string
     */
    public function getOutOfStockMessageLong()
    {
        return $this->outOfStockMessageLong;
    }

    /**
     * Get LimitedStockMessage.
     *
     * @return string
     */
    public function getLimitedStockMessage()
    {
        return $this->limitedStockMessage;
    }

    /**
     * Get AdjustStockBy.
     *
     * @return int
     */
    public function getAdjustStockBy()
    {
        return $this->adjustStockBy;
    }

    /**
     * Get CurrentStock.
     *
     * @return int
     */
    public function getCurrentStock()
    {
        return $this->currentStock;
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
     * Set TrackLowStockLevel.
     *
     * @param string
     * @return $this
     */
    public function setTrackLowStockLevel($trackLowStockLevel)
    {
        $this->trackLowStockLevel = $trackLowStockLevel;

        return $this;
    }

    /**
     * Set TrackOutOfStockLevel.
     *
     * @param string
     * @return $this
     */
    public function setTrackOutOfStockLevel($trackOutOfStockLevel)
    {
        $this->trackOutOfStockLevel = $trackOutOfStockLevel;

        return $this;
    }

    /**
     * Set HideOutOfStockProducts.
     *
     * @param string
     * @return $this
     */
    public function setHideOutOfStockProducts($hideOutOfStockProducts)
    {
        $this->hideOutOfStockProducts = $hideOutOfStockProducts;

        return $this;
    }

    /**
     * Set LowStockLevel.
     *
     * @param int
     * @return $this
     */
    public function setLowStockLevel($lowStockLevel)
    {
        $this->lowStockLevel = $lowStockLevel;

        return $this;
    }

    /**
     * Set OutOfStockLevel.
     *
     * @param int
     * @return $this
     */
    public function setOutOfStockLevel($outOfStockLevel)
    {
        $this->outOfStockLevel = $outOfStockLevel;

        return $this;
    }

    /**
     * Set TrackProduct.
     *
     * @param bool
     * @return $this
     */
    public function setTrackProduct($trackProduct)
    {
        $this->trackProduct = $trackProduct;

        return $this;
    }

    /**
     * Set InStockMessageShort.
     *
     * @param string
     * @return $this
     */
    public function setInStockMessageShort($inStockMessageShort)
    {
        $this->inStockMessageShort = $inStockMessageShort;

        return $this;
    }

    /**
     * Set InStockMessageLong.
     *
     * @param string
     * @return $this
     */
    public function setInStockMessageLong($inStockMessageLong)
    {
        $this->inStockMessageLong = $inStockMessageLong;

        return $this;
    }

    /**
     * Set LowStockMessageShort.
     *
     * @param string
     * @return $this
     */
    public function setLowStockMessageShort($lowStockMessageShort)
    {
        $this->lowStockMessageShort = $lowStockMessageShort;

        return $this;
    }

    /**
     * Set LowStockMessageLong.
     *
     * @param string
     * @return $this
     */
    public function setLowStockMessageLong($lowStockMessageLong)
    {
        $this->lowStockMessageLong = $lowStockMessageLong;

        return $this;
    }

    /**
     * Set OutOfStockMessageShort.
     *
     * @param string
     * @return $this
     */
    public function setOutOfStockMessageShort($outOfStockMessageShort)
    {
        $this->outOfStockMessageShort = $outOfStockMessageShort;

        return $this;
    }

    /**
     * Set OutOfStockMessageLong.
     *
     * @param string
     * @return $this
     */
    public function setOutOfStockMessageLong($outOfStockMessageLong)
    {
        $this->outOfStockMessageLong = $outOfStockMessageLong;

        return $this;
    }

    /**
     * Set LimitedStockMessage.
     *
     * @param string
     * @return $this
     */
    public function setLimitedStockMessage($limitedStockMessage)
    {
        $this->limitedStockMessage = $limitedStockMessage;

        return $this;
    }

    /**
     * Set AdjustStockBy.
     *
     * @param int
     * @return $this
     */
    public function setAdjustStockBy($adjustStockBy)
    {
        $this->adjustStockBy = $adjustStockBy;

        return $this;
    }

    /**
     * Set CurrentStock.
     *
     * @param int
     * @return $this
     */
    public function setCurrentStock($currentStock)
    {
        $this->currentStock = $currentStock;

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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\InventoryProductSettingsUpdate($this, $httpResponse, $data);
    }
}
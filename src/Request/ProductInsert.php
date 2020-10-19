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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;

/**
 * Handles API Request Product_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/product_insert
 */
class ProductInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Product_Insert';

    /** @var string */
    protected $productCode;

    /** @var string */
    protected $productSku;

    /** @var string */
    protected $productName;

    /** @var string */
    protected $productDescription;

    /** @var string */
    protected $productCanonicalCategoryCode;

    /** @var string */
    protected $productAlternateDisplayPage;

    /** @var string */
    protected $productPageTitle;

    /** @var string */
    protected $productThumbnail;

    /** @var string */
    protected $productImage;

    /** @var float */
    protected $productPrice;

    /** @var float */
    protected $productCost;

    /** @var float */
    protected $productWeight;

    /** @var int */
    protected $productInventory;

    /** @var bool */
    protected $productTaxable;

    /** @var bool */
    protected $productActive;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($product) {
            $this->setProductCode($product->getCode());
            $this->setProductSku($product->getSku());
            $this->setProductName($product->getName());
            $this->setProductDescription($product->getDescription());
            $this->setProductCanonicalCategoryCode($product->getCanonicalCategoryCode());
            $this->setProductAlternateDisplayPage($product->getPageCode());
            $this->setProductPageTitle($product->getPageTitle());
            $this->setProductThumbnail($product->getThumbnail());
            $this->setProductImage($product->getImage());
            $this->setProductPrice($product->getPrice());
            $this->setProductCost($product->getCost());
            $this->setProductWeight($product->getWeight());
            $this->setProductInventory($product->getProductInventory());
            $this->setProductTaxable($product->getTaxable());
            $this->setProductActive($product->getActive());

            if ($product->getCustomFieldValues()) {
                $this->setCustomFieldValues(clone $product->getCustomFieldValues());
            }
        }
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
     * Get Product_SKU.
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * Get Product_Name.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Get Product_Description.
     *
     * @return string
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * Get Product_Canonical_Category_Code.
     *
     * @return string
     */
    public function getProductCanonicalCategoryCode()
    {
        return $this->productCanonicalCategoryCode;
    }

    /**
     * Get Product_Alternate_Display_Page.
     *
     * @return string
     */
    public function getProductAlternateDisplayPage()
    {
        return $this->productAlternateDisplayPage;
    }

    /**
     * Get Product_Page_Title.
     *
     * @return string
     */
    public function getProductPageTitle()
    {
        return $this->productPageTitle;
    }

    /**
     * Get Product_Thumbnail.
     *
     * @return string
     */
    public function getProductThumbnail()
    {
        return $this->productThumbnail;
    }

    /**
     * Get Product_Image.
     *
     * @return string
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * Get Product_Price.
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Get Product_Cost.
     *
     * @return float
     */
    public function getProductCost()
    {
        return $this->productCost;
    }

    /**
     * Get Product_Weight.
     *
     * @return float
     */
    public function getProductWeight()
    {
        return $this->productWeight;
    }

    /**
     * Get Product_Inventory.
     *
     * @return int
     */
    public function getProductInventory()
    {
        return $this->productInventory;
    }

    /**
     * Get Product_Taxable.
     *
     * @return bool
     */
    public function getProductTaxable()
    {
        return $this->productTaxable;
    }

    /**
     * Get Product_Active.
     *
     * @return bool
     */
    public function getProductActive()
    {
        return $this->productActive;
    }

    /**
     * Get CustomField_Values.
     *
     * @return CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->customFieldValues;
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
     * Set Product_SKU.
     *
     * @param string
     * @return $this
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Set Product_Name.
     *
     * @param string
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Set Product_Description.
     *
     * @param string
     * @return $this
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Set Product_Canonical_Category_Code.
     *
     * @param string
     * @return $this
     */
    public function setProductCanonicalCategoryCode($productCanonicalCategoryCode)
    {
        $this->productCanonicalCategoryCode = $productCanonicalCategoryCode;

        return $this;
    }

    /**
     * Set Product_Alternate_Display_Page.
     *
     * @param string
     * @return $this
     */
    public function setProductAlternateDisplayPage($productAlternateDisplayPage)
    {
        $this->productAlternateDisplayPage = $productAlternateDisplayPage;

        return $this;
    }

    /**
     * Set Product_Page_Title.
     *
     * @param string
     * @return $this
     */
    public function setProductPageTitle($productPageTitle)
    {
        $this->productPageTitle = $productPageTitle;

        return $this;
    }

    /**
     * Set Product_Thumbnail.
     *
     * @param string
     * @return $this
     */
    public function setProductThumbnail($productThumbnail)
    {
        $this->productThumbnail = $productThumbnail;

        return $this;
    }

    /**
     * Set Product_Image.
     *
     * @param string
     * @return $this
     */
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;

        return $this;
    }

    /**
     * Set Product_Price.
     *
     * @param float
     * @return $this
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Set Product_Cost.
     *
     * @param float
     * @return $this
     */
    public function setProductCost($productCost)
    {
        $this->productCost = $productCost;

        return $this;
    }

    /**
     * Set Product_Weight.
     *
     * @param float
     * @return $this
     */
    public function setProductWeight($productWeight)
    {
        $this->productWeight = $productWeight;

        return $this;
    }

    /**
     * Set Product_Inventory.
     *
     * @param int
     * @return $this
     */
    public function setProductInventory($productInventory)
    {
        $this->productInventory = $productInventory;

        return $this;
    }

    /**
     * Set Product_Taxable.
     *
     * @param bool
     * @return $this
     */
    public function setProductTaxable($productTaxable)
    {
        $this->productTaxable = $productTaxable;

        return $this;
    }

    /**
     * Set Product_Active.
     *
     * @param bool
     * @return $this
     */
    public function setProductActive($productActive)
    {
        $this->productActive = $productActive;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|null
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues)
    {
        if (is_array($customFieldValues)) {
            $customFieldValues = new CustomFieldValues($customFieldValues);
        } else if (!$customFieldValues instanceof CustomFieldValues) {
            throw new \InvalidArgumentException(sprintf('Expected instance of CustomFieldValues or an array but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }

        $this->customFieldValues = $customFieldValues;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Product_Code'] = $this->getProductCode();

        $data['Product_SKU'] = $this->getProductSku();

        $data['Product_Name'] = $this->getProductName();

        if (!is_null($this->getProductDescription())) {
            $data['Product_Description'] = $this->getProductDescription();
        }

        if (!is_null($this->getProductCanonicalCategoryCode())) {
            $data['Product_Canonical_Category_Code'] = $this->getProductCanonicalCategoryCode();
        }

        if (!is_null($this->getProductAlternateDisplayPage())) {
            $data['Product_Alternate_Display_Page'] = $this->getProductAlternateDisplayPage();
        }

        if (!is_null($this->getProductPageTitle())) {
            $data['Product_Page_Title'] = $this->getProductPageTitle();
        }

        if (!is_null($this->getProductThumbnail())) {
            $data['Product_Thumbnail'] = $this->getProductThumbnail();
        }

        if (!is_null($this->getProductImage())) {
            $data['Product_Image'] = $this->getProductImage();
        }

        if (!is_null($this->getProductPrice())) {
            $data['Product_Price'] = $this->getProductPrice();
        }

        if (!is_null($this->getProductCost())) {
            $data['Product_Cost'] = $this->getProductCost();
        }

        if (!is_null($this->getProductWeight())) {
            $data['Product_Weight'] = $this->getProductWeight();
        }

        if (!is_null($this->getProductInventory())) {
            $data['Product_Inventory'] = $this->getProductInventory();
        }

        if (!is_null($this->getProductTaxable())) {
            $data['Product_Taxable'] = $this->getProductTaxable();
        }

        if (!is_null($this->getProductActive())) {
            $data['Product_Active'] = $this->getProductActive();
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductInsert($this, $httpResponse, $data);
    }
}
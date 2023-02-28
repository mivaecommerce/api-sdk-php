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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Product_Insert';

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?string */
    protected ?string $productSku = null;

    /** @var ?string */
    protected ?string $productName = null;

    /** @var ?string */
    protected ?string $productDescription = null;

    /** @var ?string */
    protected ?string $productCanonicalCategoryCode = null;

    /** @var ?string */
    protected ?string $productAlternateDisplayPage = null;

    /** @var ?string */
    protected ?string $productPageTitle = null;

    /** @var ?string */
    protected ?string $productThumbnail = null;

    /** @var ?string */
    protected ?string $productImage = null;

    /** @var ?float */
    protected ?float $productPrice = null;

    /** @var ?float */
    protected ?float $productCost = null;

    /** @var ?float */
    protected ?float $productWeight = null;

    /** @var ?int */
    protected ?int $productInventory = null;

    /** @var ?bool */
    protected ?bool $productTaxable = null;

    /** @var ?bool */
    protected ?bool $productActive = null;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Product $product
     */
    public function __construct(?BaseClient $client = null, ?Product $product = null)
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
     * Get Product_Name.
     *
     * @return string
     */
    public function getProductName() : ?string
    {
        return $this->productName;
    }

    /**
     * Get Product_Description.
     *
     * @return string
     */
    public function getProductDescription() : ?string
    {
        return $this->productDescription;
    }

    /**
     * Get Product_Canonical_Category_Code.
     *
     * @return string
     */
    public function getProductCanonicalCategoryCode() : ?string
    {
        return $this->productCanonicalCategoryCode;
    }

    /**
     * Get Product_Alternate_Display_Page.
     *
     * @return string
     */
    public function getProductAlternateDisplayPage() : ?string
    {
        return $this->productAlternateDisplayPage;
    }

    /**
     * Get Product_Page_Title.
     *
     * @return string
     */
    public function getProductPageTitle() : ?string
    {
        return $this->productPageTitle;
    }

    /**
     * Get Product_Thumbnail.
     *
     * @return string
     */
    public function getProductThumbnail() : ?string
    {
        return $this->productThumbnail;
    }

    /**
     * Get Product_Image.
     *
     * @return string
     */
    public function getProductImage() : ?string
    {
        return $this->productImage;
    }

    /**
     * Get Product_Price.
     *
     * @return float
     */
    public function getProductPrice() : ?float
    {
        return $this->productPrice;
    }

    /**
     * Get Product_Cost.
     *
     * @return float
     */
    public function getProductCost() : ?float
    {
        return $this->productCost;
    }

    /**
     * Get Product_Weight.
     *
     * @return float
     */
    public function getProductWeight() : ?float
    {
        return $this->productWeight;
    }

    /**
     * Get Product_Inventory.
     *
     * @return int
     */
    public function getProductInventory() : ?int
    {
        return $this->productInventory;
    }

    /**
     * Get Product_Taxable.
     *
     * @return bool
     */
    public function getProductTaxable() : ?bool
    {
        return $this->productTaxable;
    }

    /**
     * Get Product_Active.
     *
     * @return bool
     */
    public function getProductActive() : ?bool
    {
        return $this->productActive;
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->customFieldValues;
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
     * Set Product_Name.
     *
     * @param ?string $productName
     * @return $this
     */
    public function setProductName(?string $productName) : self
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Set Product_Description.
     *
     * @param ?string $productDescription
     * @return $this
     */
    public function setProductDescription(?string $productDescription) : self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Set Product_Canonical_Category_Code.
     *
     * @param ?string $productCanonicalCategoryCode
     * @return $this
     */
    public function setProductCanonicalCategoryCode(?string $productCanonicalCategoryCode) : self
    {
        $this->productCanonicalCategoryCode = $productCanonicalCategoryCode;

        return $this;
    }

    /**
     * Set Product_Alternate_Display_Page.
     *
     * @param ?string $productAlternateDisplayPage
     * @return $this
     */
    public function setProductAlternateDisplayPage(?string $productAlternateDisplayPage) : self
    {
        $this->productAlternateDisplayPage = $productAlternateDisplayPage;

        return $this;
    }

    /**
     * Set Product_Page_Title.
     *
     * @param ?string $productPageTitle
     * @return $this
     */
    public function setProductPageTitle(?string $productPageTitle) : self
    {
        $this->productPageTitle = $productPageTitle;

        return $this;
    }

    /**
     * Set Product_Thumbnail.
     *
     * @param ?string $productThumbnail
     * @return $this
     */
    public function setProductThumbnail(?string $productThumbnail) : self
    {
        $this->productThumbnail = $productThumbnail;

        return $this;
    }

    /**
     * Set Product_Image.
     *
     * @param ?string $productImage
     * @return $this
     */
    public function setProductImage(?string $productImage) : self
    {
        $this->productImage = $productImage;

        return $this;
    }

    /**
     * Set Product_Price.
     *
     * @param ?float $productPrice
     * @return $this
     */
    public function setProductPrice(?float $productPrice) : self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Set Product_Cost.
     *
     * @param ?float $productCost
     * @return $this
     */
    public function setProductCost(?float $productCost) : self
    {
        $this->productCost = $productCost;

        return $this;
    }

    /**
     * Set Product_Weight.
     *
     * @param ?float $productWeight
     * @return $this
     */
    public function setProductWeight(?float $productWeight) : self
    {
        $this->productWeight = $productWeight;

        return $this;
    }

    /**
     * Set Product_Inventory.
     *
     * @param ?int $productInventory
     * @return $this
     */
    public function setProductInventory(?int $productInventory) : self
    {
        $this->productInventory = $productInventory;

        return $this;
    }

    /**
     * Set Product_Taxable.
     *
     * @param ?bool $productTaxable
     * @return $this
     */
    public function setProductTaxable(?bool $productTaxable) : self
    {
        $this->productTaxable = $productTaxable;

        return $this;
    }

    /**
     * Set Product_Active.
     *
     * @param ?bool $productActive
     * @return $this
     */
    public function setProductActive(?bool $productActive) : self
    {
        $this->productActive = $productActive;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|array $customFieldValues
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues) : self
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
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductInsert($this, $httpResponse, $data);
    }
}
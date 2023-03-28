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
use MerchantAPI\Model\CopyProductRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyProductRules_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copyproductrules_update
 */
class CopyProductRulesUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyProductRules_Update';

    /** @var ?int */
    protected ?int $copyProductRulesId = null;

    /** @var ?string */
    protected ?string $copyProductRulesName = null;

    /** @var ?string */
    protected ?string $name = null;

    /** @var ?bool */
    protected ?bool $coreProductData = null;

    /** @var ?bool */
    protected ?bool $attributes = null;

    /** @var ?bool */
    protected ?bool $categoryAssignments = null;

    /** @var ?bool */
    protected ?bool $inventorySettings = null;

    /** @var ?bool */
    protected ?bool $inventoryLevel = null;

    /** @var ?bool */
    protected ?bool $images = null;

    /** @var ?bool */
    protected ?bool $relatedProducts = null;

    /** @var ?bool */
    protected ?bool $upsale = null;

    /** @var ?bool */
    protected ?bool $availabilityGroupAssignments = null;

    /** @var ?bool */
    protected ?bool $priceGroupAssignments = null;

    /** @var ?bool */
    protected ?bool $digitalDownloadSettings = null;

    /** @var ?bool */
    protected ?bool $giftCertificateSales = null;

    /** @var ?bool */
    protected ?bool $subscriptionSettings = null;

    /** @var ?bool */
    protected ?bool $paymentRules = null;

    /** @var ?bool */
    protected ?bool $shippingRules = null;

    /** @var ?bool */
    protected ?bool $productKits = null;

    /** @var ?bool */
    protected ?bool $productVariants = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CopyProductRule $copyProductRule
     */
    public function __construct(?BaseClient $client = null, ?CopyProductRule $copyProductRule = null)
    {
        parent::__construct($client);
        if ($copyProductRule) {
            if ($copyProductRule->getId()) {
                $this->setCopyProductRulesId($copyProductRule->getId());
            } else if ($copyProductRule->getName()) {
                $this->setCopyProductRulesName($copyProductRule->getName());
            }
        }
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
     * Get Name.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Get CoreProductData.
     *
     * @return bool
     */
    public function getCoreProductData() : ?bool
    {
        return $this->coreProductData;
    }

    /**
     * Get Attributes.
     *
     * @return bool
     */
    public function getAttributes() : ?bool
    {
        return $this->attributes;
    }

    /**
     * Get CategoryAssignments.
     *
     * @return bool
     */
    public function getCategoryAssignments() : ?bool
    {
        return $this->categoryAssignments;
    }

    /**
     * Get InventorySettings.
     *
     * @return bool
     */
    public function getInventorySettings() : ?bool
    {
        return $this->inventorySettings;
    }

    /**
     * Get InventoryLevel.
     *
     * @return bool
     */
    public function getInventoryLevel() : ?bool
    {
        return $this->inventoryLevel;
    }

    /**
     * Get Images.
     *
     * @return bool
     */
    public function getImages() : ?bool
    {
        return $this->images;
    }

    /**
     * Get RelatedProducts.
     *
     * @return bool
     */
    public function getRelatedProducts() : ?bool
    {
        return $this->relatedProducts;
    }

    /**
     * Get Upsale.
     *
     * @return bool
     */
    public function getUpsale() : ?bool
    {
        return $this->upsale;
    }

    /**
     * Get AvailabilityGroupAssignments.
     *
     * @return bool
     */
    public function getAvailabilityGroupAssignments() : ?bool
    {
        return $this->availabilityGroupAssignments;
    }

    /**
     * Get PriceGroupAssignments.
     *
     * @return bool
     */
    public function getPriceGroupAssignments() : ?bool
    {
        return $this->priceGroupAssignments;
    }

    /**
     * Get DigitalDownloadSettings.
     *
     * @return bool
     */
    public function getDigitalDownloadSettings() : ?bool
    {
        return $this->digitalDownloadSettings;
    }

    /**
     * Get GiftCertificateSales.
     *
     * @return bool
     */
    public function getGiftCertificateSales() : ?bool
    {
        return $this->giftCertificateSales;
    }

    /**
     * Get SubscriptionSettings.
     *
     * @return bool
     */
    public function getSubscriptionSettings() : ?bool
    {
        return $this->subscriptionSettings;
    }

    /**
     * Get PaymentRules.
     *
     * @return bool
     */
    public function getPaymentRules() : ?bool
    {
        return $this->paymentRules;
    }

    /**
     * Get ShippingRules.
     *
     * @return bool
     */
    public function getShippingRules() : ?bool
    {
        return $this->shippingRules;
    }

    /**
     * Get ProductKits.
     *
     * @return bool
     */
    public function getProductKits() : ?bool
    {
        return $this->productKits;
    }

    /**
     * Get ProductVariants.
     *
     * @return bool
     */
    public function getProductVariants() : ?bool
    {
        return $this->productVariants;
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
     * Set Name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set CoreProductData.
     *
     * @param ?bool $coreProductData
     * @return $this
     */
    public function setCoreProductData(?bool $coreProductData) : self
    {
        $this->coreProductData = $coreProductData;

        return $this;
    }

    /**
     * Set Attributes.
     *
     * @param ?bool $attributes
     * @return $this
     */
    public function setAttributes(?bool $attributes) : self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Set CategoryAssignments.
     *
     * @param ?bool $categoryAssignments
     * @return $this
     */
    public function setCategoryAssignments(?bool $categoryAssignments) : self
    {
        $this->categoryAssignments = $categoryAssignments;

        return $this;
    }

    /**
     * Set InventorySettings.
     *
     * @param ?bool $inventorySettings
     * @return $this
     */
    public function setInventorySettings(?bool $inventorySettings) : self
    {
        $this->inventorySettings = $inventorySettings;

        return $this;
    }

    /**
     * Set InventoryLevel.
     *
     * @param ?bool $inventoryLevel
     * @return $this
     */
    public function setInventoryLevel(?bool $inventoryLevel) : self
    {
        $this->inventoryLevel = $inventoryLevel;

        return $this;
    }

    /**
     * Set Images.
     *
     * @param ?bool $images
     * @return $this
     */
    public function setImages(?bool $images) : self
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Set RelatedProducts.
     *
     * @param ?bool $relatedProducts
     * @return $this
     */
    public function setRelatedProducts(?bool $relatedProducts) : self
    {
        $this->relatedProducts = $relatedProducts;

        return $this;
    }

    /**
     * Set Upsale.
     *
     * @param ?bool $upsale
     * @return $this
     */
    public function setUpsale(?bool $upsale) : self
    {
        $this->upsale = $upsale;

        return $this;
    }

    /**
     * Set AvailabilityGroupAssignments.
     *
     * @param ?bool $availabilityGroupAssignments
     * @return $this
     */
    public function setAvailabilityGroupAssignments(?bool $availabilityGroupAssignments) : self
    {
        $this->availabilityGroupAssignments = $availabilityGroupAssignments;

        return $this;
    }

    /**
     * Set PriceGroupAssignments.
     *
     * @param ?bool $priceGroupAssignments
     * @return $this
     */
    public function setPriceGroupAssignments(?bool $priceGroupAssignments) : self
    {
        $this->priceGroupAssignments = $priceGroupAssignments;

        return $this;
    }

    /**
     * Set DigitalDownloadSettings.
     *
     * @param ?bool $digitalDownloadSettings
     * @return $this
     */
    public function setDigitalDownloadSettings(?bool $digitalDownloadSettings) : self
    {
        $this->digitalDownloadSettings = $digitalDownloadSettings;

        return $this;
    }

    /**
     * Set GiftCertificateSales.
     *
     * @param ?bool $giftCertificateSales
     * @return $this
     */
    public function setGiftCertificateSales(?bool $giftCertificateSales) : self
    {
        $this->giftCertificateSales = $giftCertificateSales;

        return $this;
    }

    /**
     * Set SubscriptionSettings.
     *
     * @param ?bool $subscriptionSettings
     * @return $this
     */
    public function setSubscriptionSettings(?bool $subscriptionSettings) : self
    {
        $this->subscriptionSettings = $subscriptionSettings;

        return $this;
    }

    /**
     * Set PaymentRules.
     *
     * @param ?bool $paymentRules
     * @return $this
     */
    public function setPaymentRules(?bool $paymentRules) : self
    {
        $this->paymentRules = $paymentRules;

        return $this;
    }

    /**
     * Set ShippingRules.
     *
     * @param ?bool $shippingRules
     * @return $this
     */
    public function setShippingRules(?bool $shippingRules) : self
    {
        $this->shippingRules = $shippingRules;

        return $this;
    }

    /**
     * Set ProductKits.
     *
     * @param ?bool $productKits
     * @return $this
     */
    public function setProductKits(?bool $productKits) : self
    {
        $this->productKits = $productKits;

        return $this;
    }

    /**
     * Set ProductVariants.
     *
     * @param ?bool $productVariants
     * @return $this
     */
    public function setProductVariants(?bool $productVariants) : self
    {
        $this->productVariants = $productVariants;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getCopyProductRulesId()) {
            $data['CopyProductRules_ID'] = $this->getCopyProductRulesId();
        } else if ($this->getCopyProductRulesName()) {
            $data['CopyProductRules_Name'] = $this->getCopyProductRulesName();
        }

        if (!is_null($this->getName())) {
            $data['Name'] = $this->getName();
        }

        if (!is_null($this->getCoreProductData())) {
            $data['CoreProductData'] = $this->getCoreProductData();
        }

        if (!is_null($this->getAttributes())) {
            $data['Attributes'] = $this->getAttributes();
        }

        if (!is_null($this->getCategoryAssignments())) {
            $data['CategoryAssignments'] = $this->getCategoryAssignments();
        }

        if (!is_null($this->getInventorySettings())) {
            $data['InventorySettings'] = $this->getInventorySettings();
        }

        if (!is_null($this->getInventoryLevel())) {
            $data['InventoryLevel'] = $this->getInventoryLevel();
        }

        if (!is_null($this->getImages())) {
            $data['Images'] = $this->getImages();
        }

        if (!is_null($this->getRelatedProducts())) {
            $data['RelatedProducts'] = $this->getRelatedProducts();
        }

        if (!is_null($this->getUpsale())) {
            $data['Upsale'] = $this->getUpsale();
        }

        if (!is_null($this->getAvailabilityGroupAssignments())) {
            $data['AvailabilityGroupAssignments'] = $this->getAvailabilityGroupAssignments();
        }

        if (!is_null($this->getPriceGroupAssignments())) {
            $data['PriceGroupAssignments'] = $this->getPriceGroupAssignments();
        }

        if (!is_null($this->getDigitalDownloadSettings())) {
            $data['DigitalDownloadSettings'] = $this->getDigitalDownloadSettings();
        }

        if (!is_null($this->getGiftCertificateSales())) {
            $data['GiftCertificateSales'] = $this->getGiftCertificateSales();
        }

        if (!is_null($this->getSubscriptionSettings())) {
            $data['SubscriptionSettings'] = $this->getSubscriptionSettings();
        }

        if (!is_null($this->getPaymentRules())) {
            $data['PaymentRules'] = $this->getPaymentRules();
        }

        if (!is_null($this->getShippingRules())) {
            $data['ShippingRules'] = $this->getShippingRules();
        }

        if (!is_null($this->getProductKits())) {
            $data['ProductKits'] = $this->getProductKits();
        }

        if (!is_null($this->getProductVariants())) {
            $data['ProductVariants'] = $this->getProductVariants();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyProductRulesUpdate($this, $httpResponse, $data);
    }
}
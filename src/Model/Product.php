<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Model;

use MerchantAPI\Collection;

/**
 * Data model for Product.
 *
 * @package MerchantAPI\Model
 */
class Product extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('uris', new Collection());
        $this->setField('relatedproducts', new Collection());
        $this->setField('categories', new Collection());
        $this->setField('productimagedata', new Collection());
        $this->setField('attributes', new Collection());
        $this->setField('subscriptionterms', new Collection());

        if (isset($data['productinventorysettings'])) {
            if ($data['productinventorysettings'] instanceof ProductInventorySettings) {
                $this->setField('productinventorysettings', $data['productinventorysettings']);
            } else if (is_array($data['productinventorysettings'])) {
                $this->setField('productinventorysettings', new ProductInventorySettings($data['productinventorysettings']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected ProductInventorySettings or an array but got %s',
                    is_object($data['productinventorysettings']) ?
                        get_class($data['productinventorysettings']) : gettype($data['productinventorysettings'])));
            }
        }

        if (isset($data['CustomField_Values'])) {
            if ($data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->setField('CustomField_Values', $data['CustomField_Values']);
            } else if (is_array($data['CustomField_Values'])) {
                $this->setField('CustomField_Values', new CustomFieldValues($data['CustomField_Values']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected CustomFieldValues or an array but got %s',
                    is_object($data['CustomField_Values']) ?
                        get_class($data['CustomField_Values']) : gettype($data['CustomField_Values'])));
            }
        }

        if (isset($data['uris']) && is_array($data['uris'])) {
            $uris = new Collection();

            foreach($data['uris'] as $e) {
                if ($e instanceof Uri) {
                    $uris[] = $e;
                } else if (is_array($e)) {
                    $uris[] = new Uri($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of Uri or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('uris', $uris);
        }

        if (isset($data['relatedproducts']) && is_array($data['relatedproducts'])) {
            $relatedproducts = new Collection();

            foreach($data['relatedproducts'] as $e) {
                if ($e instanceof RelatedProduct) {
                    $relatedproducts[] = $e;
                } else if (is_array($e)) {
                    $relatedproducts[] = new RelatedProduct($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of RelatedProduct or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('relatedproducts', $relatedproducts);
        }

        if (isset($data['categories']) && is_array($data['categories'])) {
            $categories = new Collection();

            foreach($data['categories'] as $e) {
                if ($e instanceof Category) {
                    $categories[] = $e;
                } else if (is_array($e)) {
                    $categories[] = new Category($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of Category or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('categories', $categories);
        }

        if (isset($data['productshippingrules'])) {
            if ($data['productshippingrules'] instanceof ProductShippingRules) {
                $this->setField('productshippingrules', $data['productshippingrules']);
            } else if (is_array($data['productshippingrules'])) {
                $this->setField('productshippingrules', new ProductShippingRules($data['productshippingrules']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected ProductShippingRules or an array but got %s',
                    is_object($data['productshippingrules']) ?
                        get_class($data['productshippingrules']) : gettype($data['productshippingrules'])));
            }
        }

        if (isset($data['productimagedata']) && is_array($data['productimagedata'])) {
            $productimagedata = new Collection();

            foreach($data['productimagedata'] as $e) {
                if ($e instanceof ProductImageData) {
                    $productimagedata[] = $e;
                } else if (is_array($e)) {
                    $productimagedata[] = new ProductImageData($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductImageData or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('productimagedata', $productimagedata);
        }

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof ProductAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new ProductAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductAttribute or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('attributes', $attributes);
        }

        if (isset($data['subscriptionsettings'])) {
            if ($data['subscriptionsettings'] instanceof ProductSubscriptionSettings) {
                $this->setField('subscriptionsettings', $data['subscriptionsettings']);
            } else if (is_array($data['subscriptionsettings'])) {
                $this->setField('subscriptionsettings', new ProductSubscriptionSettings($data['subscriptionsettings']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected ProductSubscriptionSettings or an array but got %s',
                    is_object($data['subscriptionsettings']) ?
                        get_class($data['subscriptionsettings']) : gettype($data['subscriptionsettings'])));
            }
        }

        if (isset($data['subscriptionterms']) && is_array($data['subscriptionterms'])) {
            $subscriptionterms = new Collection();

            foreach($data['subscriptionterms'] as $e) {
                if ($e instanceof ProductSubscriptionTerm) {
                    $subscriptionterms[] = $e;
                } else if (is_array($e)) {
                    $subscriptionterms[] = new ProductSubscriptionTerm($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductSubscriptionTerm or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('subscriptionterms', $subscriptionterms);
        }

        $imageTypes = [];
        foreach($data as $k => $v) {
            if (stripos($k, 'imagetype:') !== false) {
                $imageTypes[substr($k, stripos($k, ':') + 1)] = $v;
            }
        }
        $this->setField('image_types', $imageTypes);
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['productinventorysettings'])) {
            if ($this->data['productinventorysettings'] instanceof ProductInventorySettings) {
                $this->data['productinventorysettings'] = clone $this->data['productinventorysettings'];
            }
        }

        if (isset($data['CustomField_Values'])) {
            if ($this->data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->data['CustomField_Values'] = clone $this->data['CustomField_Values'];
            }
        }

        if (isset($this->data['uris']) && is_array($this->data['uris'])) {
            if ($this->data['uris'] instanceof Collection) {
                $this->data['uris'] = clone $this->data['uris'];
            } else {
                foreach($this->data['uris'] as $i => $e) {
                    if ($e instanceof Uri) {
                        $this->data['uris'][$i] = clone $this->data['uris'][$i];
                    }
                }
            }
        }

        if (isset($this->data['relatedproducts']) && is_array($this->data['relatedproducts'])) {
            if ($this->data['relatedproducts'] instanceof Collection) {
                $this->data['relatedproducts'] = clone $this->data['relatedproducts'];
            } else {
                foreach($this->data['relatedproducts'] as $i => $e) {
                    if ($e instanceof RelatedProduct) {
                        $this->data['relatedproducts'][$i] = clone $this->data['relatedproducts'][$i];
                    }
                }
            }
        }

        if (isset($this->data['categories']) && is_array($this->data['categories'])) {
            if ($this->data['categories'] instanceof Collection) {
                $this->data['categories'] = clone $this->data['categories'];
            } else {
                foreach($this->data['categories'] as $i => $e) {
                    if ($e instanceof Category) {
                        $this->data['categories'][$i] = clone $this->data['categories'][$i];
                    }
                }
            }
        }

        if (isset($data['productshippingrules'])) {
            if ($this->data['productshippingrules'] instanceof ProductShippingRules) {
                $this->data['productshippingrules'] = clone $this->data['productshippingrules'];
            }
        }

        if (isset($this->data['productimagedata']) && is_array($this->data['productimagedata'])) {
            if ($this->data['productimagedata'] instanceof Collection) {
                $this->data['productimagedata'] = clone $this->data['productimagedata'];
            } else {
                foreach($this->data['productimagedata'] as $i => $e) {
                    if ($e instanceof ProductImageData) {
                        $this->data['productimagedata'][$i] = clone $this->data['productimagedata'][$i];
                    }
                }
            }
        }

        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof ProductAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
                    }
                }
            }
        }

        if (isset($data['subscriptionsettings'])) {
            if ($this->data['subscriptionsettings'] instanceof ProductSubscriptionSettings) {
                $this->data['subscriptionsettings'] = clone $this->data['subscriptionsettings'];
            }
        }

        if (isset($this->data['subscriptionterms']) && is_array($this->data['subscriptionterms'])) {
            if ($this->data['subscriptionterms'] instanceof Collection) {
                $this->data['subscriptionterms'] = clone $this->data['subscriptionterms'];
            } else {
                foreach($this->data['subscriptionterms'] as $i => $e) {
                    if ($e instanceof ProductSubscriptionTerm) {
                        $this->data['subscriptionterms'][$i] = clone $this->data['subscriptionterms'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get sku.
     *
     * @return ?string
     */
    public function getSku() : ?string
    {
        return $this->getField('sku');
    }

    /**
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get thumbnail.
     *
     * @return ?string
     */
    public function getThumbnail() : ?string
    {
        return $this->getField('thumbnail');
    }

    /**
     * Get image.
     *
     * @return ?string
     */
    public function getImage() : ?string
    {
        return $this->getField('image');
    }

    /**
     * Get price.
     *
     * @return ?float
     */
    public function getPrice() : ?float
    {
        return $this->getField('price');
    }

    /**
     * Get formatted_price.
     *
     * @return ?string
     */
    public function getFormattedPrice() : ?string
    {
        return $this->getField('formatted_price');
    }

    /**
     * Get cost.
     *
     * @return ?float
     */
    public function getCost() : ?float
    {
        return $this->getField('cost');
    }

    /**
     * Get formatted_cost.
     *
     * @return ?string
     */
    public function getFormattedCost() : ?string
    {
        return $this->getField('formatted_cost');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get catcount.
     *
     * @return ?int
     */
    public function getCategoryCount() : ?int
    {
        return $this->getField('catcount');
    }

    /**
     * Get weight.
     *
     * @return ?float
     */
    public function getWeight() : ?float
    {
        return $this->getField('weight');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }

    /**
     * Get page_title.
     *
     * @return ?string
     */
    public function getPageTitle() : ?string
    {
        return $this->getField('page_title');
    }

    /**
     * Get taxable.
     *
     * @return ?bool
     */
    public function getTaxable() : ?bool
    {
        return $this->getField('taxable');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getDateTimeCreated() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get dt_updated.
     *
     * @return ?int
     */
    public function getDateTimeUpdate() : ?int
    {
        return $this->getTimestampField('dt_updated');
    }

    /**
     * Get productinventorysettings.
     *
     * @return ?\MerchantAPI\Model\ProductInventorySettings
     */
    public function getProductInventorySettings() : ?ProductInventorySettings
    {
        return $this->getField('productinventorysettings');
    }

    /**
     * Get product_inventory_active.
     *
     * @return ?bool
     */
    public function getProductInventoryActive() : ?bool
    {
        return $this->getField('product_inventory_active');
    }

    /**
     * Get product_inventory.
     *
     * @return ?int
     */
    public function getProductInventory() : ?int
    {
        return $this->getField('product_inventory');
    }

    /**
     * Get cancat_code.
     *
     * @return ?string
     */
    public function getCanonicalCategoryCode() : ?string
    {
        return $this->getField('cancat_code');
    }

    /**
     * Get page_code.
     *
     * @return ?string
     */
    public function getPageCode() : ?string
    {
        return $this->getField('page_code');
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?\MerchantAPI\Model\CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->getField('CustomField_Values');
    }

    /**
     * Get uris.
     *
     * @return \MerchantAPI\Collection
     */
    public function getUris() : ?Collection
    {
        return $this->getField('uris');
    }

    /**
     * Get relatedproducts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getRelatedProducts() : ?Collection
    {
        return $this->getField('relatedproducts');
    }

    /**
     * Get categories.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCategories() : ?Collection
    {
        return $this->getField('categories');
    }

    /**
     * Get productshippingrules.
     *
     * @return ?\MerchantAPI\Model\ProductShippingRules
     */
    public function getProductShippingRules() : ?ProductShippingRules
    {
        return $this->getField('productshippingrules');
    }

    /**
     * Get productimagedata.
     *
     * @return \MerchantAPI\Collection
     */
    public function getProductImageData() : ?Collection
    {
        return $this->getField('productimagedata');
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAttributes() : ?Collection
    {
        return $this->getField('attributes');
    }

    /**
     * Get url.
     *
     * @return ?string
     */
    public function getUrl() : ?string
    {
        return $this->getField('url');
    }

    /**
     * Get imagetypes.
     *
     * @return array
     */
    public function getImageTypes() : ?array
    {
        return $this->getField('image_types');
    }

    /**
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        return $this->getField('disp_order');
    }

    /**
     * Get subscriptionsettings.
     *
     * @return ?\MerchantAPI\Model\ProductSubscriptionSettings
     */
    public function getSubscriptionSettings() : ?ProductSubscriptionSettings
    {
        return $this->getField('subscriptionsettings');
    }

    /**
     * Get subscriptionterms.
     *
     * @return \MerchantAPI\Collection
     */
    public function getSubscriptionTerms() : ?Collection
    {
        return $this->getField('subscriptionterms');
    }
}
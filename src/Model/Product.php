<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
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
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get sku.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->getField('sku');
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get thumbnail.
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->getField('thumbnail');
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getField('image');
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return (float) $this->getField('price', 0.00);
    }

    /**
     * Get formatted_price.
     *
     * @return string
     */
    public function getFormattedPrice()
    {
        return $this->getField('formatted_price');
    }

    /**
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
    }

    /**
     * Get formatted_cost.
     *
     * @return string
     */
    public function getFormattedCost()
    {
        return $this->getField('formatted_cost');
    }

    /**
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get catcount.
     *
     * @return int
     */
    public function getCategoryCount()
    {
        return (int) $this->getField('catcount', 0);
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return (float) $this->getField('weight', 0.00);
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('active', false);
    }

    /**
     * Get page_title.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getField('page_title');
    }

    /**
     * Get taxable.
     *
     * @return bool
     */
    public function getTaxable()
    {
        return (bool) $this->getField('taxable', false);
    }

    /**
     * Get dt_created.
     *
     * @return int
     */
    public function getDateTimeCreated()
    {
        return (int) $this->getField('dt_created', 0);
    }

    /**
     * Get dt_updated.
     *
     * @return int
     */
    public function getDateTimeUpdate()
    {
        return (int) $this->getField('dt_updated', 0);
    }

    /**
     * Get productinventorysettings.
     *
     * @return \MerchantAPI\Model\ProductInventorySettings|null
     */
    public function getProductInventorySettings()
    {
        return $this->getField('productinventorysettings', null);
    }

    /**
     * Get product_inventory_active.
     *
     * @return bool
     */
    public function getProductInventoryActive()
    {
        return (bool) $this->getField('product_inventory_active', false);
    }

    /**
     * Get product_inventory.
     *
     * @return int
     */
    public function getProductInventory()
    {
        return (int) $this->getField('product_inventory', 0);
    }

    /**
     * Get cancat_code.
     *
     * @return string
     */
    public function getCanonicalCategoryCode()
    {
        return $this->getField('cancat_code');
    }

    /**
     * Get page_code.
     *
     * @return string
     */
    public function getPageCode()
    {
        return $this->getField('page_code');
    }

    /**
     * Get CustomField_Values.
     *
     * @return \MerchantAPI\Model\CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->getField('CustomField_Values', null);
    }

    /**
     * Get uris.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Uri[]
     */
    public function getUris()
    {
        return $this->getField('uris', []);
    }

    /**
     * Get relatedproducts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\RelatedProduct[]
     */
    public function getRelatedProducts()
    {
        return $this->getField('relatedproducts', []);
    }

    /**
     * Get categories.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Category[]
     */
    public function getCategories()
    {
        return $this->getField('categories', []);
    }

    /**
     * Get productshippingrules.
     *
     * @return \MerchantAPI\Model\ProductShippingRules|null
     */
    public function getProductShuppingRules()
    {
        return $this->getField('productshippingrules', null);
    }

    /**
     * Get productimagedata.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductImageData[]
     */
    public function getProductImageData()
    {
        return $this->getField('productimagedata', []);
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('attributes', []);
    }

    /**
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set sku.
     *
     * @param string
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setField('sku', $sku);
    }

    /**
     * Set name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        return $this->setField('name', $name);
    }

    /**
     * Set thumbnail.
     *
     * @param string
     * @return $this
     */
    public function setThumbnail($thumbnail)
    {
        return $this->setField('thumbnail', $thumbnail);
    }

    /**
     * Set image.
     *
     * @param string
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setField('image', $image);
    }

    /**
     * Set price.
     *
     * @param float
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setField('price', $price);
    }

    /**
     * Set cost.
     *
     * @param float
     * @return $this
     */
    public function setCost($cost)
    {
        return $this->setField('cost', $cost);
    }

    /**
     * Set descrip.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setField('descrip', $description);
    }

    /**
     * Set weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        return $this->setField('weight', $weight);
    }

    /**
     * Set active.
     *
     * @param bool
     * @return $this
     */
    public function setActive($active)
    {
        return $this->setField('active', $active);
    }

    /**
     * Set page_title.
     *
     * @param string
     * @return $this
     */
    public function setPageTitle($pageTitle)
    {
        return $this->setField('page_title', $pageTitle);
    }

    /**
     * Set taxable.
     *
     * @param bool
     * @return $this
     */
    public function setTaxable($taxable)
    {
        return $this->setField('taxable', $taxable);
    }

    /**
     * Set product_inventory.
     *
     * @param int
     * @return $this
     */
    public function setProductInventory($productInventory)
    {
        return $this->setField('product_inventory', $productInventory);
    }

    /**
     * Set cancat_code.
     *
     * @param string
     * @return $this
     */
    public function setCanonicalCategoryCode($canonicalCategoryCode)
    {
        return $this->setField('cancat_code', $canonicalCategoryCode);
    }

    /**
     * Set page_code.
     *
     * @param string
     * @return $this
     */
    public function setPageCode($pageCode)
    {
        return $this->setField('page_code', $pageCode);
    }

    /**
     * Set CustomField_Values.
     *
     * @param array|CustomFieldValues
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues)
    {
        if (is_array($customFieldValues)) {
            return $this->setField('CustomField_Values', new CustomFieldValues($customFieldValues));
        } else if ($customFieldValues instanceof CustomFieldValues || is_null($customFieldValues)) {
            return $this->setField('CustomField_Values', $customFieldValues);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of CustomFieldValues, or null but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }
    }
}
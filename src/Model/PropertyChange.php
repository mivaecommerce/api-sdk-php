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

/**
 * Data model for PropertyChange.
 *
 * @package MerchantAPI\Model
 */
class PropertyChange extends \MerchantAPI\Model
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

        if (isset($data['Settings'])) {
            if ($data['Settings'] instanceof VersionSettings) {
                $this->setField('Settings', $data['Settings']);
            } else {
                $this->setField('Settings', new VersionSettings($data['Settings']));
            }
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['Settings'])) {
            if ($this->data['Settings'] instanceof VersionSettings) {
                $this->data['Settings'] = clone $this->data['Settings'];
            }
        }
    }

    /**
     * Get Property_ID.
     *
     * @return ?int
     */
    public function getPropertyId() : ?int
    {
        return $this->getField('Property_ID');
    }

    /**
     * Get Property_Type.
     *
     * @return ?string
     */
    public function getPropertyType() : ?string
    {
        return $this->getField('Property_Type');
    }

    /**
     * Get Property_Code.
     *
     * @return ?string
     */
    public function getPropertyCode() : ?string
    {
        return $this->getField('Property_Code');
    }

    /**
     * Get Product_ID.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('Product_ID');
    }

    /**
     * Get Product_Code.
     *
     * @return ?string
     */
    public function getProductCode() : ?string
    {
        return $this->getField('Product_Code');
    }

    /**
     * Get Edit_Product.
     *
     * @return ?string
     */
    public function getEditProduct() : ?string
    {
        return $this->getField('Edit_Product');
    }

    /**
     * Get Category_ID.
     *
     * @return ?int
     */
    public function getCategoryId() : ?int
    {
        return $this->getField('Category_ID');
    }

    /**
     * Get Category_Code.
     *
     * @return ?string
     */
    public function getCategoryCode() : ?string
    {
        return $this->getField('Category_Code');
    }

    /**
     * Get Edit_Category.
     *
     * @return ?string
     */
    public function getEditCategory() : ?string
    {
        return $this->getField('Edit_Category');
    }

    /**
     * Get Source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('Source');
    }

    /**
     * Get Settings.
     *
     * @return ?\MerchantAPI\Model\VersionSettings
     */
    public function getSettings() : ?VersionSettings
    {
        return $this->getField('Settings');
    }

    /**
     * Get Image.
     *
     * @return ?string
     */
    public function getImage() : ?string
    {
        return $this->getField('Image');
    }

    /**
     * Get Image_ID.
     *
     * @return ?int
     */
    public function getImageId() : ?int
    {
        return $this->getField('Image_ID');
    }

    /**
     * Get Notes.
     *
     * @return ?string
     */
    public function getNotes() : ?string
    {
        return $this->getField('Notes');
    }

    /**
     * Set Property_ID.
     *
     * @param ?int $propertyId
     * @return $this
     */
    public function setPropertyId(?int $propertyId) : self
    {
        return $this->setField('Property_ID', $propertyId);
    }

    /**
     * Set Property_Type.
     *
     * @param ?string $propertyType
     * @return $this
     */
    public function setPropertyType(?string $propertyType) : self
    {
        return $this->setField('Property_Type', $propertyType);
    }

    /**
     * Set Property_Code.
     *
     * @param ?string $propertyCode
     * @return $this
     */
    public function setPropertyCode(?string $propertyCode) : self
    {
        return $this->setField('Property_Code', $propertyCode);
    }

    /**
     * Set Product_ID.
     *
     * @param ?int $productId
     * @return $this
     */
    public function setProductId(?int $productId) : self
    {
        return $this->setField('Product_ID', $productId);
    }

    /**
     * Set Product_Code.
     *
     * @param ?string $productCode
     * @return $this
     */
    public function setProductCode(?string $productCode) : self
    {
        return $this->setField('Product_Code', $productCode);
    }

    /**
     * Set Edit_Product.
     *
     * @param ?string $editProduct
     * @return $this
     */
    public function setEditProduct(?string $editProduct) : self
    {
        return $this->setField('Edit_Product', $editProduct);
    }

    /**
     * Set Category_ID.
     *
     * @param ?int $categoryId
     * @return $this
     */
    public function setCategoryId(?int $categoryId) : self
    {
        return $this->setField('Category_ID', $categoryId);
    }

    /**
     * Set Category_Code.
     *
     * @param ?string $categoryCode
     * @return $this
     */
    public function setCategoryCode(?string $categoryCode) : self
    {
        return $this->setField('Category_Code', $categoryCode);
    }

    /**
     * Set Edit_Category.
     *
     * @param ?string $editCategory
     * @return $this
     */
    public function setEditCategory(?string $editCategory) : self
    {
        return $this->setField('Edit_Category', $editCategory);
    }

    /**
     * Set Source.
     *
     * @param ?string $source
     * @return $this
     */
    public function setSource(?string $source) : self
    {
        return $this->setField('Source', $source);
    }
    /**
     * Set Settings.
     *
     * @param \MerchantAPI\Model\VersionSettings $settings
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSettings($settings) : self
    {
        if (is_array($settings)) {
            return $this->setField('Settings', new VersionSettings($settings));
        } else if ($settings instanceof VersionSettings || is_null($settings)) {
            return $this->setField('Settings', $settings);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of VersionSettings, or null but got %s',
                is_object($settings) ? get_class($settings) : gettype($settings)));
        }
    }

    /**
     * Set Image.
     *
     * @param ?string $image
     * @return $this
     */
    public function setImage(?string $image) : self
    {
        return $this->setField('Image', $image);
    }

    /**
     * Set Image_ID.
     *
     * @param ?int $imageId
     * @return $this
     */
    public function setImageId(?int $imageId) : self
    {
        return $this->setField('Image_ID', $imageId);
    }

    /**
     * Set Notes.
     *
     * @param ?string $notes
     * @return $this
     */
    public function setNotes(?string $notes) : self
    {
        return $this->setField('Notes', $notes);
    }
}
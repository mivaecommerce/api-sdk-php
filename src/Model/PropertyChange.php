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
            if ($data['Settings'] instanceof TemplateVersionSettings) {
                $this->setField('Settings', $data['Settings']);
            } else {
                $this->setField('Settings', new TemplateVersionSettings($data['Settings']));
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
            if ($this->data['Settings'] instanceof TemplateVersionSettings) {
                $this->data['Settings'] = clone $this->data['Settings'];
            }
        }
    }

    /**
     * Get Property_ID.
     *
     * @return int
     */
    public function getPropertyId()
    {
        return (int) $this->getField('Property_ID', 0);
    }

    /**
     * Get Property_Type.
     *
     * @return string
     */
    public function getPropertyType()
    {
        return $this->getField('Property_Type');
    }

    /**
     * Get Property_Code.
     *
     * @return string
     */
    public function getPropertyCode()
    {
        return $this->getField('Property_Code');
    }

    /**
     * Get Product_ID.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('Product_ID', 0);
    }

    /**
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->getField('Product_Code');
    }

    /**
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct()
    {
        return $this->getField('Edit_Product');
    }

    /**
     * Get Category_ID.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return (int) $this->getField('Category_ID', 0);
    }

    /**
     * Get Category_Code.
     *
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->getField('Category_Code');
    }

    /**
     * Get Edit_Category.
     *
     * @return string
     */
    public function getEditCategory()
    {
        return $this->getField('Edit_Category');
    }

    /**
     * Get Source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getField('Source');
    }

    /**
     * Get Settings.
     *
     * @return \MerchantAPI\Model\TemplateVersionSettings|null
     */
    public function getSettings()
    {
        return $this->getField('Settings', null);
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->getField('Notes');
    }

    /**
     * Set Property_ID.
     *
     * @param int
     * @return $this
     */
    public function setPropertyId($propertyId)
    {
        return $this->setField('Property_ID', $propertyId);
    }

    /**
     * Set Property_Type.
     *
     * @param string
     * @return $this
     */
    public function setPropertyType($propertyType)
    {
        return $this->setField('Property_Type', $propertyType);
    }

    /**
     * Set Property_Code.
     *
     * @param string
     * @return $this
     */
    public function setPropertyCode($propertyCode)
    {
        return $this->setField('Property_Code', $propertyCode);
    }

    /**
     * Set Product_ID.
     *
     * @param int
     * @return $this
     */
    public function setProductId($productId)
    {
        return $this->setField('Product_ID', $productId);
    }

    /**
     * Set Product_Code.
     *
     * @param string
     * @return $this
     */
    public function setProductCode($productCode)
    {
        return $this->setField('Product_Code', $productCode);
    }

    /**
     * Set Edit_Product.
     *
     * @param string
     * @return $this
     */
    public function setEditProduct($editProduct)
    {
        return $this->setField('Edit_Product', $editProduct);
    }

    /**
     * Set Category_ID.
     *
     * @param int
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        return $this->setField('Category_ID', $categoryId);
    }

    /**
     * Set Category_Code.
     *
     * @param string
     * @return $this
     */
    public function setCategoryCode($categoryCode)
    {
        return $this->setField('Category_Code', $categoryCode);
    }

    /**
     * Set Edit_Category.
     *
     * @param string
     * @return $this
     */
    public function setEditCategory($editCategory)
    {
        return $this->setField('Edit_Category', $editCategory);
    }

    /**
     * Set Source.
     *
     * @param string
     * @return $this
     */
    public function setSource($source)
    {
        return $this->setField('Source', $source);
    }

    /**
     * Set Settings.
     *
     * @param array|TemplateVersionSettings
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSettings($settings)
    {
        if (is_array($settings)) {
            return $this->setField('Settings', new TemplateVersionSettings($settings));
        } else if ($settings instanceof TemplateVersionSettings || is_null($settings)) {
            return $this->setField('Settings', $settings);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of TemplateVersionSettings, or null but got %s',
                is_object($settings) ? get_class($settings) : gettype($settings)));
        }
    }

    /**
     * Set Notes.
     *
     * @param string
     * @return $this
     */
    public function setNotes($notes)
    {
        return $this->setField('Notes', $notes);
    }
}
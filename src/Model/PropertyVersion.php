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
 * Data model for PropertyVersion.
 *
 * @package MerchantAPI\Model
 */
class PropertyVersion extends \MerchantAPI\Model
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

        if (isset($data['settings'])) {
            if ($data['settings'] instanceof VersionSettings) {
                $this->setField('settings', $data['settings']);
            } else {
                $this->setField('settings', new VersionSettings($data['settings']));
            }
        }

        if (isset($data['product'])) {
            if ($data['product'] instanceof Product) {
                $this->setField('product', $data['product']);
            } else if (is_array($data['product'])) {
                $this->setField('product', new Product($data['product']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Product or an array but got %s',
                    is_object($data['product']) ?
                        get_class($data['product']) : gettype($data['product'])));
            }
        }

        if (isset($data['category'])) {
            if ($data['category'] instanceof Category) {
                $this->setField('category', $data['category']);
            } else if (is_array($data['category'])) {
                $this->setField('category', new Category($data['category']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Category or an array but got %s',
                    is_object($data['category']) ?
                        get_class($data['category']) : gettype($data['category'])));
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
        if (isset($data['settings'])) {
            if ($this->data['settings'] instanceof VersionSettings) {
                $this->data['settings'] = clone $this->data['settings'];
            }
        }

        if (isset($data['product'])) {
            if ($this->data['product'] instanceof Product) {
                $this->data['product'] = clone $this->data['product'];
            }
        }

        if (isset($data['category'])) {
            if ($this->data['category'] instanceof Category) {
                $this->data['category'] = clone $this->data['category'];
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
     * Get prop_id.
     *
     * @return int
     */
    public function getPropertyId()
    {
        return (int) $this->getField('prop_id', 0);
    }

    /**
     * Get version_id.
     *
     * @return int
     */
    public function getVersionId()
    {
        return (int) $this->getField('version_id', 0);
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
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
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get cat_id.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return (int) $this->getField('cat_id', 0);
    }

    /**
     * Get version_user_id.
     *
     * @return int
     */
    public function getVersionUserId()
    {
        return (int) $this->getField('version_user_id', 0);
    }

    /**
     * Get version_user_name.
     *
     * @return string
     */
    public function getVersionUserName()
    {
        return $this->getField('version_user_name');
    }

    /**
     * Get version_user_icon.
     *
     * @return string
     */
    public function getVersionUserIcon()
    {
        return $this->getField('version_user_icon');
    }

    /**
     * Get source_user_id.
     *
     * @return int
     */
    public function getSourceUserId()
    {
        return (int) $this->getField('source_user_id', 0);
    }

    /**
     * Get source_user_name.
     *
     * @return string
     */
    public function getSourceUserName()
    {
        return $this->getField('source_user_name');
    }

    /**
     * Get source_user_icon.
     *
     * @return string
     */
    public function getSourceUserIcon()
    {
        return $this->getField('source_user_icon');
    }

    /**
     * Get templ_id.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return (int) $this->getField('templ_id', 0);
    }

    /**
     * Get settings.
     *
     * @return \MerchantAPI\Model\VersionSettings|null
     */
    public function getSettings()
    {
        return $this->getField('settings', null);
    }

    /**
     * Get product.
     *
     * @return \MerchantAPI\Model\Product|null
     */
    public function getProduct()
    {
        return $this->getField('product', null);
    }

    /**
     * Get category.
     *
     * @return \MerchantAPI\Model\Category|null
     */
    public function getCategory()
    {
        return $this->getField('category', null);
    }

    /**
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getField('source');
    }

    /**
     * Get sync.
     *
     * @return bool
     */
    public function getSync()
    {
        return (bool) $this->getField('sync', false);
    }

    /**
     * Get source_notes.
     *
     * @return string
     */
    public function getSourceNotes()
    {
        return $this->getField('source_notes');
    }

    /**
     * Get image_id.
     *
     * @return int
     */
    public function getImageId()
    {
        return (int) $this->getField('image_id', 0);
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
     * Get image_refcount.
     *
     * @return int
     */
    public function getImageRefcount()
    {
        return (int) $this->getField('image_refcount', 0);
    }

    /**
     * Get image_head_count.
     *
     * @return int
     */
    public function getImageHeadCount()
    {
        return (int) $this->getField('image_head_count', 0);
    }
}
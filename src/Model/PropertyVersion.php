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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get prop_id.
     *
     * @return ?int
     */
    public function getPropertyId() : ?int
    {
        return $this->getField('prop_id');
    }

    /**
     * Get version_id.
     *
     * @return ?int
     */
    public function getVersionId() : ?int
    {
        return $this->getField('version_id');
    }

    /**
     * Get type.
     *
     * @return ?string
     */
    public function getType() : ?string
    {
        return $this->getField('type');
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
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get cat_id.
     *
     * @return ?int
     */
    public function getCategoryId() : ?int
    {
        return $this->getField('cat_id');
    }

    /**
     * Get version_user_id.
     *
     * @return ?int
     */
    public function getVersionUserId() : ?int
    {
        return $this->getField('version_user_id');
    }

    /**
     * Get version_user_name.
     *
     * @return ?string
     */
    public function getVersionUserName() : ?string
    {
        return $this->getField('version_user_name');
    }

    /**
     * Get version_user_icon.
     *
     * @return ?string
     */
    public function getVersionUserIcon() : ?string
    {
        return $this->getField('version_user_icon');
    }

    /**
     * Get source_user_id.
     *
     * @return ?int
     */
    public function getSourceUserId() : ?int
    {
        return $this->getField('source_user_id');
    }

    /**
     * Get source_user_name.
     *
     * @return ?string
     */
    public function getSourceUserName() : ?string
    {
        return $this->getField('source_user_name');
    }

    /**
     * Get source_user_icon.
     *
     * @return ?string
     */
    public function getSourceUserIcon() : ?string
    {
        return $this->getField('source_user_icon');
    }

    /**
     * Get templ_id.
     *
     * @return ?int
     */
    public function getTemplateId() : ?int
    {
        return $this->getField('templ_id');
    }

    /**
     * Get settings.
     *
     * @return ?\MerchantAPI\Model\VersionSettings
     */
    public function getSettings() : ?VersionSettings
    {
        return $this->getField('settings');
    }

    /**
     * Get product.
     *
     * @return ?\MerchantAPI\Model\Product
     */
    public function getProduct() : ?Product
    {
        return $this->getField('product');
    }

    /**
     * Get category.
     *
     * @return ?\MerchantAPI\Model\Category
     */
    public function getCategory() : ?Category
    {
        return $this->getField('category');
    }

    /**
     * Get source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('source');
    }

    /**
     * Get sync.
     *
     * @return ?bool
     */
    public function getSync() : ?bool
    {
        return $this->getField('sync');
    }

    /**
     * Get source_notes.
     *
     * @return ?string
     */
    public function getSourceNotes() : ?string
    {
        return $this->getField('source_notes');
    }

    /**
     * Get image_id.
     *
     * @return ?int
     */
    public function getImageId() : ?int
    {
        return $this->getField('image_id');
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
     * Get image_refcount.
     *
     * @return ?int
     */
    public function getImageRefcount() : ?int
    {
        return $this->getField('image_refcount');
    }

    /**
     * Get image_head_count.
     *
     * @return ?int
     */
    public function getImageHeadCount() : ?int
    {
        return $this->getField('image_head_count');
    }
}
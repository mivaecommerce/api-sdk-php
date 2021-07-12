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
 * Data model for ProductAttribute.
 *
 * @package MerchantAPI\Model
 */
class ProductAttribute extends \MerchantAPI\Model
{
    /** @var string PRODUCT_ATTRIBUTE_TYPE_CHECKBOX */
    const PRODUCT_ATTRIBUTE_TYPE_CHECKBOX = 'checkbox';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_RADIO */
    const PRODUCT_ATTRIBUTE_TYPE_RADIO = 'radio';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_TEXT */
    const PRODUCT_ATTRIBUTE_TYPE_TEXT = 'text';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_SELECT */
    const PRODUCT_ATTRIBUTE_TYPE_SELECT = 'select';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_MEMO */
    const PRODUCT_ATTRIBUTE_TYPE_MEMO = 'memo';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_TEMPLATE */
    const PRODUCT_ATTRIBUTE_TYPE_TEMPLATE = 'template';

    /** @var string PRODUCT_ATTRIBUTE_TYPE_SWATCH_SELECT */
    const PRODUCT_ATTRIBUTE_TYPE_SWATCH_SELECT = 'swatch-select';

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('attributes', new Collection());
        $this->setField('options', new Collection());

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

        if (isset($data['options']) && is_array($data['options'])) {
            $options = new Collection();

            foreach($data['options'] as $e) {
                if ($e instanceof ProductOption) {
                    $options[] = $e;
                } else if (is_array($e)) {
                    $options[] = new ProductOption($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductOption or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('options', $options);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
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

        if (isset($this->data['options']) && is_array($this->data['options'])) {
            if ($this->data['options'] instanceof Collection) {
                $this->data['options'] = clone $this->data['options'];
            } else {
                foreach($this->data['options'] as $i => $e) {
                    if ($e instanceof ProductOption) {
                        $this->data['options'][$i] = clone $this->data['options'][$i];
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
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get default_id.
     *
     * @return int
     */
    public function getDefaultId()
    {
        return (int) $this->getField('default_id', 0);
    }

    /**
     * Get disp_order.
     *
     * @return int
     */
    public function getDisplayOrder()
    {
        if ($this->hasField('disp_order')) {
            return (int) $this->getField('disp_order', 0);
        } else if ($this->hasField('disporder')) {
            return (int) $this->getField('disporder', 0);
        }

        return 0;
    }

    /**
     * Get attemp_id.
     *
     * @return int
     */
    public function getAttributeTemplateId()
    {
        return (int) $this->getField('attemp_id', 0);
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
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
    }

    /**
     * Get prompt.
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->getField('prompt');
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
     * Get cost.
     *
     * @return float
     */
    public function getCost()
    {
        return (float) $this->getField('cost', 0.00);
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
     * Get required.
     *
     * @return bool
     */
    public function getRequired()
    {
        return (bool) $this->getField('required', false);
    }

    /**
     * Get inventory.
     *
     * @return bool
     */
    public function getInventory()
    {
        return (bool) $this->getField('inventory', false);
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
     * Get attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductAttribute[]
     */
    public function getTemplateAttributes()
    {
        return $this->getField('attributes', []);
    }

    /**
     * Get options.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductOption[]
     */
    public function getOptions()
    {
        return $this->getField('options', []);
    }
}
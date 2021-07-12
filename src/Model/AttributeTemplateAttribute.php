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
 * Data model for AttributeTemplateAttribute.
 *
 * @package MerchantAPI\Model
 */
class AttributeTemplateAttribute extends \MerchantAPI\Model
{
    /** @var string TEMPLATE_ATTRIBUTE_TYPE_CHECKBOX */
    const TEMPLATE_ATTRIBUTE_TYPE_CHECKBOX = 'checkbox';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_RADIO */
    const TEMPLATE_ATTRIBUTE_TYPE_RADIO = 'radio';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_TEXT */
    const TEMPLATE_ATTRIBUTE_TYPE_TEXT = 'text';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_SELECT */
    const TEMPLATE_ATTRIBUTE_TYPE_SELECT = 'select';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_MEMO */
    const TEMPLATE_ATTRIBUTE_TYPE_MEMO = 'memo';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_TEMPLATE */
    const TEMPLATE_ATTRIBUTE_TYPE_TEMPLATE = 'template';

    /** @var string TEMPLATE_ATTRIBUTE_TYPE_SWATCH_SELECT */
    const TEMPLATE_ATTRIBUTE_TYPE_SWATCH_SELECT = 'swatch-select';

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('options', new Collection());

        if (isset($data['options']) && is_array($data['options'])) {
            $options = new Collection();

            foreach($data['options'] as $e) {
                if ($e instanceof AttributeTemplateOption) {
                    $options[] = $e;
                } else if (is_array($e)) {
                    $options[] = new AttributeTemplateOption($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of AttributeTemplateOption or an array of arrays but got %s',
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
        if (isset($this->data['options']) && is_array($this->data['options'])) {
            if ($this->data['options'] instanceof Collection) {
                $this->data['options'] = clone $this->data['options'];
            } else {
                foreach($this->data['options'] as $i => $e) {
                    if ($e instanceof AttributeTemplateOption) {
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
     * Get attemp_id.
     *
     * @return int
     */
    public function getAttributeTemplateId()
    {
        return (int) $this->getField('attemp_id', 0);
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
     * Get options.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AttributeTemplateOption[]
     */
    public function getOptions()
    {
        return $this->getField('options', []);
    }
}
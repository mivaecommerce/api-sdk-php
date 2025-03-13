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
use MerchantAPI\DecimalHelper;

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

        if (isset($data['price'])) {
            $this->setField('price', DecimalHelper::create($data['price'], 16));
        }

        if (isset($data['cost'])) {
            $this->setField('cost', DecimalHelper::create($data['cost'], 16));
        }

        if (isset($data['weight'])) {
            $this->setField('weight', DecimalHelper::create($data['weight'], 16));
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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get attemp_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateId() : ?int
    {
        return $this->getField('attemp_id');
    }

    /**
     * Get default_id.
     *
     * @return ?int
     */
    public function getDefaultId() : ?int
    {
        return $this->getField('default_id');
    }

    /**
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
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
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
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
     * Get prompt.
     *
     * @return ?string
     */
    public function getPrompt() : ?string
    {
        return $this->getField('prompt');
    }

    /**
     * Get price.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getPrice() 
    {
        return $this->getField('price');
    }

    /**
     * Get cost.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getCost() 
    {
        return $this->getField('cost');
    }

    /**
     * Get weight.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getWeight() 
    {
        return $this->getField('weight');
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
     * Get formatted_cost.
     *
     * @return ?string
     */
    public function getFormattedCost() : ?string
    {
        return $this->getField('formatted_cost');
    }

    /**
     * Get formatted_weight.
     *
     * @return ?string
     */
    public function getFormattedWeight() : ?string
    {
        return $this->getField('formatted_weight');
    }

    /**
     * Get required.
     *
     * @return ?bool
     */
    public function getRequired() : ?bool
    {
        return $this->getField('required');
    }

    /**
     * Get inventory.
     *
     * @return ?bool
     */
    public function getInventory() : ?bool
    {
        return $this->getField('inventory');
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
     * Get options.
     *
     * @return \MerchantAPI\Collection
     */
    public function getOptions() : ?Collection
    {
        return $this->getField('options');
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        $data = parent::getData();

        if (isset($data['price'])) {
            $data['price'] = DecimalHelper::serialize($data['price'], 8);
        }
        if (isset($data['cost'])) {
            $data['cost'] = DecimalHelper::serialize($data['cost'], 8);
        }
        if (isset($data['weight'])) {
            $data['weight'] = DecimalHelper::serialize($data['weight'], 8);
        }

        return $data;
    }
}
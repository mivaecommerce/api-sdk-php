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
 * Data model for ProductAttributeListAttribute.
 *
 * @package MerchantAPI\Model
 */
class ProductAttributeListAttribute extends \MerchantAPI\Model
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

        $this->setField('attributes', new Collection());
        $this->setField('options', new Collection());

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof ProductAttributeListAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new ProductAttributeListAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductAttributeListAttribute or an array of arrays but got %s',
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

        if (isset($data['template'])) {
            if ($data['template'] instanceof ProductAttributeListTemplate) {
                $this->setField('template', $data['template']);
            } else if (is_array($data['template'])) {
                $this->setField('template', new ProductAttributeListTemplate($data['template']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected ProductAttributeListTemplate or an array but got %s',
                    is_object($data['template']) ?
                        get_class($data['template']) : gettype($data['template'])));
            }
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
        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof ProductAttributeListAttribute) {
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

        if (isset($data['template'])) {
            if ($this->data['template'] instanceof ProductAttributeListTemplate) {
                $this->data['template'] = clone $this->data['template'];
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
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
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
     * Get attemp_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateId() : ?int
    {
        return $this->getField('attemp_id');
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
     * @return ?(float|string|int|Decimal)
     */
    public function getCost() 
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
     * Get weight.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getWeight() 
    {
        return $this->getField('weight');
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
     * Get attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getTemplateAttributes() : ?Collection
    {
        return $this->getField('attributes');
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
     * Get has_variant_parts.
     *
     * @return ?bool
     */
    public function getHasVariantParts() : ?bool
    {
        return $this->getField('has_variant_parts');
    }

    /**
     * Get template.
     *
     * @return ?\MerchantAPI\Model\ProductAttributeListTemplate
     */
    public function getTemplate() : ?ProductAttributeListTemplate
    {
        return $this->getField('template');
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
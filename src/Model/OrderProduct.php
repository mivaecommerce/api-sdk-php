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
 * Data model for OrderProduct.
 *
 * @package MerchantAPI\Model
 */
class OrderProduct extends \MerchantAPI\Model
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

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof OrderProductAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new OrderProductAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderProductAttribute or an array of arrays but got %s',
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
        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof OrderProductAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get status.
     *
     * @return ?int
     */
    public function getStatus() : ?int
    {
        return $this->getField('status');
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
     * Get tracknum.
     *
     * @return ?string
     */
    public function getTrackingNumber() : ?string
    {
        return $this->getField('tracknum');
    }

    /**
     * Get tracktype.
     *
     * @return ?string
     */
    public function getTrackingType() : ?string
    {
        return $this->getField('tracktype');
    }

    /**
     * Get quantity.
     *
     * @return ?int
     */
    public function getQuantity() : ?int
    {
        return $this->getField('quantity');
    }

    /**
     * Get tax.
     *
     * @return ?float
     */
    public function getTax() : ?float
    {
        return $this->getField('tax');
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
     * Set status.
     *
     * @param ?int $status
     * @return $this
     */
    public function setStatus(?int $status) : self
    {
        return $this->setField('status', $status);
    }

    /**
     * Set code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        return $this->setField('code', $code);
    }

    /**
     * Set sku.
     *
     * @param ?string $sku
     * @return $this
     */
    public function setSku(?string $sku) : self
    {
        return $this->setField('sku', $sku);
    }

    /**
     * Set tracknum.
     *
     * @param ?string $trackingNumber
     * @return $this
     */
    public function setTrackingNumber(?string $trackingNumber) : self
    {
        return $this->setField('tracknum', $trackingNumber);
    }

    /**
     * Set tracktype.
     *
     * @param ?string $trackingType
     * @return $this
     */
    public function setTrackingType(?string $trackingType) : self
    {
        return $this->setField('tracktype', $trackingType);
    }

    /**
     * Set quantity.
     *
     * @param ?int $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity) : self
    {
        return $this->setField('quantity', $quantity);
    }

    /**
     * Set tax.
     *
     * @param ?float $tax
     * @return $this
     */
    public function setTax(?float $tax) : self
    {
        return $this->setField('tax', $tax);
    }

    /**
     * Set attributes.
     *
     * @param array $attributes
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes) : self
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new OrderProductAttribute($model);
            } else if (!$model instanceof OrderProductAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderProductAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('attributes', $attributes);
    }

    /**
     * Add a OrderProductAttribute.
     *
     * @param OrderProductAttribute
     * @return $this
     */
    public function addAttribute(OrderProductAttribute $model) : self
    {
        if (!isset($this->data['attributes'])) {
            $this->data['attributes'] = [];
        }

        $this->data['attributes'][] = $model;

        return $this;
    }
}
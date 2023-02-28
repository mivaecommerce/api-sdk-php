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
 * Data model for OrderItem.
 *
 * @package MerchantAPI\Model
 */
class OrderItem extends \MerchantAPI\Model
{
    /** @var int ORDER_ITEM_STATUS_PENDING */
    const ORDER_ITEM_STATUS_PENDING = 0;

    /** @var int ORDER_ITEM_STATUS_PROCESSING */
    const ORDER_ITEM_STATUS_PROCESSING = 100;

    /** @var int ORDER_ITEM_STATUS_SHIPPED */
    const ORDER_ITEM_STATUS_SHIPPED = 200;

    /** @var int ORDER_ITEM_STATUS_PARTIALLY_SHIPPED */
    const ORDER_ITEM_STATUS_PARTIALLY_SHIPPED = 201;

    /** @var int ORDER_ITEM_STATUS_GIFT_CERT_NOT_REDEEMED */
    const ORDER_ITEM_STATUS_GIFT_CERT_NOT_REDEEMED = 210;

    /** @var int ORDER_ITEM_STATUS_GIFT_CERT_REDEEMED */
    const ORDER_ITEM_STATUS_GIFT_CERT_REDEEMED = 211;

    /** @var int ORDER_ITEM_STATUS_DIGITAL_NOT_DOWNLOADED */
    const ORDER_ITEM_STATUS_DIGITAL_NOT_DOWNLOADED = 220;

    /** @var int ORDER_ITEM_STATUS_DIGITAL_DOWNLOADED */
    const ORDER_ITEM_STATUS_DIGITAL_DOWNLOADED = 221;

    /** @var int ORDER_ITEM_STATUS_CANCELLED */
    const ORDER_ITEM_STATUS_CANCELLED = 300;

    /** @var int ORDER_ITEM_STATUS_BACKORDERED */
    const ORDER_ITEM_STATUS_BACKORDERED = 400;

    /** @var int ORDER_ITEM_STATUS_RMA_ISSUED */
    const ORDER_ITEM_STATUS_RMA_ISSUED = 500;

    /** @var int ORDER_ITEM_STATUS_RETURNED */
    const ORDER_ITEM_STATUS_RETURNED = 600;

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('discounts', new Collection());
        $this->setField('options', new Collection());

        if (isset($data['shipment'])) {
            if ($data['shipment'] instanceof OrderShipment) {
                $this->setField('shipment', $data['shipment']);
            } else if (is_array($data['shipment'])) {
                $this->setField('shipment', new OrderShipment($data['shipment']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderShipment or an array but got %s',
                    is_object($data['shipment']) ?
                        get_class($data['shipment']) : gettype($data['shipment'])));
            }
        }

        if (isset($data['discounts']) && is_array($data['discounts'])) {
            $discounts = new Collection();

            foreach($data['discounts'] as $e) {
                if ($e instanceof OrderItemDiscount) {
                    $discounts[] = $e;
                } else if (is_array($e)) {
                    $discounts[] = new OrderItemDiscount($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderItemDiscount or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('discounts', $discounts);
        }

        if (isset($data['options']) && is_array($data['options'])) {
            $options = new Collection();

            foreach($data['options'] as $e) {
                if ($e instanceof OrderItemOption) {
                    $options[] = $e;
                } else if (is_array($e)) {
                    $options[] = new OrderItemOption($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOption or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('options', $options);
        }

        if (isset($data['subscription'])) {
            if ($data['subscription'] instanceof OrderItemSubscription) {
                $this->setField('subscription', $data['subscription']);
            } else if (is_array($data['subscription'])) {
                $this->setField('subscription', new OrderItemSubscription($data['subscription']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderItemSubscription or an array but got %s',
                    is_object($data['subscription']) ?
                        get_class($data['subscription']) : gettype($data['subscription'])));
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
        if (isset($data['shipment'])) {
            if ($this->data['shipment'] instanceof OrderShipment) {
                $this->data['shipment'] = clone $this->data['shipment'];
            }
        }

        if (isset($this->data['discounts']) && is_array($this->data['discounts'])) {
            if ($this->data['discounts'] instanceof Collection) {
                $this->data['discounts'] = clone $this->data['discounts'];
            } else {
                foreach($this->data['discounts'] as $i => $e) {
                    if ($e instanceof OrderItemDiscount) {
                        $this->data['discounts'][$i] = clone $this->data['discounts'][$i];
                    }
                }
            }
        }

        if (isset($this->data['options']) && is_array($this->data['options'])) {
            if ($this->data['options'] instanceof Collection) {
                $this->data['options'] = clone $this->data['options'];
            } else {
                foreach($this->data['options'] as $i => $e) {
                    if ($e instanceof OrderItemOption) {
                        $this->data['options'][$i] = clone $this->data['options'][$i];
                    }
                }
            }
        }

        if (isset($data['subscription'])) {
            if ($this->data['subscription'] instanceof OrderItemSubscription) {
                $this->data['subscription'] = clone $this->data['subscription'];
            }
        }
    }

    /**
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get line_id.
     *
     * @return ?int
     */
    public function getLineId() : ?int
    {
        return $this->getField('line_id');
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
     * Get subscrp_id.
     *
     * @return ?int
     */
    public function getSubscriptionId() : ?int
    {
        return $this->getField('subscrp_id');
    }

    /**
     * Get subterm_id.
     *
     * @return ?int
     */
    public function getSubscriptionTermId() : ?int
    {
        return $this->getField('subterm_id');
    }

    /**
     * Get rma_id.
     *
     * @return ?int
     */
    public function getRmaId() : ?int
    {
        return $this->getField('rma_id');
    }

    /**
     * Get rma_code.
     *
     * @return ?string
     */
    public function getRmaCode() : ?string
    {
        return $this->getField('rma_code');
    }

    /**
     * Get rma_dt_issued.
     *
     * @return ?int
     */
    public function getRmaDataTimeIssued() : ?int
    {
        return $this->getTimestampField('rma_dt_issued');
    }

    /**
     * Get rma_dt_recvd.
     *
     * @return ?int
     */
    public function getRmaDateTimeReceived() : ?int
    {
        return $this->getTimestampField('rma_dt_recvd');
    }

    /**
     * Get dt_instock.
     *
     * @return ?int
     */
    public function getDateInStock() : ?int
    {
        return $this->getTimestampField('dt_instock');
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
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
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
     * Get retail.
     *
     * @return ?float
     */
    public function getRetail() : ?float
    {
        return $this->getField('retail');
    }

    /**
     * Get base_price.
     *
     * @return ?float
     */
    public function getBasePrice() : ?float
    {
        return $this->getField('base_price');
    }

    /**
     * Get price.
     *
     * @return ?float
     */
    public function getPrice() : ?float
    {
        return $this->getField('price');
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
     * Get formatted_tax.
     *
     * @return ?string
     */
    public function getFormattedTax() : ?string
    {
        return $this->getField('formatted_tax');
    }

    /**
     * Get weight.
     *
     * @return ?float
     */
    public function getWeight() : ?float
    {
        return $this->getField('weight');
    }

    /**
     * Get taxable.
     *
     * @return ?bool
     */
    public function getTaxable() : ?bool
    {
        return $this->getField('taxable');
    }

    /**
     * Get upsold.
     *
     * @return ?bool
     */
    public function getUpsold() : ?bool
    {
        return $this->getField('upsold');
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
     * Get shipment.
     *
     * @return ?\MerchantAPI\Model\OrderShipment
     */
    public function getShipment() : ?OrderShipment
    {
        return $this->getField('shipment');
    }

    /**
     * Get discounts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getDiscounts() : ?Collection
    {
        return $this->getField('discounts');
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
     * Get total.
     *
     * @return ?float
     */
    public function getTotal() : ?float
    {
        return $this->getField('total');
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
     * Get tracknum.
     *
     * @return ?string
     */
    public function getTrackingNumber() : ?string
    {
        return $this->getField('tracknum');
    }

    /**
     * Get shpmnt_id.
     *
     * @return ?int
     */
    public function getShipmentId() : ?int
    {
        return $this->getField('shpmnt_id');
    }

    /**
     * Get subscription.
     *
     * @return ?\MerchantAPI\Model\OrderItemSubscription
     */
    public function getSubscription() : ?OrderItemSubscription
    {
        return $this->getField('subscription');
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
     * Set name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        return $this->setField('name', $name);
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
     * Set price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        return $this->setField('price', $price);
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
     * Set weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        return $this->setField('weight', $weight);
    }

    /**
     * Set taxable.
     *
     * @param ?bool $taxable
     * @return $this
     */
    public function setTaxable(?bool $taxable) : self
    {
        return $this->setField('taxable', $taxable);
    }

    /**
     * Set upsold.
     *
     * @param ?bool $upsold
     * @return $this
     */
    public function setUpsold(?bool $upsold) : self
    {
        return $this->setField('upsold', $upsold);
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
     * Set options.
     *
     * @param array $options
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setOptions(array $options) : self
    {
        foreach ($options as &$model) {
            if (is_array($model)) {
                $model = new OrderItemOption($model);
            } else if (!$model instanceof OrderItemOption) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOption or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('options', $options);
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
     * Add a OrderItemOption.
     *
     * @param OrderItemOption
     * @return $this
     */
    public function addOption(OrderItemOption $model) : self
    {
        if (!isset($this->data['options'])) {
            $this->data['options'] = [];
        }

        $this->data['options'][] = $model;

        return $this;
    }
}
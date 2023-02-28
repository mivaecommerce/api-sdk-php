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
 * Data model for OrderShipment.
 *
 * @package MerchantAPI\Model
 */
class OrderShipment extends \MerchantAPI\Model
{
    /** @var int ORDER_SHIPMENT_STATUS_PENDING */
    const ORDER_SHIPMENT_STATUS_PENDING = 0;

    /** @var int ORDER_SHIPMENT_STATUS_PICKING */
    const ORDER_SHIPMENT_STATUS_PICKING = 100;

    /** @var int ORDER_SHIPMENT_STATUS_SHIPPED */
    const ORDER_SHIPMENT_STATUS_SHIPPED = 200;

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('items', new Collection());

        if (isset($data['order'])) {
            if ($data['order'] instanceof Order) {
                $this->setField('order', $data['order']);
            } else if (is_array($data['order'])) {
                $this->setField('order', new Order($data['order']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Order or an array but got %s',
                    is_object($data['order']) ?
                        get_class($data['order']) : gettype($data['order'])));
            }
        }

        if (isset($data['items']) && is_array($data['items'])) {
            $items = new Collection();

            foreach($data['items'] as $e) {
                if ($e instanceof OrderItem) {
                    $items[] = $e;
                } else if (is_array($e)) {
                    $items[] = new OrderItem($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderItem or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('items', $items);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['order'])) {
            if ($this->data['order'] instanceof Order) {
                $this->data['order'] = clone $this->data['order'];
            }
        }

        if (isset($this->data['items']) && is_array($this->data['items'])) {
            if ($this->data['items'] instanceof Collection) {
                $this->data['items'] = clone $this->data['items'];
            } else {
                foreach($this->data['items'] as $i => $e) {
                    if ($e instanceof OrderItem) {
                        $this->data['items'][$i] = clone $this->data['items'][$i];
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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get batch_id.
     *
     * @return ?int
     */
    public function getBatchId() : ?int
    {
        return $this->getField('batch_id');
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
     * Get status.
     *
     * @return ?int
     */
    public function getStatus() : ?int
    {
        return $this->getField('status');
    }

    /**
     * Get labelcount.
     *
     * @return ?int
     */
    public function getLabelCount() : ?int
    {
        return $this->getField('labelcount');
    }

    /**
     * Get ship_date.
     *
     * @return ?int
     */
    public function getShipDate() : ?int
    {
        return $this->getField('ship_date');
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
     * Get tracklink.
     *
     * @return ?string
     */
    public function getTrackingLink() : ?string
    {
        return $this->getField('tracklink');
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
     * Get cost.
     *
     * @return ?float
     */
    public function getCost() : ?float
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
     * Get order.
     *
     * @return ?\MerchantAPI\Model\Order
     */
    public function getOrder() : ?Order
    {
        return $this->getField('order');
    }

    /**
     * Get items.
     *
     * @return \MerchantAPI\Collection
     */
    public function getItems() : ?Collection
    {
        return $this->getField('items');
    }
}
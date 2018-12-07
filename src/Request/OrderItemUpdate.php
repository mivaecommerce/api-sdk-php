<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: OrderItemUpdate.php 71876 2018-12-07 01:01:23Z gidriss $
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\OrderItemOption;
use MerchantAPI\Model\OrderItem;
use MerchantAPI\Model\OrderTotal;

/**
 * Handles API Request OrderItem_Update.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitem_update
 */
class OrderItemUpdate extends Request
{
    /** @var string The API function name */
    protected $function = 'OrderItem_Update';

    /** @var int */
    protected $orderId;

    /** @var int */
    protected $lineId;

    /** @var string */
    protected $code;

    /** @var string */
    protected $name;

    /** @var string */
    protected $sku;

    /** @var int */
    protected $quantity;

    /** @var float */
    protected $price;

    /** @var float */
    protected $weight;

    /** @var bool */
    protected $taxable;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\OrderItemOption[] */
    protected $options = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\OrderItem
     */
    public function __construct(OrderItem $orderItem = null)
    {
        $this->options = new \MerchantAPI\Collection();

        if ($orderItem) {
            $this->setOrderId($orderItem->getOrderId());
            $this->setLineId($orderItem->getLineId());
            $this->setCode($orderItem->getCode());
            $this->setName($orderItem->getName());
            $this->setSku($orderItem->getSku());
            $this->setQuantity($orderItem->getQuantity());
            $this->setPrice($orderItem->getPrice());
            $this->setWeight($orderItem->getWeight());
            $this->setTaxable($orderItem->getTaxable());

            if ($orderItem->getOptions() && $orderItem->getOptions()->count()) {
                $this->setOptions(clone $orderItem->getOptions());
            }
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get Line_ID.
     *
     * @return int
     */
    public function getLineId()
    {
        return $this->lineId;
    }

    /**
     * Get Code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Sku.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get Taxable.
     *
     * @return bool
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Get Options.
     *
     * @return \MerchantAPI\Model\OrderItemOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set Order_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Line_ID.
     *
     * @param int
     * @return $this
     */
    public function setLineId($lineId)
    {
        $this->lineId = $lineId;

        return $this;
    }

    /**
     * Set Code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set Sku.
     *
     * @param string
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param int
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param float
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Set Taxable.
     *
     * @param bool
     * @return $this
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;

        return $this;
    }

    /**
     * Set Options.
     *
     * @param (\MerchantAPI\Model\OrderItemOption|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setOptions(array $options)
    {
        foreach ($options as &$model) {
            if (is_array($model)) {
                $model = new OrderItemOption($model);
            } else if (!$model instanceof OrderItemOption) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOption or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->options = $options;

        return $this;
    }

    /**
     * Add Options.
     *
     * @param \MerchantAPI\Model\OrderItemOption
     *
     * @return $this
     */
    public function addOption(OrderItemOption $model)
    {
        $this->options[] = $model;
        return $this;
    }

    /**
     * Add many OrderItemOption.
     *
     * @param (\MerchantAPI\Model\OrderItemOption|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addOptions(array $options)
    {
        foreach ($options as $e) {
            if (is_array($e)) {
                $this->options[] = new OrderItemOption($e);
            } else if ($e instanceof OrderItemOption) {
                $this->options[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOption or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        $data['Order_ID'] = $this->getOrderId();

        $data['Line_ID'] = $this->getLineId();

        if (!is_null($this->getCode())) {
            $data['Code'] = $this->getCode();
        }

        if (!is_null($this->getName())) {
            $data['Name'] = $this->getName();
        }

        if (!is_null($this->getSku())) {
            $data['Sku'] = $this->getSku();
        }

        if (!is_null($this->getQuantity())) {
            $data['Quantity'] = $this->getQuantity();
        }

        if (!is_null($this->getPrice())) {
            $data['Price'] = $this->getPrice();
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = $this->getWeight();
        }

        if (!is_null($this->getTaxable())) {
            $data['Taxable'] = $this->getTaxable();
        }

        if (count($this->getOptions())) {
            $data['Options'] = [];

            foreach ($this->getOptions() as $i => $option) {
                if ($option->hasData()) {
                    $data['Options'][] = $option->getData();
                }
            }
        }

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderItemUpdate($this, $httpResponse, $data);
    }
}
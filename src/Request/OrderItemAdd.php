<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\OrderItemOption;
use MerchantAPI\Model\Order;
use MerchantAPI\Model\OrderTotalAndItem;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request OrderItem_Add.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderitem_add
 */
class OrderItemAdd extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderItem_Add';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $name = null;

    /** @var ?string */
    protected ?string $sku = null;

    /** @var ?int */
    protected ?int $quantity = null;

    /** @var ?float */
    protected ?float $price = null;

    /** @var ?float */
    protected ?float $weight = null;

    /** @var ?bool */
    protected ?bool $taxable = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $options;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
    {
        parent::__construct($client);
        $this->options = new Collection();

        if ($order) {
            $this->setOrderId($order->getId());
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId() : ?int
    {
        return $this->orderId;
    }

    /**
     * Get Code.
     *
     * @return string
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Get Sku.
     *
     * @return string
     */
    public function getSku() : ?string
    {
        return $this->sku;
    }

    /**
     * Get Quantity.
     *
     * @return int
     */
    public function getQuantity() : ?int
    {
        return $this->quantity;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice() : ?float
    {
        return $this->price;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight() : ?float
    {
        return $this->weight;
    }

    /**
     * Get Taxable.
     *
     * @return bool
     */
    public function getTaxable() : ?bool
    {
        return $this->taxable;
    }

    /**
     * Get Options.
     *
     * @return \MerchantAPI\Collection
     */
    public function getOptions() : ?Collection
    {
        return $this->options;
    }

    /**
     * Set Order_ID.
     *
     * @param ?int $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId) : self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set Sku.
     *
     * @param ?string $sku
     * @return $this
     */
    public function setSku(?string $sku) : self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Set Quantity.
     *
     * @param ?int $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity) : self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Set Taxable.
     *
     * @param ?bool $taxable
     * @return $this
     */
    public function setTaxable(?bool $taxable) : self
    {
        $this->taxable = $taxable;

        return $this;
    }

    /**
     * Set Options.
     *
     * @param \MerchantAPI\Collection|array $options
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setOptions($options) : self
    {
        if (!is_array($options) && !$options instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($options) ? get_class($options) : gettype($options)));
        }

        foreach ($options as &$model) {
            if (is_array($model)) {
                $model = new OrderItemOption($model);
            } else if (!$model instanceof OrderItemOption) {
                throw new \InvalidArgumentException(sprintf('Expected array of OrderItemOption or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->options = new Collection($options);

        return $this;
    }

    /**
     * Add Options.
     *
     * @param \MerchantAPI\Model\OrderItemOption
     * @return $this
     */
    public function addOption(OrderItemOption $model) : self
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
    public function addOptions(array $options) : self
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
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Order_ID'] = $this->getOrderId();

        $data['Code'] = $this->getCode();

        $data['Name'] = $this->getName();

        if (!is_null($this->getSku())) {
            $data['Sku'] = $this->getSku();
        }

        $data['Quantity'] = $this->getQuantity();

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderItemAdd($this, $httpResponse, $data);
    }
}
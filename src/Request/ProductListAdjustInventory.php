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
use MerchantAPI\Model\ProductInventoryAdjustment;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request ProductList_Adjust_Inventory.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productlist_adjust_inventory
 */
class ProductListAdjustInventory extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductList_Adjust_Inventory';

    /** @var \MerchantAPI\Collection */
    protected Collection $inventoryAdjustments;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     */
    public function __construct(?BaseClient $client = null)
    {
        parent::__construct($client);
        $this->inventoryAdjustments = new \MerchantAPI\Collection();
    }

    /**
     * Get Inventory_Adjustments.
     *
     * @return \MerchantAPI\Collection
     */
    public function getInventoryAdjustments() : ?Collection
    {
        return $this->inventoryAdjustments;
    }

    /**
     * Set Inventory_Adjustments.
     *
     * @param \MerchantAPI\Collection|array $inventoryAdjustments
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setInventoryAdjustments($inventoryAdjustments) : self
    {
        if (!is_array($inventoryAdjustments) && !$inventoryAdjustments instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($inventoryAdjustments) ? get_class($inventoryAdjustments) : gettype($inventoryAdjustments)));
        }

        foreach ($inventoryAdjustments as &$model) {
            if (is_array($model)) {
                $model = new ProductInventoryAdjustment($model);
            } else if (!$model instanceof ProductInventoryAdjustment) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductInventoryAdjustment or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->inventoryAdjustments = new Collection($inventoryAdjustments);

        return $this;
    }

    /**
     * Add Inventory_Adjustments.
     *
     * @param \MerchantAPI\Model\ProductInventoryAdjustment
     * @return $this
     */
    public function addInventoryAdjustment(ProductInventoryAdjustment $model) : self
    {
        $this->inventoryAdjustments[] = $model;
        return $this;
    }

    /**
     * Add many ProductInventoryAdjustment.
     *
     * @param (\MerchantAPI\Model\ProductInventoryAdjustment|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addInventoryAdjustments(array $inventoryAdjustments) : self
    {
        foreach ($inventoryAdjustments as $e) {
            if (is_array($e)) {
                $this->inventoryAdjustments[] = new ProductInventoryAdjustment($e);
            } else if ($e instanceof ProductInventoryAdjustment) {
                $this->inventoryAdjustments[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductInventoryAdjustment or an array of arrays but got %s',
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

        if (count($this->getInventoryAdjustments())) {
            $data['Inventory_Adjustments'] = [];

            foreach ($this->getInventoryAdjustments() as $i => $inventoryAdjustment) {
                $data['Inventory_Adjustments'][] = $inventoryAdjustment->getData();
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductListAdjustInventory($this, $httpResponse, $data);
    }
}
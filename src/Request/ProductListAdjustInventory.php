<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\ProductInventoryAdjustment;

/**
 * Handles API Request ProductList_Adjust_Inventory.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productlist_adjust_inventory
 */
class ProductListAdjustInventory extends Request
{
    /** @var string The API function name */
    protected $function = 'ProductList_Adjust_Inventory';

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProductInventoryAdjustment[] */
    protected $inventoryAdjustments = [];

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->inventoryAdjustments = new \MerchantAPI\Collection();
    }

    /**
     * Get Inventory_Adjustments.
     *
     * @return \MerchantAPI\Model\ProductInventoryAdjustment[]
     */
    public function getInventoryAdjustments()
    {
        return $this->inventoryAdjustments;
    }

    /**
     * Set Inventory_Adjustments.
     *
     * @param (\MerchantAPI\Model\ProductInventoryAdjustment|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setInventoryAdjustments(array $inventoryAdjustments)
    {
        foreach ($inventoryAdjustments as &$model) {
            if (is_array($model)) {
                $model = new ProductInventoryAdjustment($model);
            } else if (!$model instanceof ProductInventoryAdjustment) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductInventoryAdjustment or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->inventoryAdjustments = $inventoryAdjustments;

        return $this;
    }

    /**
     * Add Inventory_Adjustments.
     *
     * @param \MerchantAPI\Model\ProductInventoryAdjustment
     *
     * @return $this
     */
    public function addInventoryAdjustment(ProductInventoryAdjustment $model)
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
    public function addInventoryAdjustments(array $inventoryAdjustments)
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
    public function toArray()
    {
        $data = [];

        if (count($this->getInventoryAdjustments())) {
            $data['Inventory_Adjustments'] = [];

            foreach ($this->getInventoryAdjustments() as $i => $inventoryAdjustment) {
                $data['Inventory_Adjustments'][] = $inventoryAdjustment->getData();
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
        return new \MerchantAPI\Response\ProductListAdjustInventory($this, $httpResponse, $data);
    }
}
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

namespace MerchantAPI\Model;

use MerchantAPI\Collection;

/**
 * Data model for ProductShippingRules.
 *
 * @package MerchantAPI\Model
 */
class ProductShippingRules extends \MerchantAPI\Model
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

        $this->setField('methods', new Collection());

        if (isset($data['methods']) && is_array($data['methods'])) {
            $methods = new Collection();

            foreach($data['methods'] as $e) {
                if ($e instanceof ProductShippingMethod) {
                    $methods[] = $e;
                } else if (is_array($e)) {
                    $methods[] = new ProductShippingMethod($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductShippingMethod or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('methods', $methods);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['methods']) && is_array($this->data['methods'])) {
            if ($this->data['methods'] instanceof Collection) {
                $this->data['methods'] = clone $this->data['methods'];
            } else {
                foreach($this->data['methods'] as $i => $e) {
                    if ($e instanceof ProductShippingMethod) {
                        $this->data['methods'][$i] = clone $this->data['methods'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get ownpackage.
     *
     * @return bool
     */
    public function getOwnPackage()
    {
        return (bool) $this->getField('ownpackage', false);
    }

    /**
     * Get width.
     *
     * @return float
     */
    public function getWidth()
    {
        return (float) $this->getField('width', 0.00);
    }

    /**
     * Get length.
     *
     * @return float
     */
    public function getLength()
    {
        return (float) $this->getField('length', 0.00);
    }

    /**
     * Get height.
     *
     * @return float
     */
    public function getHeight()
    {
        return (float) $this->getField('height', 0.00);
    }

    /**
     * Get limitmeths.
     *
     * @return bool
     */
    public function getLimitMethods()
    {
        return (bool) $this->getField('limitmeths', false);
    }

    /**
     * Get methods.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductShippingMethod[]
     */
    public function getMethods()
    {
        return $this->getField('methods', []);
    }

    /**
     * Set methods.
     *
     * @param array[ProductShippingMethod]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setMethods(array $methods)
    {
        foreach ($methods as &$model) {
            if (is_array($model)) {
                $model = new ProductShippingMethod($model);
            } else if (!$model instanceof ProductShippingMethod) {
                throw new \InvalidArgumentException(sprintf('Expected array of ProductShippingMethod or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('methods', $methods);
    }
    
    /**
     * Add a ProductShippingMethod.
     *
     * @param ProductShippingMethod
     * @return $this
     */
    public function addMethod(ProductShippingMethod $model)
    {
        if (!isset($this->data['methods'])) {
            $this->data['methods'] = [];
        }

        $this->data['methods'][] = $model;

        return $this;
    }
}
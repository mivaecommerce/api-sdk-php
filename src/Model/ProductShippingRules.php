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
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get ownpackage.
     *
     * @return ?bool
     */
    public function getOwnPackage() : ?bool
    {
        return $this->getField('ownpackage');
    }

    /**
     * Get width.
     *
     * @return ?float
     */
    public function getWidth() : ?float
    {
        return $this->getField('width');
    }

    /**
     * Get length.
     *
     * @return ?float
     */
    public function getLength() : ?float
    {
        return $this->getField('length');
    }

    /**
     * Get height.
     *
     * @return ?float
     */
    public function getHeight() : ?float
    {
        return $this->getField('height');
    }

    /**
     * Get limitmeths.
     *
     * @return ?bool
     */
    public function getLimitMethods() : ?bool
    {
        return $this->getField('limitmeths');
    }

    /**
     * Get methods.
     *
     * @return \MerchantAPI\Collection
     */
    public function getMethods() : ?Collection
    {
        return $this->getField('methods');
    }
}
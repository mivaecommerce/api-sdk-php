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
 * Data model for ProductVariant.
 *
 * @package MerchantAPI\Model
 */
class ProductVariant extends \MerchantAPI\Model
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

        $this->setField('parts', new Collection());
        $this->setField('dimensions', new Collection());

        if (isset($data['parts']) && is_array($data['parts'])) {
            $parts = new Collection();

            foreach($data['parts'] as $e) {
                if ($e instanceof ProductVariantPart) {
                    $parts[] = $e;
                } else if (is_array($e)) {
                    $parts[] = new ProductVariantPart($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantPart or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('parts', $parts);
        }

        if (isset($data['dimensions']) && is_array($data['dimensions'])) {
            $dimensions = new Collection();

            foreach($data['dimensions'] as $e) {
                if ($e instanceof ProductVariantDimension) {
                    $dimensions[] = $e;
                } else if (is_array($e)) {
                    $dimensions[] = new ProductVariantDimension($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductVariantDimension or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('dimensions', $dimensions);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['parts']) && is_array($this->data['parts'])) {
            if ($this->data['parts'] instanceof Collection) {
                $this->data['parts'] = clone $this->data['parts'];
            } else {
                foreach($this->data['parts'] as $i => $e) {
                    if ($e instanceof ProductVariantPart) {
                        $this->data['parts'][$i] = clone $this->data['parts'][$i];
                    }
                }
            }
        }

        if (isset($this->data['dimensions']) && is_array($this->data['dimensions'])) {
            if ($this->data['dimensions'] instanceof Collection) {
                $this->data['dimensions'] = clone $this->data['dimensions'];
            } else {
                foreach($this->data['dimensions'] as $i => $e) {
                    if ($e instanceof ProductVariantDimension) {
                        $this->data['dimensions'][$i] = clone $this->data['dimensions'][$i];
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
     * Get variant_id.
     *
     * @return int
     */
    public function getVariantId()
    {
        return (int) $this->getField('variant_id', 0);
    }

    /**
     * Get parts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariantPart[]
     */
    public function getParts()
    {
        return $this->getField('parts', []);
    }

    /**
     * Get dimensions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariantDimension[]
     */
    public function getDimensions()
    {
        return $this->getField('dimensions', []);
    }
}
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

/**
 * Data model for SplitOrderItem.
 *
 * @package MerchantAPI\Model
 */
class SplitOrderItem extends \MerchantAPI\Model
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

        if (isset($data['original_orderitem'])) {
            if ($data['original_orderitem'] instanceof OrderItem) {
                $this->setField('original_orderitem', $data['original_orderitem']);
            } else if (is_array($data['original_orderitem'])) {
                $this->setField('original_orderitem', new OrderItem($data['original_orderitem']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderItem or an array but got %s',
                    is_object($data['original_orderitem']) ?
                        get_class($data['original_orderitem']) : gettype($data['original_orderitem'])));
            }
        }

        if (isset($data['split_orderitem'])) {
            if ($data['split_orderitem'] instanceof OrderItem) {
                $this->setField('split_orderitem', $data['split_orderitem']);
            } else if (is_array($data['split_orderitem'])) {
                $this->setField('split_orderitem', new OrderItem($data['split_orderitem']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderItem or an array but got %s',
                    is_object($data['split_orderitem']) ?
                        get_class($data['split_orderitem']) : gettype($data['split_orderitem'])));
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
        if (isset($data['original_orderitem'])) {
            if ($this->data['original_orderitem'] instanceof OrderItem) {
                $this->data['original_orderitem'] = clone $this->data['original_orderitem'];
            }
        }

        if (isset($data['split_orderitem'])) {
            if ($this->data['split_orderitem'] instanceof OrderItem) {
                $this->data['split_orderitem'] = clone $this->data['split_orderitem'];
            }
        }
    }

    /**
     * Get original_orderitem.
     *
     * @return ?\MerchantAPI\Model\OrderItem
     */
    public function getOriginalOrderItem() : ?OrderItem
    {
        return $this->getField('original_orderitem');
    }

    /**
     * Get split_orderitem.
     *
     * @return ?\MerchantAPI\Model\OrderItem
     */
    public function getSplitOrderItem() : ?OrderItem
    {
        return $this->getField('split_orderitem');
    }
}
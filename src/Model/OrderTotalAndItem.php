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
 * Data model for OrderTotalAndItem.
 *
 * @package MerchantAPI\Model
 */
class OrderTotalAndItem extends OrderTotal
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

        if (isset($data['orderitem'])) {
            if ($data['orderitem'] instanceof OrderItem) {
                $this->setField('orderitem', $data['orderitem']);
            } else if (is_array($data['orderitem'])) {
                $this->setField('orderitem', new OrderItem($data['orderitem']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderItem or an array but got %s',
                    is_object($data['orderitem']) ?
                        get_class($data['orderitem']) : gettype($data['orderitem'])));
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
        if (isset($data['orderitem'])) {
            if ($this->data['orderitem'] instanceof OrderItem) {
                $this->data['orderitem'] = clone $this->data['orderitem'];
            }
        }
    }

    /**
     * Get orderitem.
     *
     * @return \MerchantAPI\Model\OrderItem|null
     */
    public function getOrderItem()
    {
        return $this->getField('orderitem', null);
    }
}
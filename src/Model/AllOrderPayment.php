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
 * Data model for AllOrderPayment.
 *
 * @package MerchantAPI\Model
 */
class AllOrderPayment extends Order
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

        if (isset($data['orderpayment'])) {
            if ($data['orderpayment'] instanceof OrderPayment) {
                $this->setField('orderpayment', $data['orderpayment']);
            } else if (is_array($data['orderpayment'])) {
                $this->setField('orderpayment', new OrderPayment($data['orderpayment']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderPayment or an array but got %s',
                    is_object($data['orderpayment']) ?
                        get_class($data['orderpayment']) : gettype($data['orderpayment'])));
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
        if (isset($data['orderpayment'])) {
            if ($this->data['orderpayment'] instanceof OrderPayment) {
                $this->data['orderpayment'] = clone $this->data['orderpayment'];
            }
        }
    }

    /**
     * Get orderpayment.
     *
     * @return ?\MerchantAPI\Model\OrderPayment
     */
    public function getOrderPayment() : ?OrderPayment
    {
        return $this->getField('orderpayment');
    }
}
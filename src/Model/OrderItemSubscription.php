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
 * Data model for OrderItemSubscription.
 *
 * @package MerchantAPI\Model
 */
class OrderItemSubscription extends Subscription
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

        if (isset($data['productsubscriptionterm'])) {
            if ($data['productsubscriptionterm'] instanceof ProductSubscriptionTerm) {
                $this->setField('productsubscriptionterm', $data['productsubscriptionterm']);
            } else if (is_array($data['productsubscriptionterm'])) {
                $this->setField('productsubscriptionterm', new ProductSubscriptionTerm($data['productsubscriptionterm']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected ProductSubscriptionTerm or an array but got %s',
                    is_object($data['productsubscriptionterm']) ?
                        get_class($data['productsubscriptionterm']) : gettype($data['productsubscriptionterm'])));
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
        if (isset($data['productsubscriptionterm'])) {
            if ($this->data['productsubscriptionterm'] instanceof ProductSubscriptionTerm) {
                $this->data['productsubscriptionterm'] = clone $this->data['productsubscriptionterm'];
            }
        }
    }

    /**
     * Get method.
     *
     * @return ?string
     */
    public function getMethod() : ?string
    {
        return $this->getField('method');
    }

    /**
     * Get productsubscriptionterm.
     *
     * @return ?\MerchantAPI\Model\ProductSubscriptionTerm
     */
    public function getProductSubscriptionTerm() : ?ProductSubscriptionTerm
    {
        return $this->getField('productsubscriptionterm');
    }
}
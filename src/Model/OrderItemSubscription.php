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
 * Data model for OrderItemSubscription.
 *
 * @package MerchantAPI\Model
 */
class OrderItemSubscription extends BaseSubscription
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

        $this->setField('options', new Collection());

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

        if (isset($data['options']) && is_array($data['options'])) {
            $options = new Collection();

            foreach($data['options'] as $e) {
                if ($e instanceof SubscriptionOption) {
                    $options[] = $e;
                } else if (is_array($e)) {
                    $options[] = new SubscriptionOption($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of SubscriptionOption or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('options', $options);
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

        if (isset($this->data['options']) && is_array($this->data['options'])) {
            if ($this->data['options'] instanceof Collection) {
                $this->data['options'] = clone $this->data['options'];
            } else {
                foreach($this->data['options'] as $i => $e) {
                    if ($e instanceof SubscriptionOption) {
                        $this->data['options'][$i] = clone $this->data['options'][$i];
                    }
                }
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

    /**
     * Get options.
     *
     * @return \MerchantAPI\Collection
     */
    public function getOptions() : ?Collection
    {
        return $this->getField('options');
    }
}
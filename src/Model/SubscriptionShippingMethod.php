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
 * Data model for SubscriptionShippingMethod.
 *
 * @package MerchantAPI\Model
 */
class SubscriptionShippingMethod extends \MerchantAPI\Model
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

        if (isset($data['module'])) {
            if ($data['module'] instanceof Module) {
                $this->setField('module', $data['module']);
            } else if (is_array($data['module'])) {
                $this->setField('module', new Module($data['module']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Module or an array but got %s',
                    is_object($data['module']) ?
                        get_class($data['module']) : gettype($data['module'])));
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
        if (isset($data['module'])) {
            if ($this->data['module'] instanceof Module) {
                $this->data['module'] = clone $this->data['module'];
            }
        }
    }

    /**
     * Get module.
     *
     * @return ?\MerchantAPI\Model\Module
     */
    public function getModule() : ?Module
    {
        return $this->getField('module');
    }

    /**
     * Get method_code.
     *
     * @return ?string
     */
    public function getMethodCode() : ?string
    {
        return $this->getField('method_code');
    }

    /**
     * Get method_name.
     *
     * @return ?string
     */
    public function getMethodName() : ?string
    {
        return $this->getField('method_name');
    }

    /**
     * Get price.
     *
     * @return ?float
     */
    public function getPrice() : ?float
    {
        return $this->getField('price');
    }

    /**
     * Get formatted_price.
     *
     * @return ?string
     */
    public function getFormattedPrice() : ?string
    {
        return $this->getField('formatted_price');
    }
}
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
 * Data model for DiscountModuleCapabilities.
 *
 * @package MerchantAPI\Model
 */
class DiscountModuleCapabilities extends \MerchantAPI\Model
{
    /**
     * Get preitems.
     *
     * @return bool
     */
    public function getPreitems()
    {
        return (bool) $this->getField('preitems', false);
    }

    /**
     * Get items.
     *
     * @return bool
     */
    public function getItems()
    {
        return (bool) $this->getField('items', false);
    }

    /**
     * Get eligibility.
     *
     * @return string
     */
    public function getEligibility()
    {
        return $this->getField('eligibility');
    }

    /**
     * Get basket.
     *
     * @return bool
     */
    public function getBasket()
    {
        return (bool) $this->getField('basket', false);
    }

    /**
     * Get shipping.
     *
     * @return bool
     */
    public function getShipping()
    {
        return (bool) $this->getField('shipping', false);
    }

    /**
     * Get qualifying.
     *
     * @return bool
     */
    public function getQualifying()
    {
        return (bool) $this->getField('qualifying', false);
    }
}
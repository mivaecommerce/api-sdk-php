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
     * @return ?bool
     */
    public function getPreitems() : ?bool
    {
        return $this->getField('preitems');
    }

    /**
     * Get items.
     *
     * @return ?bool
     */
    public function getItems() : ?bool
    {
        return $this->getField('items');
    }

    /**
     * Get eligibility.
     *
     * @return ?string
     */
    public function getEligibility() : ?string
    {
        return $this->getField('eligibility');
    }

    /**
     * Get basket.
     *
     * @return ?bool
     */
    public function getBasket() : ?bool
    {
        return $this->getField('basket');
    }

    /**
     * Get shipping.
     *
     * @return ?bool
     */
    public function getShipping() : ?bool
    {
        return $this->getField('shipping');
    }

    /**
     * Get qualifying.
     *
     * @return ?bool
     */
    public function getQualifying() : ?bool
    {
        return $this->getField('qualifying');
    }
}
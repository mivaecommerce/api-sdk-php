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
 * Data model for CouponPriceGroup.
 *
 * @package MerchantAPI\Model
 */
class CouponPriceGroup extends PriceGroup
{
    /**
     * Get assigned.
     *
     * @return ?bool
     */
    public function getAssigned() : ?bool
    {
        return $this->getField('assigned');
    }
}
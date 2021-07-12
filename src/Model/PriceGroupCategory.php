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
 * Data model for PriceGroupCategory.
 *
 * @package MerchantAPI\Model
 */
class PriceGroupCategory extends Category
{
    /**
     * Get assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return (bool) $this->getField('assigned', false);
    }
}
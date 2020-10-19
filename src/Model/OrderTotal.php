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
 * Data model for OrderTotal.
 *
 * @package MerchantAPI\Model
 */
class OrderTotal extends \MerchantAPI\Model
{
    /**
     * Get total.
     *
     * @return float
     */
    public function getTotal()
    {
        return (float) $this->getField('total', 0.00);
    }

    /**
     * Get formatted_total.
     *
     * @return string
     */
    public function getFormattedTotal()
    {
        return $this->getField('formatted_total');
    }
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;

/**
 * API Response for SubscriptionAndOrderItem_Add.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/subscriptionandorderitem_add
 */
class SubscriptionAndOrderItemAdd extends Response
{
    /**
     * Get total.
     *
     * @return float
     */
    public function getTotal()
    {
        if (isset($this->data['total'])) {
            return $this->data['total'];
        }

        return null;
    }

    /**
     * Get formatted_total.
     *
     * @return string
     */
    public function getFormattedTotal()
    {
        if (isset($this->data['formatted_total'])) {
            return $this->data['formatted_total'];
        }

        return null;
    }
}
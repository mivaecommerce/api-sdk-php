<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;

/**
 * API Response for CouponList_Delete.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/couponlist_delete
 */
class CouponListDelete extends Response
{

    /**
     * Get processed.
     *
     * @return int
     */
    public function getProcessed()
    {
        if (isset($this->data['processed'])) {
            return $this->data['processed'];
        }

        return null;
    }
}
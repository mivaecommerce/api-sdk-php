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
 * API Response for ProductVariantList_Delete.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productvariantlist_delete
 */
class ProductVariantListDelete extends Response
{
    /**
     * Get processed.
     *
     * @return int
     */
    public function getProcessed() : ?int
    {
        if (isset($this->data['processed'])) {
            return $this->data['processed'];
        }

        return null;
    }
}
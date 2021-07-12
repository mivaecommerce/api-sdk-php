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
 * API Response for ProductVariant_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productvariant_insert
 */
class ProductVariantInsert extends Response
{
    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        if (isset($this->data['data']['product_id'])) {
            return $this->data['data']['product_id'];
        }

        return null;
    }

    /**
     * Get variant_id.
     *
     * @return int
     */
    public function getVariantId()
    {
        if (isset($this->data['data']['variant_id'])) {
            return $this->data['data']['variant_id'];
        }

        return null;
    }
}
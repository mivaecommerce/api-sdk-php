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
 * API Response for ProductVariant_Update.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productvariant_update
 */
class ProductVariantUpdate extends Response
{
    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        if (isset($this->data['product_id'])) {
            return $this->data['product_id'];
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
        if (isset($this->data['variant_id'])) {
            return $this->data['variant_id'];
        }

        return null;
    }
}
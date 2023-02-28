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
 * API Response for ProductKit_Variant_Count.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productkit_variant_count
 */
class ProductKitVariantCount extends Response
{
    /**
     * Get variants.
     *
     * @return int
     */
    public function getVariants() : ?int
    {
        if (isset($this->data['data']['variants'])) {
            return $this->data['data']['variants'];
        }

        return null;
    }
}
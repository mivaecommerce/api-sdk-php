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

namespace MerchantAPI\Model;

/**
 * Data model for ProductVariantDimension.
 *
 * @package MerchantAPI\Model
 */
class ProductVariantDimension extends \MerchantAPI\Model
{
    /**
     * Get attr_id.
     *
     * @return int
     */
    public function getAttrId()
    {
        return (int) $this->getField('attr_id', 0);
    }

    /**
     * Get attmpat_id.
     *
     * @return int
     */
    public function getAttmpatId()
    {
        return (int) $this->getField('attmpat_id', 0);
    }

    /**
     * Get option_id.
     *
     * @return int
     */
    public function getOptionId()
    {
        return (int) $this->getField('option_id', 0);
    }

    /**
     * Get option_code.
     *
     * @return string
     */
    public function getOptionCode()
    {
        return $this->getField('option_code');
    }
}
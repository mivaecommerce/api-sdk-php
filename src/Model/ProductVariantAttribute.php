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
 * Data model for ProductVariantAttribute.
 *
 * @package MerchantAPI\Model
 */
class ProductVariantAttribute extends \MerchantAPI\Model
{
    /**
     * Get attr_id.
     *
     * @return ?int
     */
    public function getAttributeId() : ?int
    {
        return $this->getField('attr_id');
    }

    /**
     * Get attr_code.
     *
     * @return ?string
     */
    public function getAttributeCode() : ?string
    {
        return $this->getField('attr_code');
    }

    /**
     * Get attmpat_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->getField('attmpat_id');
    }

    /**
     * Get option_id.
     *
     * @return ?int
     */
    public function getOptionId() : ?int
    {
        return $this->getField('option_id');
    }

    /**
     * Get option_code.
     *
     * @return ?string
     */
    public function getOptionCode() : ?string
    {
        return $this->getField('option_code');
    }
}
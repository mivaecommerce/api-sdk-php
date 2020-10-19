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
 * Data model for ProductVariantLimit.
 *
 * @package MerchantAPI\Model
 */
class ProductVariantLimit extends \MerchantAPI\Model
{
    /**
     * Get attr_id.
     *
     * @return int
     */
    public function getAttributeId()
    {
        return (int) $this->getField('attr_id', 0);
    }

    /**
     * Get attmpat_id.
     *
     * @return int
     */
    public function getAttributeTemplateId()
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
     * Set attr_id.
     *
     * @param int
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        return $this->setField('attr_id', $attributeId);
    }

    /**
     * Set attmpat_id.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateId($attributeTemplateId)
    {
        return $this->setField('attmpat_id', $attributeTemplateId);
    }

    /**
     * Set option_id.
     *
     * @param int
     * @return $this
     */
    public function setOptionId($optionId)
    {
        return $this->setField('option_id', $optionId);
    }
}
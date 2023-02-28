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
     * @return ?int
     */
    public function getAttributeId() : ?int
    {
        return $this->getField('attr_id');
    }

    /**
     * Get attmpat_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateId() : ?int
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
     * Get attr_code.
     *
     * @return ?string
     */
    public function getAttributeCode() : ?string
    {
        return $this->getField('attr_code');
    }

    /**
     * Get attmpat_code.
     *
     * @return ?string
     */
    public function getAttributeTemplateCode() : ?string
    {
        return $this->getField('attmpat_code');
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

    /**
     * Set attr_id.
     *
     * @param ?int $attributeId
     * @return $this
     */
    public function setAttributeId(?int $attributeId) : self
    {
        return $this->setField('attr_id', $attributeId);
    }

    /**
     * Set attmpat_id.
     *
     * @param ?int $attributeTemplateId
     * @return $this
     */
    public function setAttributeTemplateId(?int $attributeTemplateId) : self
    {
        return $this->setField('attmpat_id', $attributeTemplateId);
    }

    /**
     * Set option_id.
     *
     * @param ?int $optionId
     * @return $this
     */
    public function setOptionId(?int $optionId) : self
    {
        return $this->setField('option_id', $optionId);
    }

    /**
     * Set attr_code.
     *
     * @param ?string $attributeCode
     * @return $this
     */
    public function setAttributeCode(?string $attributeCode) : self
    {
        return $this->setField('attr_code', $attributeCode);
    }

    /**
     * Set attmpat_code.
     *
     * @param ?string $attributeTemplateCode
     * @return $this
     */
    public function setAttributeTemplateCode(?string $attributeTemplateCode) : self
    {
        return $this->setField('attmpat_code', $attributeTemplateCode);
    }

    /**
     * Set option_code.
     *
     * @param ?string $optionCode
     * @return $this
     */
    public function setOptionCode(?string $optionCode) : self
    {
        return $this->setField('option_code', $optionCode);
    }
}
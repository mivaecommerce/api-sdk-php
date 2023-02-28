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
 * Data model for SubscriptionAttribute.
 *
 * @package MerchantAPI\Model
 */
class SubscriptionAttribute extends \MerchantAPI\Model
{
    /**
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get template_code.
     *
     * @return ?string
     */
    public function getTemplateCode() : ?string
    {
        return $this->getField('template_code');
    }

    /**
     * Get value.
     *
     * @return ?string
     */
    public function getValue() : ?string
    {
        return $this->getField('value');
    }

    /**
     * Set code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        return $this->setField('code', $code);
    }

    /**
     * Set template_code.
     *
     * @param ?string $templateCode
     * @return $this
     */
    public function setTemplateCode(?string $templateCode) : self
    {
        return $this->setField('template_code', $templateCode);
    }

    /**
     * Set value.
     *
     * @param ?string $value
     * @return $this
     */
    public function setValue(?string $value) : self
    {
        return $this->setField('value', $value);
    }
}
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
 * Data model for OrderProductAttribute.
 *
 * @package MerchantAPI\Model
 */
class OrderProductAttribute extends \MerchantAPI\Model
{
    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get template_code.
     *
     * @return string
     */
    public function getTemplateCode()
    {
        return $this->getField('template_code');
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->getField('value');
    }

    /**
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set template_code.
     *
     * @param string
     * @return $this
     */
    public function setTemplateCode($templateCode)
    {
        return $this->setField('template_code', $templateCode);
    }

    /**
     * Set value.
     *
     * @param string
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setField('value', $value);
    }
}
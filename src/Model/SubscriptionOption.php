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
 * Data model for SubscriptionOption.
 *
 * @package MerchantAPI\Model
 */
class SubscriptionOption extends \MerchantAPI\Model
{
    /**
     * Get subscrp_id.
     *
     * @return int
     */
    public function getSubscriptionId()
    {
        return (int) $this->getField('subscrp_id', 0);
    }

    /**
     * Get templ_code.
     *
     * @return string
     */
    public function getTemplateCode()
    {
        return $this->getField('templ_code');
    }

    /**
     * Get attr_code.
     *
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->getField('attr_code');
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
}
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
 * Data model for AvailabilityGroupShippingMethod.
 *
 * @package MerchantAPI\Model
 */
class AvailabilityGroupShippingMethod extends \MerchantAPI\Model
{
    /**
     * Get mod_code.
     *
     * @return string
     */
    public function getModuleCode()
    {
        return $this->getField('mod_code');
    }

    /**
     * Get meth_code.
     *
     * @return string
     */
    public function getMethodCode()
    {
        return $this->getField('meth_code');
    }

    /**
     * Get method_name.
     *
     * @return string
     */
    public function getMethodName()
    {
        return $this->getField('method_name');
    }

    /**
     * Get assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return (bool) $this->getField('assigned', false);
    }
}
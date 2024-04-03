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
 * Data model for ShippingRuleMethod.
 *
 * @package MerchantAPI\Model
 */
class ShippingRuleMethod extends \MerchantAPI\Model
{
    /**
     * Get module_code.
     *
     * @return ?string
     */
    public function getModuleCode() : ?string
    {
        return $this->getField('module_code');
    }

    /**
     * Get method_code.
     *
     * @return ?string
     */
    public function getMethodCode() : ?string
    {
        return $this->getField('method_code');
    }

    /**
     * Set module_code.
     *
     * @param ?string $moduleCode
     * @return $this
     */
    public function setModuleCode(?string $moduleCode) : self
    {
        return $this->setField('module_code', $moduleCode);
    }

    /**
     * Set method_code.
     *
     * @param ?string $methodCode
     * @return $this
     */
    public function setMethodCode(?string $methodCode) : self
    {
        return $this->setField('method_code', $methodCode);
    }
}
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
 * Data model for ResourceAttribute.
 *
 * @package MerchantAPI\Model
 */
class ResourceAttribute extends \MerchantAPI\Model
{
    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
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
     * Set name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        return $this->setField('name', $name);
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
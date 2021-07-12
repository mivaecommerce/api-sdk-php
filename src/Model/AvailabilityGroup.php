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
 * Data model for AvailabilityGroup.
 *
 * @package MerchantAPI\Model
 */
class AvailabilityGroup extends \MerchantAPI\Model
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

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
     * Get tax_exempt.
     *
     * @return bool
     */
    public function getTaxExempt()
    {
        return (bool) $this->getField('tax_exempt', false);
    }
}
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
 * Data model for PaymentCardType.
 *
 * @package MerchantAPI\Model
 */
class PaymentCardType extends \MerchantAPI\Model
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
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
    }

    /**
     * Get prefixes.
     *
     * @return string
     */
    public function getPrefixes()
    {
        return $this->getField('prefixes');
    }

    /**
     * Get lengths.
     *
     * @return string
     */
    public function getLengths()
    {
        return $this->getField('lengths');
    }

    /**
     * Get cvv.
     *
     * @return bool
     */
    public function getCvv()
    {
        return (bool) $this->getField('cvv', false);
    }
}
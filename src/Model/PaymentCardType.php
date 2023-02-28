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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get type.
     *
     * @return ?string
     */
    public function getType() : ?string
    {
        return $this->getField('type');
    }

    /**
     * Get prefixes.
     *
     * @return ?string
     */
    public function getPrefixes() : ?string
    {
        return $this->getField('prefixes');
    }

    /**
     * Get lengths.
     *
     * @return ?string
     */
    public function getLengths() : ?string
    {
        return $this->getField('lengths');
    }

    /**
     * Get cvv.
     *
     * @return ?bool
     */
    public function getCvv() : ?bool
    {
        return $this->getField('cvv');
    }
}
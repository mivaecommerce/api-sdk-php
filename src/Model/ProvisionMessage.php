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
 * Data model for ProvisionMessage.
 *
 * @package MerchantAPI\Model
 */
class ProvisionMessage extends \MerchantAPI\Model
{
    /**
     * Get dtstamp.
     *
     * @return ?string
     */
    public function getDateTimeStamp() : ?string
    {
        return $this->getField('dtstamp');
    }

    /**
     * Get lineno.
     *
     * @return ?int
     */
    public function getLineNumber() : ?int
    {
        return $this->getField('lineno');
    }

    /**
     * Get tag.
     *
     * @return ?string
     */
    public function getTag() : ?string
    {
        return $this->getField('tag');
    }

    /**
     * Get message.
     *
     * @return ?string
     */
    public function getMessage() : ?string
    {
        return $this->getField('message');
    }
}
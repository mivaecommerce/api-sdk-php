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
 * Data model for ProvisionMessage.
 *
 * @package MerchantAPI\Model
 */
class ProvisionMessage extends \MerchantAPI\Model
{
    /**
     * Get dtstamp.
     *
     * @return string
     */
    public function getDateTimeStamp()
    {
        return $this->getField('dtstamp');
    }

    /**
     * Get lineno.
     *
     * @return int
     */
    public function getLineNumber()
    {
        return (int) $this->getField('lineno', 0);
    }

    /**
     * Get tag.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->getField('tag');
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getField('message');
    }
}
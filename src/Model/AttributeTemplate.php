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
 * Data model for AttributeTemplate.
 *
 * @package MerchantAPI\Model
 */
class AttributeTemplate extends \MerchantAPI\Model
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
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get prompt.
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->getField('prompt');
    }

    /**
     * Get refcount.
     *
     * @return int
     */
    public function getRefcount()
    {
        return (int) $this->getField('refcount', 0);
    }
}
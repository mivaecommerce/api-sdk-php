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
 * Data model for Module.
 *
 * @package MerchantAPI\Model
 */
class Module extends \MerchantAPI\Model
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
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get provider.
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->getField('provider');
    }

    /**
     * Get api_ver.
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->getField('api_ver');
    }

    /**
     * Get version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->getField('version');
    }

    /**
     * Get module.
     *
     * @return string
     */
    public function getModule()
    {
        return $this->getField('module');
    }

    /**
     * Get refcount.
     *
     * @return string
     */
    public function getReferenceCount()
    {
        return $this->getField('refcount');
    }

    /**
     * Get active.
     *
     * @return string
     */
    public function getActive()
    {
        return $this->getField('active');
    }
}
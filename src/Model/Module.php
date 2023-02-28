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
 * Data model for Module.
 *
 * @package MerchantAPI\Model
 */
class Module extends \MerchantAPI\Model
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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get provider.
     *
     * @return ?string
     */
    public function getProvider() : ?string
    {
        return $this->getField('provider');
    }

    /**
     * Get api_ver.
     *
     * @return ?string
     */
    public function getApiVersion() : ?string
    {
        return $this->getField('api_ver');
    }

    /**
     * Get version.
     *
     * @return ?string
     */
    public function getVersion() : ?string
    {
        return $this->getField('version');
    }

    /**
     * Get module.
     *
     * @return ?string
     */
    public function getModule() : ?string
    {
        return $this->getField('module');
    }

    /**
     * Get refcount.
     *
     * @return ?int
     */
    public function getReferenceCount() : ?int
    {
        return $this->getField('refcount');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }
}
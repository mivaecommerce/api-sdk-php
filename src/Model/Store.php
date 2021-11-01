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
 * Data model for Store.
 *
 * @package MerchantAPI\Model
 */
class Store extends \MerchantAPI\Model
{
    /** @var string CACHE_TYPE_NONE */
    const CACHE_TYPE_NONE = '';

    /** @var string CACHE_TYPE_REDIS */
    const CACHE_TYPE_REDIS = 'redis';

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
     * Get manager_id.
     *
     * @return int
     */
    public function getManagerId()
    {
        return (int) $this->getField('manager_id', 0);
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
     * Get license.
     *
     * @return string
     */
    public function getLicense()
    {
        return $this->getField('license');
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
     * Get owner.
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->getField('owner');
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getField('email');
    }

    /**
     * Get company.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->getField('company');
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getField('address');
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getField('city');
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->getField('state');
    }

    /**
     * Get zip.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->getField('zip');
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->getField('phone');
    }

    /**
     * Get fax.
     *
     * @return string
     */
    public function getFax()
    {
        return $this->getField('fax');
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getField('country');
    }

    /**
     * Get wtunits.
     *
     * @return string
     */
    public function getWeightUnits()
    {
        return $this->getField('wtunits');
    }

    /**
     * Get wtunitcode.
     *
     * @return string
     */
    public function getWeightUnitCode()
    {
        return $this->getField('wtunitcode');
    }

    /**
     * Get dmunitcode.
     *
     * @return string
     */
    public function getDimensionUnits()
    {
        return $this->getField('dmunitcode');
    }

    /**
     * Get baskexp.
     *
     * @return int
     */
    public function getBasketExpiration()
    {
        return (int) $this->getField('baskexp', 0);
    }

    /**
     * Get pgrp_ovlp.
     *
     * @return string
     */
    public function getPriceGroupOverlapResolution()
    {
        return $this->getField('pgrp_ovlp');
    }

    /**
     * Get ui_id.
     *
     * @return int
     */
    public function getUserInterfaceId()
    {
        return (int) $this->getField('ui_id', 0);
    }

    /**
     * Get tax_id.
     *
     * @return int
     */
    public function getTaxId()
    {
        return (int) $this->getField('tax_id', 0);
    }

    /**
     * Get currncy_id.
     *
     * @return int
     */
    public function getCurrencyId()
    {
        return (int) $this->getField('currncy_id', 0);
    }

    /**
     * Get mnt_warn.
     *
     * @return string
     */
    public function getMaintenanceWarningMessage()
    {
        return $this->getField('mnt_warn');
    }

    /**
     * Get mnt_close.
     *
     * @return string
     */
    public function getMaintenanceClosedMessage()
    {
        return $this->getField('mnt_close');
    }

    /**
     * Get mnt_time.
     *
     * @return int
     */
    public function getMaintenanceTime()
    {
        return (int) $this->getField('mnt_time', 0);
    }

    /**
     * Get mnt_no_new.
     *
     * @return int
     */
    public function getMaintenanceNoNewCustomersBefore()
    {
        return (int) $this->getField('mnt_no_new', 0);
    }

    /**
     * Get omin_quant.
     *
     * @return int
     */
    public function getOrderMinimumQuantity()
    {
        return (int) $this->getField('omin_quant', 0);
    }

    /**
     * Get omin_price.
     *
     * @return foat
     */
    public function getOrderMinimumPrice()
    {
        // Missing foat
    }

    /**
     * Get omin_all.
     *
     * @return bool
     */
    public function getOrderMinimumRequiredAll()
    {
        return (bool) $this->getField('omin_all', false);
    }

    /**
     * Get omin_msg.
     *
     * @return string
     */
    public function getOrderMinimumMessage()
    {
        return $this->getField('omin_msg');
    }

    /**
     * Get crypt_id.
     *
     * @return int
     */
    public function getCryptId()
    {
        return (int) $this->getField('crypt_id', 0);
    }

    /**
     * Get req_ship.
     *
     * @return bool
     */
    public function getRequireShipping()
    {
        return (bool) $this->getField('req_ship', false);
    }

    /**
     * Get req_tax.
     *
     * @return bool
     */
    public function getRequireTax()
    {
        return (bool) $this->getField('req_tax', false);
    }

    /**
     * Get req_frship.
     *
     * @return bool
     */
    public function getRequireFreeOrderShipping()
    {
        return (bool) $this->getField('req_frship', false);
    }

    /**
     * Get item_adel.
     *
     * @return bool
     */
    public function getItemModuleUninstallable()
    {
        return (bool) $this->getField('item_adel', false);
    }

    /**
     * Get cache_type.
     *
     * @return string
     */
    public function getCacheType()
    {
        return $this->getField('cache_type');
    }

    /**
     * Get redishost.
     *
     * @return string
     */
    public function getRedisHost()
    {
        return $this->getField('redishost');
    }

    /**
     * Get redisport.
     *
     * @return int
     */
    public function getRedisPort()
    {
        return (int) $this->getField('redisport', 0);
    }

    /**
     * Get redisto.
     *
     * @return int
     */
    public function getRedisTimeout()
    {
        return (int) $this->getField('redisto', 0);
    }

    /**
     * Get redisex.
     *
     * @return int
     */
    public function getRedisExpiration()
    {
        return (int) $this->getField('redisex', 0);
    }
}
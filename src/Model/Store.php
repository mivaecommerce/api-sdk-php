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
    const CACHE_TYPE_NONE = 'none';

    /** @var string CACHE_TYPE_REDIS */
    const CACHE_TYPE_REDIS = 'redis';

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
     * Get manager_id.
     *
     * @return ?int
     */
    public function getManagerId() : ?int
    {
        return $this->getField('manager_id');
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
     * Get license.
     *
     * @return ?string
     */
    public function getLicense() : ?string
    {
        return $this->getField('license');
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
     * Get icon.
     *
     * @return ?string
     */
    public function getIcon() : ?string
    {
        return $this->getField('icon');
    }

    /**
     * Get owner.
     *
     * @return ?string
     */
    public function getOwner() : ?string
    {
        return $this->getField('owner');
    }

    /**
     * Get email.
     *
     * @return ?string
     */
    public function getEmail() : ?string
    {
        return $this->getField('email');
    }

    /**
     * Get company.
     *
     * @return ?string
     */
    public function getCompany() : ?string
    {
        return $this->getField('company');
    }

    /**
     * Get address.
     *
     * @return ?string
     */
    public function getAddress() : ?string
    {
        return $this->getField('address');
    }

    /**
     * Get city.
     *
     * @return ?string
     */
    public function getCity() : ?string
    {
        return $this->getField('city');
    }

    /**
     * Get state.
     *
     * @return ?string
     */
    public function getState() : ?string
    {
        return $this->getField('state');
    }

    /**
     * Get zip.
     *
     * @return ?string
     */
    public function getZip() : ?string
    {
        return $this->getField('zip');
    }

    /**
     * Get phone.
     *
     * @return ?string
     */
    public function getPhone() : ?string
    {
        return $this->getField('phone');
    }

    /**
     * Get fax.
     *
     * @return ?string
     */
    public function getFax() : ?string
    {
        return $this->getField('fax');
    }

    /**
     * Get country.
     *
     * @return ?string
     */
    public function getCountry() : ?string
    {
        return $this->getField('country');
    }

    /**
     * Get wtunits.
     *
     * @return ?string
     */
    public function getWeightUnits() : ?string
    {
        return $this->getField('wtunits');
    }

    /**
     * Get wtunitcode.
     *
     * @return ?string
     */
    public function getWeightUnitCode() : ?string
    {
        return $this->getField('wtunitcode');
    }

    /**
     * Get wtdispmix.
     *
     * @return ?bool
     */
    public function getDisplayMixedWeightUnits() : ?bool
    {
        return $this->getField('wtdispmix');
    }

    /**
     * Get wtdisplow.
     *
     * @return ?bool
     */
    public function getDisplayWeightLessThan() : ?bool
    {
        return $this->getField('wtdisplow');
    }

    /**
     * Get wtdispdig.
     *
     * @return ?int
     */
    public function getWeightDigits() : ?int
    {
        return $this->getField('wtdispdig');
    }

    /**
     * Get dmunitcode.
     *
     * @return ?string
     */
    public function getDimensionUnits() : ?string
    {
        return $this->getField('dmunitcode');
    }

    /**
     * Get baskexp.
     *
     * @return ?int
     */
    public function getBasketExpiration() : ?int
    {
        return $this->getField('baskexp');
    }

    /**
     * Get pgrp_ovlp.
     *
     * @return ?string
     */
    public function getPriceGroupOverlapResolution() : ?string
    {
        return $this->getField('pgrp_ovlp');
    }

    /**
     * Get ui_id.
     *
     * @return ?int
     */
    public function getUserInterfaceId() : ?int
    {
        return $this->getField('ui_id');
    }

    /**
     * Get tax_id.
     *
     * @return ?int
     */
    public function getTaxId() : ?int
    {
        return $this->getField('tax_id');
    }

    /**
     * Get currncy_id.
     *
     * @return ?int
     */
    public function getCurrencyId() : ?int
    {
        return $this->getField('currncy_id');
    }

    /**
     * Get mnt_warn.
     *
     * @return ?string
     */
    public function getMaintenanceWarningMessage() : ?string
    {
        return $this->getField('mnt_warn');
    }

    /**
     * Get mnt_close.
     *
     * @return ?string
     */
    public function getMaintenanceClosedMessage() : ?string
    {
        return $this->getField('mnt_close');
    }

    /**
     * Get mnt_time.
     *
     * @return ?int
     */
    public function getMaintenanceTime() : ?int
    {
        return $this->getField('mnt_time');
    }

    /**
     * Get mnt_no_new.
     *
     * @return ?int
     */
    public function getMaintenanceNoNewCustomersBefore() : ?int
    {
        return $this->getField('mnt_no_new');
    }

    /**
     * Get omin_quant.
     *
     * @return ?int
     */
    public function getOrderMinimumQuantity() : ?int
    {
        return $this->getField('omin_quant');
    }

    /**
     * Get omin_price.
     *
     * @return ?float
     */
    public function getOrderMinimumPrice() : ?float
    {
        return $this->getField('omin_price');
    }

    /**
     * Get omin_all.
     *
     * @return ?bool
     */
    public function getOrderMinimumRequiredAll() : ?bool
    {
        return $this->getField('omin_all');
    }

    /**
     * Get omin_msg.
     *
     * @return ?string
     */
    public function getOrderMinimumMessage() : ?string
    {
        return $this->getField('omin_msg');
    }

    /**
     * Get crypt_id.
     *
     * @return ?int
     */
    public function getCryptId() : ?int
    {
        return $this->getField('crypt_id');
    }

    /**
     * Get req_ship.
     *
     * @return ?bool
     */
    public function getRequireShipping() : ?bool
    {
        return $this->getField('req_ship');
    }

    /**
     * Get req_tax.
     *
     * @return ?bool
     */
    public function getRequireTax() : ?bool
    {
        return $this->getField('req_tax');
    }

    /**
     * Get req_frship.
     *
     * @return ?bool
     */
    public function getRequireFreeOrderShipping() : ?bool
    {
        return $this->getField('req_frship');
    }

    /**
     * Get item_adel.
     *
     * @return ?bool
     */
    public function getItemModuleUninstallable() : ?bool
    {
        return $this->getField('item_adel');
    }

    /**
     * Get cache_type.
     *
     * @return ?string
     */
    public function getCacheType() : ?string
    {
        return $this->getField('cache_type');
    }

    /**
     * Get cache_exp.
     *
     * @return ?int
     */
    public function getCacheExpiration() : ?int
    {
        return $this->getField('cache_exp');
    }

    /**
     * Get cache_ver.
     *
     * @return ?int
     */
    public function getCacheVersion() : ?int
    {
        return $this->getField('cache_ver');
    }

    /**
     * Get cache_comp.
     *
     * @return ?bool
     */
    public function getCacheCompression() : ?bool
    {
        return $this->getField('cache_comp');
    }

    /**
     * Get cacheset.
     *
     * @return ?int
     */
    public function getCacheSet() : ?int
    {
        return $this->getField('cacheset');
    }

    /**
     * Get redishost.
     *
     * @return ?string
     */
    public function getRedisHost() : ?string
    {
        return $this->getField('redishost');
    }

    /**
     * Get redisport.
     *
     * @return ?int
     */
    public function getRedisPort() : ?int
    {
        return $this->getField('redisport');
    }

    /**
     * Get redisto.
     *
     * @return ?int
     */
    public function getRedisTimeout() : ?int
    {
        return $this->getField('redisto');
    }

    /**
     * Get redisex.
     *
     * @return ?int
     */
    public function getRedisExpiration() : ?int
    {
        return $this->getField('redisex');
    }

    /**
     * Get boxpack_id.
     *
     * @return ?int
     */
    public function getBoxPackingId() : ?int
    {
        return $this->getField('boxpack_id');
    }

    /**
     * Get addrval_id.
     *
     * @return ?int
     */
    public function getAddressValidationId() : ?int
    {
        return $this->getField('addrval_id');
    }

    /**
     * Get deferbask.
     *
     * @return ?bool
     */
    public function getDeferBaskets() : ?bool
    {
        return $this->getField('deferbask');
    }

    /**
     * Get trackhits.
     *
     * @return ?bool
     */
    public function getTrackPageHits() : ?bool
    {
        return $this->getField('trackhits');
    }

    /**
     * Get mnt_ips.
     *
     * @return ?string
     */
    public function getMaintenanceAllowedIps() : ?string
    {
        return $this->getField('mnt_ips');
    }

    /**
     * Get branch_id.
     *
     * @return ?int
     */
    public function getBranchId() : ?int
    {
        return $this->getField('branch_id');
    }

    /**
     * Get charset.
     *
     * @return ?string
     */
    public function getCharacterSet() : ?string
    {
        return $this->getField('charset');
    }

    /**
     * Get schtsk_adv.
     *
     * @return ?int
     */
    public function getScheduledTaskAdvance() : ?int
    {
        return $this->getField('schtsk_adv');
    }

    /**
     * Get schtsk_min.
     *
     * @return ?int
     */
    public function getScheduledTaskTimeout() : ?int
    {
        return $this->getField('schtsk_min');
    }
}
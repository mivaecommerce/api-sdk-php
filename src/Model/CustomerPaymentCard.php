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
 * Data model for CustomerPaymentCard.
 *
 * @package MerchantAPI\Model
 */
class CustomerPaymentCard extends \MerchantAPI\Model
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
     * Get cust_id.
     *
     * @return ?int
     */
    public function getCustomerId() : ?int
    {
        return $this->getField('cust_id');
    }

    /**
     * Get fname.
     *
     * @return ?string
     */
    public function getFirstName() : ?string
    {
        return $this->getField('fname');
    }

    /**
     * Get lname.
     *
     * @return ?string
     */
    public function getLastName() : ?string
    {
        return $this->getField('lname');
    }

    /**
     * Get exp_month.
     *
     * @return ?int
     */
    public function getExpirationMonth() : ?int
    {
        return $this->getField('exp_month');
    }

    /**
     * Get exp_year.
     *
     * @return ?int
     */
    public function getExpirationYear() : ?int
    {
        return $this->getField('exp_year');
    }

    /**
     * Get lastfour.
     *
     * @return ?string
     */
    public function getLastFour() : ?string
    {
        return $this->getField('lastfour');
    }

    /**
     * Get addr1.
     *
     * @return ?string
     */
    public function getAddress1() : ?string
    {
        return $this->getField('addr1');
    }

    /**
     * Get addr2.
     *
     * @return ?string
     */
    public function getAddress2() : ?string
    {
        return $this->getField('addr2');
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
     * Get cntry.
     *
     * @return ?string
     */
    public function getCountry() : ?string
    {
        return $this->getField('cntry');
    }

    /**
     * Get lastused.
     *
     * @return ?int
     */
    public function getLastUsed() : ?int
    {
        return $this->getField('lastused');
    }

    /**
     * Get token.
     *
     * @return ?string
     */
    public function getToken() : ?string
    {
        return $this->getField('token');
    }

    /**
     * Get type_id.
     *
     * @return ?int
     */
    public function getTypeId() : ?int
    {
        return $this->getField('type_id');
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
     * Get type.
     *
     * @return ?string
     */
    public function getType() : ?string
    {
        return $this->getField('type');
    }

    /**
     * Get mod_code.
     *
     * @return ?string
     */
    public function getModuleCode() : ?string
    {
        return $this->getField('mod_code');
    }

    /**
     * Get meth_code.
     *
     * @return ?string
     */
    public function getMethodCode() : ?string
    {
        return $this->getField('meth_code');
    }
}
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
 * Data model for CustomerPaymentCard.
 *
 * @package MerchantAPI\Model
 */
class CustomerPaymentCard extends \MerchantAPI\Model
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
     * Get cust_id.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return (int) $this->getField('cust_id', 0);
    }

    /**
     * Get fname.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->getField('fname');
    }

    /**
     * Get lname.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->getField('lname');
    }

    /**
     * Get exp_month.
     *
     * @return int
     */
    public function getExpirationMonth()
    {
        return (int) $this->getField('exp_month', 0);
    }

    /**
     * Get exp_year.
     *
     * @return int
     */
    public function getExpirationYear()
    {
        return (int) $this->getField('exp_year', 0);
    }

    /**
     * Get lastfour.
     *
     * @return string
     */
    public function getLastFour()
    {
        return $this->getField('lastfour');
    }

    /**
     * Get addr1.
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->getField('addr1');
    }

    /**
     * Get addr2.
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->getField('addr2');
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
     * Get cntry.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->getField('cntry');
    }

    /**
     * Get lastused.
     *
     * @return string
     */
    public function getLastUsed()
    {
        return $this->getField('lastused');
    }

    /**
     * Get token.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->getField('token');
    }

    /**
     * Get type_id.
     *
     * @return int
     */
    public function getTypeId()
    {
        return (int) $this->getField('type_id', 0);
    }

    /**
     * Get refcount.
     *
     * @return int
     */
    public function getReferenceCount()
    {
        return (int) $this->getField('refcount', 0);
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
     * Get mod_code.
     *
     * @return string
     */
    public function getModuleCode()
    {
        return $this->getField('mod_code');
    }

    /**
     * Get meth_code.
     *
     * @return string
     */
    public function getMethodCode()
    {
        return $this->getField('meth_code');
    }
}
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
 * Data model for CustomerAddress.
 *
 * @package MerchantAPI\Model
 */
class CustomerAddress extends \MerchantAPI\Model
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
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
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
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getField('email');
    }

    /**
     * Get comp.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->getField('comp');
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
     * Get resdntl.
     *
     * @return bool
     */
    public function getResidential()
    {
        return (bool) $this->getField('resdntl', false);
    }
}
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
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
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
     * Get email.
     *
     * @return ?string
     */
    public function getEmail() : ?string
    {
        return $this->getField('email');
    }

    /**
     * Get comp.
     *
     * @return ?string
     */
    public function getCompany() : ?string
    {
        return $this->getField('comp');
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
     * Get resdntl.
     *
     * @return ?bool
     */
    public function getResidential() : ?bool
    {
        return $this->getField('resdntl');
    }
}
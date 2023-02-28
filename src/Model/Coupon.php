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
 * Data model for Coupon.
 *
 * @package MerchantAPI\Model
 */
class Coupon extends \MerchantAPI\Model
{
    /** @var string CUSTOMER_SCOPE_ALL_SHOPPERS */
    const CUSTOMER_SCOPE_ALL_SHOPPERS = 'A';

    /** @var string CUSTOMER_SCOPE_SPECIFIC_CUSTOMERS */
    const CUSTOMER_SCOPE_SPECIFIC_CUSTOMERS = 'X';

    /** @var string CUSTOMER_SCOPE_ALL_LOGGED_IN */
    const CUSTOMER_SCOPE_ALL_LOGGED_IN = 'L';

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
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get custscope.
     *
     * @return ?string
     */
    public function getCustomerScope() : ?string
    {
        return $this->getField('custscope');
    }

    /**
     * Get dt_start.
     *
     * @return ?int
     */
    public function getDateTimeStart() : ?int
    {
        return $this->getTimestampField('dt_start');
    }

    /**
     * Get dt_end.
     *
     * @return ?int
     */
    public function getDateTimeEnd() : ?int
    {
        return $this->getTimestampField('dt_end');
    }

    /**
     * Get max_use.
     *
     * @return ?int
     */
    public function getMaxUse() : ?int
    {
        return $this->getField('max_use');
    }

    /**
     * Get max_per.
     *
     * @return ?int
     */
    public function getMaxPer() : ?int
    {
        return $this->getField('max_per');
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

    /**
     * Get use_count.
     *
     * @return ?int
     */
    public function getUseCount() : ?int
    {
        return $this->getField('use_count');
    }
}
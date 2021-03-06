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
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get custscope.
     *
     * @return string
     */
    public function getCustomerScope()
    {
        return $this->getField('custscope');
    }

    /**
     * Get dt_start.
     *
     * @return int
     */
    public function getDateTimeStart()
    {
        return (int) $this->getField('dt_start', 0);
    }

    /**
     * Get dt_end.
     *
     * @return int
     */
    public function getDateTimeEnd()
    {
        return (int) $this->getField('dt_end', 0);
    }

    /**
     * Get max_use.
     *
     * @return int
     */
    public function getMaxUse()
    {
        return (int) $this->getField('max_use', 0);
    }

    /**
     * Get max_per.
     *
     * @return int
     */
    public function getMaxPer()
    {
        return (int) $this->getField('max_per', 0);
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('active', false);
    }

    /**
     * Get use_count.
     *
     * @return int
     */
    public function getUseCount()
    {
        return (int) $this->getField('use_count', 0);
    }
}
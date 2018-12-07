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
 * Data model for ProductInventorySettings.
 *
 * @package MerchantAPI\Model
 */
class ProductInventorySettings extends \MerchantAPI\Model
{
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
     * Get in_short.
     *
     * @return string
     */
    public function getInShort()
    {
        return $this->getField('in_short');
    }

    /**
     * Get in_long.
     *
     * @return string
     */
    public function getInLong()
    {
        return $this->getField('in_long');
    }

    /**
     * Get low_track.
     *
     * @return string
     */
    public function getLowTrack()
    {
        return $this->getField('low_track');
    }

    /**
     * Get low_level.
     *
     * @return int
     */
    public function getLowLevel()
    {
        return (int) $this->getField('low_level', 0);
    }

    /**
     * Get low_lvl_d.
     *
     * @return bool
     */
    public function getLowLvlD()
    {
        return (bool) $this->getField('low_lvl_d', false);
    }

    /**
     * Get low_short.
     *
     * @return string
     */
    public function getLowShort()
    {
        return $this->getField('low_short');
    }

    /**
     * Get low_long.
     *
     * @return string
     */
    public function getLowLong()
    {
        return $this->getField('low_long');
    }

    /**
     * Get out_track.
     *
     * @return string
     */
    public function getOutTrack()
    {
        return $this->getField('out_track');
    }

    /**
     * Get out_hide.
     *
     * @return string
     */
    public function getOutHide()
    {
        return $this->getField('out_hide');
    }

    /**
     * Get out_level.
     *
     * @return int
     */
    public function getOutLevel()
    {
        return (int) $this->getField('out_level', 0);
    }

    /**
     * Get out_lvl_d.
     *
     * @return bool
     */
    public function getOutLvlD()
    {
        return (bool) $this->getField('out_lvl_d', false);
    }

    /**
     * Get out_short.
     *
     * @return string
     */
    public function getOutShort()
    {
        return $this->getField('out_short');
    }

    /**
     * Get out_long.
     *
     * @return string
     */
    public function getOutLong()
    {
        return $this->getField('out_long');
    }

    /**
     * Get ltd_long.
     *
     * @return string
     */
    public function getLtdLong()
    {
        return $this->getField('ltd_long');
    }
}
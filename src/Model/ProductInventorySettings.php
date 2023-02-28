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
 * Data model for ProductInventorySettings.
 *
 * @package MerchantAPI\Model
 */
class ProductInventorySettings extends \MerchantAPI\Model
{
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
     * Get in_short.
     *
     * @return ?string
     */
    public function getInStockMessageShort() : ?string
    {
        return $this->getField('in_short');
    }

    /**
     * Get in_long.
     *
     * @return ?string
     */
    public function getInStockMessageLong() : ?string
    {
        return $this->getField('in_long');
    }

    /**
     * Get low_track.
     *
     * @return ?string
     */
    public function getTrackLowStockLevel() : ?string
    {
        return $this->getField('low_track');
    }

    /**
     * Get low_level.
     *
     * @return ?int
     */
    public function getLowStockLevel() : ?int
    {
        return $this->getField('low_level');
    }

    /**
     * Get low_lvl_d.
     *
     * @return ?bool
     */
    public function getLowStockLevelDefault() : ?bool
    {
        return $this->getField('low_lvl_d');
    }

    /**
     * Get low_short.
     *
     * @return ?string
     */
    public function getLowStockMessageShort() : ?string
    {
        return $this->getField('low_short');
    }

    /**
     * Get low_long.
     *
     * @return ?string
     */
    public function getLowStockMessageLong() : ?string
    {
        return $this->getField('low_long');
    }

    /**
     * Get out_track.
     *
     * @return ?string
     */
    public function getTrackOutOfStockLevel() : ?string
    {
        return $this->getField('out_track');
    }

    /**
     * Get out_hide.
     *
     * @return ?string
     */
    public function getHideOutOfStock() : ?string
    {
        return $this->getField('out_hide');
    }

    /**
     * Get out_level.
     *
     * @return ?int
     */
    public function getOutOfStockLevel() : ?int
    {
        return $this->getField('out_level');
    }

    /**
     * Get out_lvl_d.
     *
     * @return ?bool
     */
    public function getOutOfStockLevelDefault() : ?bool
    {
        return $this->getField('out_lvl_d');
    }

    /**
     * Get out_short.
     *
     * @return ?string
     */
    public function getOutOfStockMessageShort() : ?string
    {
        return $this->getField('out_short');
    }

    /**
     * Get out_long.
     *
     * @return ?string
     */
    public function getOutOfStockMessageLong() : ?string
    {
        return $this->getField('out_long');
    }

    /**
     * Get ltd_long.
     *
     * @return ?string
     */
    public function getLimitedStockMessage() : ?string
    {
        return $this->getField('ltd_long');
    }
}
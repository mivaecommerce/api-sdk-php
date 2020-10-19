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
 * Data model for Branch.
 *
 * @package MerchantAPI\Model
 */
class Branch extends \MerchantAPI\Model
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
     * Get immutable.
     *
     * @return bool
     */
    public function getImmutable()
    {
        return (bool) $this->getField('immutable', false);
    }

    /**
     * Get branchkey.
     *
     * @return string
     */
    public function getBranchKey()
    {
        return $this->getField('branchkey');
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
     * Get color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->getField('color');
    }

    /**
     * Get framework.
     *
     * @return string
     */
    public function getFramework()
    {
        return $this->getField('framework');
    }

    /**
     * Get is_primary.
     *
     * @return bool
     */
    public function getIsPrimary()
    {
        return (bool) $this->getField('is_primary', false);
    }

    /**
     * Get is_working.
     *
     * @return bool
     */
    public function getIsWorking()
    {
        return (bool) $this->getField('is_working', false);
    }

    /**
     * Get preview_url.
     *
     * @return string
     */
    public function getPreviewUrl()
    {
        return $this->getField('preview_url');
    }
}
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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get immutable.
     *
     * @return ?bool
     */
    public function getImmutable() : ?bool
    {
        return $this->getField('immutable');
    }

    /**
     * Get branchkey.
     *
     * @return ?string
     */
    public function getBranchKey() : ?string
    {
        return $this->getField('branchkey');
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
     * Get color.
     *
     * @return ?string
     */
    public function getColor() : ?string
    {
        return $this->getField('color');
    }

    /**
     * Get framework.
     *
     * @return ?string
     */
    public function getFramework() : ?string
    {
        return $this->getField('framework');
    }

    /**
     * Get is_primary.
     *
     * @return ?bool
     */
    public function getIsPrimary() : ?bool
    {
        return $this->getField('is_primary');
    }

    /**
     * Get is_working.
     *
     * @return ?bool
     */
    public function getIsWorking() : ?bool
    {
        return $this->getField('is_working');
    }

    /**
     * Get preview_url.
     *
     * @return ?string
     */
    public function getPreviewUrl() : ?string
    {
        return $this->getField('preview_url');
    }
}
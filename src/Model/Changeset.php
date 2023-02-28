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
 * Data model for Changeset.
 *
 * @package MerchantAPI\Model
 */
class Changeset extends \MerchantAPI\Model
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
     * Get branch_id.
     *
     * @return ?int
     */
    public function getBranchId() : ?int
    {
        return $this->getField('branch_id');
    }

    /**
     * Get user_id.
     *
     * @return ?int
     */
    public function getUserId() : ?int
    {
        return $this->getField('user_id');
    }

    /**
     * Get dtstamp.
     *
     * @return ?int
     */
    public function getDateTimeStamp() : ?int
    {
        return $this->getTimestampField('dtstamp');
    }

    /**
     * Get notes.
     *
     * @return ?string
     */
    public function getNotes() : ?string
    {
        return $this->getField('notes');
    }

    /**
     * Get user_name.
     *
     * @return ?string
     */
    public function getUserName() : ?string
    {
        return $this->getField('user_name');
    }

    /**
     * Get user_icon.
     *
     * @return ?string
     */
    public function getUserIcon() : ?string
    {
        return $this->getField('user_icon');
    }

    /**
     * Get tags.
     *
     * @return ?array
     */
    public function getTags() : ?array
    {
        return $this->getField('tags');
    }

    /**
     * Get formatted_tags.
     *
     * @return ?string
     */
    public function getFormattedTags() : ?string
    {
        return $this->getField('formatted_tags');
    }
}
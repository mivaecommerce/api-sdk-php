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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get branch_id.
     *
     * @return int
     */
    public function getBranchId()
    {
        return (int) $this->getField('branch_id', 0);
    }

    /**
     * Get user_id.
     *
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->getField('user_id', 0);
    }

    /**
     * Get dtstamp.
     *
     * @return int
     */
    public function getDateTimeStamp()
    {
        return (int) $this->getField('dtstamp', 0);
    }

    /**
     * Get notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->getField('notes');
    }

    /**
     * Get user_name.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->getField('user_name');
    }

    /**
     * Get user_icon.
     *
     * @return string
     */
    public function getUserIcon()
    {
        return $this->getField('user_icon');
    }

    /**
     * Get tags.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->getField('tags', []);
    }

    /**
     * Get formatted_tags.
     *
     * @return string
     */
    public function getFormattedTags()
    {
        return $this->getField('formatted_tags');
    }
}
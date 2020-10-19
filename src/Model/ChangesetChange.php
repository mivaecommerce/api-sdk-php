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
 * Data model for ChangesetChange.
 *
 * @package MerchantAPI\Model
 */
class ChangesetChange extends \MerchantAPI\Model
{
    /**
     * Get item_type.
     *
     * @return string
     */
    public function getItemType()
    {
        return $this->getField('item_type');
    }

    /**
     * Get item_id.
     *
     * @return int
     */
    public function getItemId()
    {
        return (int) $this->getField('item_id', 0);
    }

    /**
     * Get item_version_id.
     *
     * @return int
     */
    public function getItemVersionId()
    {
        return (int) $this->getField('item_version_id', 0);
    }

    /**
     * Get item_identifier.
     *
     * @return string
     */
    public function getItemIdentifier()
    {
        return $this->getField('item_identifier');
    }
}
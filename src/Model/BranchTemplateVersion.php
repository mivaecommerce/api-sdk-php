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
 * Data model for BranchTemplateVersion.
 *
 * @package MerchantAPI\Model
 */
class BranchTemplateVersion extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['settings'])) {
            if ($data['settings'] instanceof VersionSettings) {
                $this->setField('settings', $data['settings']);
            } else {
                $this->setField('settings', new VersionSettings($data['settings']));
            }
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['settings'])) {
            if ($this->data['settings'] instanceof VersionSettings) {
                $this->data['settings'] = clone $this->data['settings'];
            }
        }
    }

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
     * Get templ_id.
     *
     * @return ?int
     */
    public function getTemplateId() : ?int
    {
        return $this->getField('templ_id');
    }

    /**
     * Get parent_id.
     *
     * @return ?int
     */
    public function getParentId() : ?int
    {
        return $this->getField('parent_id');
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
     * Get item_id.
     *
     * @return ?int
     */
    public function getItemId() : ?int
    {
        return $this->getField('item_id');
    }

    /**
     * Get prop_id.
     *
     * @return ?int
     */
    public function getPropertyId() : ?int
    {
        return $this->getField('prop_id');
    }

    /**
     * Get sync.
     *
     * @return ?bool
     */
    public function getSync() : ?bool
    {
        return $this->getField('sync');
    }

    /**
     * Get filename.
     *
     * @return ?string
     */
    public function getFilename() : ?string
    {
        return $this->getField('filename');
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
     * Get source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('source');
    }

    /**
     * Get settings.
     *
     * @return ?\MerchantAPI\Model\VersionSettings
     */
    public function getSettings() : ?VersionSettings
    {
        return $this->getField('settings');
    }
}
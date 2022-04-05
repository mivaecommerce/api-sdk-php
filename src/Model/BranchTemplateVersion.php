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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get templ_id.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return (int) $this->getField('templ_id', 0);
    }

    /**
     * Get parent_id.
     *
     * @return int
     */
    public function getParentId()
    {
        return (int) $this->getField('parent_id', 0);
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
     * Get item_id.
     *
     * @return int
     */
    public function getItemId()
    {
        return (int) $this->getField('item_id', 0);
    }

    /**
     * Get prop_id.
     *
     * @return int
     */
    public function getPropertyId()
    {
        return (int) $this->getField('prop_id', 0);
    }

    /**
     * Get sync.
     *
     * @return bool
     */
    public function getSync()
    {
        return (bool) $this->getField('sync', false);
    }

    /**
     * Get filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->getField('filename');
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
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getField('source');
    }

    /**
     * Get settings.
     *
     * @return \MerchantAPI\Model\VersionSettings|null
     */
    public function getSettings()
    {
        return $this->getField('settings', null);
    }
}
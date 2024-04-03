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
 * Data model for BranchPageVersion.
 *
 * @package MerchantAPI\Model
 */
class BranchPageVersion extends \MerchantAPI\Model
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
     * Get page_id.
     *
     * @return ?int
     */
    public function getPageId() : ?int
    {
        return $this->getField('page_id');
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
     * Get admin.
     *
     * @return ?bool
     */
    public function getAdmin() : ?bool
    {
        return $this->getField('admin');
    }

    /**
     * Get layout.
     *
     * @return ?bool
     */
    public function getLayout() : ?bool
    {
        return $this->getField('layout');
    }

    /**
     * Get secure.
     *
     * @return ?bool
     */
    public function getSecure() : ?bool
    {
        return $this->getField('secure');
    }

    /**
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
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
     * Get title.
     *
     * @return ?string
     */
    public function getTitle() : ?string
    {
        return $this->getField('title');
    }

    /**
     * Get ui_id.
     *
     * @return ?int
     */
    public function getUiId() : ?int
    {
        return $this->getField('ui_id');
    }

    /**
     * Get templ_id.
     *
     * @return ?int
     */
    public function getTemplId() : ?int
    {
        return $this->getField('templ_id');
    }

    /**
     * Get cache.
     *
     * @return ?string
     */
    public function getCache() : ?string
    {
        return $this->getField('cache');
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
     * Get source_user_id.
     *
     * @return ?int
     */
    public function getSourceUserId() : ?int
    {
        return $this->getField('source_user_id');
    }

    /**
     * Get source_user_name.
     *
     * @return ?string
     */
    public function getSourceUserName() : ?string
    {
        return $this->getField('source_user_name');
    }

    /**
     * Get source_user_icon.
     *
     * @return ?string
     */
    public function getSourceUserIcon() : ?string
    {
        return $this->getField('source_user_icon');
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
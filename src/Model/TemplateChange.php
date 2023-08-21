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
 * Data model for TemplateChange.
 *
 * @package MerchantAPI\Model
 */
class TemplateChange extends \MerchantAPI\Model
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

        if (isset($data['Settings'])) {
            if ($data['Settings'] instanceof VersionSettings) {
                $this->setField('Settings', $data['Settings']);
            } else {
                $this->setField('Settings', new VersionSettings($data['Settings']));
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
        if (isset($data['Settings'])) {
            if ($this->data['Settings'] instanceof VersionSettings) {
                $this->data['Settings'] = clone $this->data['Settings'];
            }
        }
    }

    /**
     * Get Template_ID.
     *
     * @return ?int
     */
    public function getTemplateId() : ?int
    {
        return $this->getField('Template_ID');
    }

    /**
     * Get Template_Filename.
     *
     * @return ?string
     */
    public function getTemplateFilename() : ?string
    {
        return $this->getField('Template_Filename');
    }

    /**
     * Get Source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('Source');
    }

    /**
     * Get Settings.
     *
     * @return ?\MerchantAPI\Model\VersionSettings
     */
    public function getSettings() : ?VersionSettings
    {
        return $this->getField('Settings');
    }

    /**
     * Get Notes.
     *
     * @return ?string
     */
    public function getNotes() : ?string
    {
        return $this->getField('Notes');
    }

    /**
     * Set Template_ID.
     *
     * @param ?int $templateId
     * @return $this
     */
    public function setTemplateId(?int $templateId) : self
    {
        return $this->setField('Template_ID', $templateId);
    }

    /**
     * Set Template_Filename.
     *
     * @param ?string $templateFilename
     * @return $this
     */
    public function setTemplateFilename(?string $templateFilename) : self
    {
        return $this->setField('Template_Filename', $templateFilename);
    }

    /**
     * Set Source.
     *
     * @param ?string $source
     * @return $this
     */
    public function setSource(?string $source) : self
    {
        return $this->setField('Source', $source);
    }
    /**
     * Set Settings.
     *
     * @param \MerchantAPI\Model\VersionSettings $settings
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSettings($settings) : self
    {
        if (is_array($settings)) {
            return $this->setField('Settings', new VersionSettings($settings));
        } else if ($settings instanceof VersionSettings || is_null($settings)) {
            return $this->setField('Settings', $settings);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of VersionSettings, or null but got %s',
                is_object($settings) ? get_class($settings) : gettype($settings)));
        }
    }

    /**
     * Set Notes.
     *
     * @param ?string $notes
     * @return $this
     */
    public function setNotes(?string $notes) : self
    {
        return $this->setField('Notes', $notes);
    }
}
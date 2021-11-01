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
            if ($data['Settings'] instanceof TemplateVersionSettings) {
                $this->setField('Settings', $data['Settings']);
            } else {
                $this->setField('Settings', new TemplateVersionSettings($data['Settings']));
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
            if ($this->data['Settings'] instanceof TemplateVersionSettings) {
                $this->data['Settings'] = clone $this->data['Settings'];
            }
        }
    }

    /**
     * Get Template_ID.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return (int) $this->getField('Template_ID', 0);
    }

    /**
     * Get Template_Filename.
     *
     * @return string
     */
    public function getTemplateFilename()
    {
        return $this->getField('Template_Filename');
    }

    /**
     * Get Source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getField('Source');
    }

    /**
     * Get Settings.
     *
     * @return \MerchantAPI\Model\TemplateVersionSettings|null
     */
    public function getSettings()
    {
        return $this->getField('Settings', null);
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->getField('Notes');
    }

    /**
     * Set Template_ID.
     *
     * @param int
     * @return $this
     */
    public function setTemplateId($templateId)
    {
        return $this->setField('Template_ID', $templateId);
    }

    /**
     * Set Template_Filename.
     *
     * @param string
     * @return $this
     */
    public function setTemplateFilename($templateFilename)
    {
        return $this->setField('Template_Filename', $templateFilename);
    }

    /**
     * Set Source.
     *
     * @param string
     * @return $this
     */
    public function setSource($source)
    {
        return $this->setField('Source', $source);
    }

    /**
     * Set Settings.
     *
     * @param array|TemplateVersionSettings
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setSettings($settings)
    {
        if (is_array($settings)) {
            return $this->setField('Settings', new TemplateVersionSettings($settings));
        } else if ($settings instanceof TemplateVersionSettings || is_null($settings)) {
            return $this->setField('Settings', $settings);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of TemplateVersionSettings, or null but got %s',
                is_object($settings) ? get_class($settings) : gettype($settings)));
        }
    }

    /**
     * Set Notes.
     *
     * @param string
     * @return $this
     */
    public function setNotes($notes)
    {
        return $this->setField('Notes', $notes);
    }
}
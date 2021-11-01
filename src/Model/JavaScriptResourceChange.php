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

use MerchantAPI\Collection;

/**
 * Data model for JavaScriptResourceChange.
 *
 * @package MerchantAPI\Model
 */
class JavaScriptResourceChange extends \MerchantAPI\Model
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

        $this->setField('Attributes', new Collection());

        if (isset($data['Attributes']) && is_array($data['Attributes'])) {
            $Attributes = new Collection();

            foreach($data['Attributes'] as $e) {
                if ($e instanceof JavaScriptResourceVersionAttribute) {
                    $Attributes[] = $e;
                } else if (is_array($e)) {
                    $Attributes[] = new JavaScriptResourceVersionAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceVersionAttribute or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('Attributes', $Attributes);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['Attributes']) && is_array($this->data['Attributes'])) {
            if ($this->data['Attributes'] instanceof Collection) {
                $this->data['Attributes'] = clone $this->data['Attributes'];
            } else {
                foreach($this->data['Attributes'] as $i => $e) {
                    if ($e instanceof JavaScriptResourceVersionAttribute) {
                        $this->data['Attributes'][$i] = clone $this->data['Attributes'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get JavaScriptResource_ID.
     *
     * @return int
     */
    public function getJavaScriptResourceId()
    {
        return (int) $this->getField('JavaScriptResource_ID', 0);
    }

    /**
     * Get JavaScriptResource_Code.
     *
     * @return string
     */
    public function getJavaScriptResourceCode()
    {
        return $this->getField('JavaScriptResource_Code');
    }

    /**
     * Get Type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('Type');
    }

    /**
     * Get Global.
     *
     * @return bool
     */
    public function getGlobal()
    {
        return (bool) $this->getField('Global', false);
    }

    /**
     * Get Active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('Active', false);
    }

    /**
     * Get File_Path.
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->getField('File_Path');
    }

    /**
     * Get Branchless_File_Path.
     *
     * @return string
     */
    public function getBranchlessFilePath()
    {
        return $this->getField('Branchless_File_Path');
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
     * Get LinkedPages.
     *
     * @return array
     */
    public function getLinkedPages()
    {
        return $this->getField('LinkedPages', []);
    }

    /**
     * Get LinkedResources.
     *
     * @return array
     */
    public function getLinkedResources()
    {
        return $this->getField('LinkedResources', []);
    }

    /**
     * Get Attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\JavaScriptResourceVersionAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('Attributes', []);
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
     * Set JavaScriptResource_ID.
     *
     * @param int
     * @return $this
     */
    public function setJavaScriptResourceId($javaScriptResourceId)
    {
        return $this->setField('JavaScriptResource_ID', $javaScriptResourceId);
    }

    /**
     * Set JavaScriptResource_Code.
     *
     * @param string
     * @return $this
     */
    public function setJavaScriptResourceCode($javaScriptResourceCode)
    {
        return $this->setField('JavaScriptResource_Code', $javaScriptResourceCode);
    }

    /**
     * Set Type.
     *
     * @param string
     * @return $this
     */
    public function setType($type)
    {
        return $this->setField('Type', $type);
    }

    /**
     * Set Global.
     *
     * @param bool
     * @return $this
     */
    public function setGlobal($global)
    {
        return $this->setField('Global', $global);
    }

    /**
     * Set Active.
     *
     * @param bool
     * @return $this
     */
    public function setActive($active)
    {
        return $this->setField('Active', $active);
    }

    /**
     * Set File_Path.
     *
     * @param string
     * @return $this
     */
    public function setFilePath($filePath)
    {
        return $this->setField('File_Path', $filePath);
    }

    /**
     * Set Branchless_File_Path.
     *
     * @param string
     * @return $this
     */
    public function setBranchlessFilePath($branchlessFilePath)
    {
        return $this->setField('Branchless_File_Path', $branchlessFilePath);
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
     * Set LinkedPages.
     *
     * @param array
     * @return $this
     */
    public function setLinkedPages(array $linkedPages)
    {
        return $this->setField('LinkedPages', $linkedPages);
    }

    /**
     * Set LinkedResources.
     *
     * @param array
     * @return $this
     */
    public function setLinkedResources(array $linkedResources)
    {
        return $this->setField('LinkedResources', $linkedResources);
    }

    /**
     * Set Attributes.
     *
     * @param array[JavaScriptResourceVersionAttribute]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new JavaScriptResourceVersionAttribute($model);
            } else if (!$model instanceof JavaScriptResourceVersionAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceVersionAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('Attributes', $attributes);
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

    /**
     * Add a JavaScriptResourceVersionAttribute.
     *
     * @param JavaScriptResourceVersionAttribute
     * @return $this
     */
    public function addAttribute(JavaScriptResourceVersionAttribute $model)
    {
        if (!isset($this->data['Attributes'])) {
            $this->data['Attributes'] = [];
        }

        $this->data['Attributes'][] = $model;

        return $this;
    }
}
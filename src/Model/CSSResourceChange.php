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
 * Data model for CSSResourceChange.
 *
 * @package MerchantAPI\Model
 */
class CSSResourceChange extends \MerchantAPI\Model
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
                if ($e instanceof CSSResourceVersionAttribute) {
                    $Attributes[] = $e;
                } else if (is_array($e)) {
                    $Attributes[] = new CSSResourceVersionAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceVersionAttribute or an array of arrays but got %s',
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
                    if ($e instanceof CSSResourceVersionAttribute) {
                        $this->data['Attributes'][$i] = clone $this->data['Attributes'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get CSSResource_ID.
     *
     * @return int
     */
    public function getCSSResourceId()
    {
        return (int) $this->getField('CSSResource_ID', 0);
    }

    /**
     * Get CSSResource_Code.
     *
     * @return string
     */
    public function getCSSResourceCode()
    {
        return $this->getField('CSSResource_Code');
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
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\CSSResourceVersionAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('Attributes', []);
    }

    /**
     * Set CSSResource_ID.
     *
     * @param int
     * @return $this
     */
    public function setCSSResourceId($CSSResourceId)
    {
        return $this->setField('CSSResource_ID', $CSSResourceId);
    }

    /**
     * Set CSSResource_Code.
     *
     * @param string
     * @return $this
     */
    public function setCSSResourceCode($CSSResourceCode)
    {
        return $this->setField('CSSResource_Code', $CSSResourceCode);
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
     * @param array[CSSResourceVersionAttribute]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        foreach ($attributes as &$model) {
            if (is_array($model)) {
                $model = new CSSResourceVersionAttribute($model);
            } else if (!$model instanceof CSSResourceVersionAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceVersionAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        return $this->setField('Attributes', $attributes);
    }

    /**
     * Add a CSSResourceVersionAttribute.
     *
     * @param CSSResourceVersionAttribute
     * @return $this
     */
    public function addAttribute(CSSResourceVersionAttribute $model)
    {
        if (!isset($this->data['Attributes'])) {
            $this->data['Attributes'] = [];
        }

        $this->data['Attributes'][] = $model;

        return $this;
    }
}
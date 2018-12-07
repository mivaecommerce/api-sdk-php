<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Model;

/**
 * Data model for OrderCustomField.
 *
 * @package MerchantAPI\Model
 */
class OrderCustomField extends \MerchantAPI\Model
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

        if (isset($data['module'])) {
            if ($data['module'] instanceof Module) {
                $this->setField('module', $data['module']);
            } else if (is_array($data['module'])) {
                $this->setField('module', new Module($data['module']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Module or an array but got %s',
                    is_object($data['module']) ?
                        get_class($data['module']) : gettype($data['module'])));
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
        if (isset($data['module'])) {
            if ($this->data['module'] instanceof Module) {
                $this->data['module'] = clone $this->data['module'];
            }
        }
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
    }

    /**
     * Get searchable.
     *
     * @return bool
     */
    public function getSearchable()
    {
        return (bool) $this->getField('searchable', false);
    }

    /**
     * Get sortable.
     *
     * @return bool
     */
    public function getSortable()
    {
        return (bool) $this->getField('sortable', false);
    }

    /**
     * Get module.
     *
     * @return \MerchantAPI\Model\Module|null
     */
    public function getModule()
    {
        return $this->getField('module', null);
    }

    /**
     * Get choices.
     *
     * @return array
     */
    public function getChoices()
    {
        return $this->getField('choices', []);
    }

    /**
     * Set code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        return $this->setField('code', $code);
    }

    /**
     * Set name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        return $this->setField('name', $name);
    }

    /**
     * Set type.
     *
     * @param string
     * @return $this
     */
    public function setType($type)
    {
        return $this->setField('type', $type);
    }

    /**
     * Set searchable.
     *
     * @param bool
     * @return $this
     */
    public function setSearchable($searchable)
    {
        return $this->setField('searchable', $searchable);
    }

    /**
     * Set sortable.
     *
     * @param bool
     * @return $this
     */
    public function setSortable($sortable)
    {
        return $this->setField('sortable', $sortable);
    }

    /**
     * Set module.
     *
     * @param array|Module
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setModule($module)
    {
        if (is_array($module)) {
            return $this->setField('module', new Module($module));
        } else if ($module instanceof Module || is_null($module)) {
            return $this->setField('module', $module);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of Module, or null but got %s',
                is_object($module) ? get_class($module) : gettype($module)));
        }
    }

    /**
     * Set choices.
     *
     * @param array
     * @return $this
     */
    public function setChoices(array $choices)
    {
        return $this->setField('choices', $choices);
    }
}
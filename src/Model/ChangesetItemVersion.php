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
 * Data model for ChangesetItemVersion.
 *
 * @package MerchantAPI\Model
 */
class ChangesetItemVersion extends \MerchantAPI\Model
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
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get mod_code.
     *
     * @return ?string
     */
    public function getModuleCode() : ?string
    {
        return $this->getField('mod_code');
    }

    /**
     * Get module.
     *
     * @return ?\MerchantAPI\Model\Module
     */
    public function getModule() : ?Module
    {
        return $this->getField('module');
    }
}
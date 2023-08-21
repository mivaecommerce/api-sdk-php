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
 * Data model for ModuleChange.
 *
 * @package MerchantAPI\Model
 */
class ModuleChange extends \MerchantAPI\Model
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

        if (isset($data['Module_Data'])) {
            if ($data['Module_Data'] instanceof VariableValue) {
                $this->setField('Module_Data', $data['Module_Data']);
            } else {
                $this->setField('Module_Data', new VariableValue($data['Module_Data']));
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
        if (isset($data['Module_Data'])) {
            if ($this->data['Module_Data'] instanceof VariableValue) {
                $this->data['Module_Data'] = clone $this->data['Module_Data'];
            }
        }
    }

    /**
     * Get Module_Code.
     *
     * @return ?string
     */
    public function getModuleCode() : ?string
    {
        return $this->getField('Module_Code');
    }

    /**
     * Get Module_Operation.
     *
     * @return ?string
     */
    public function getModuleOperation() : ?string
    {
        return $this->getField('Module_Operation');
    }

    /**
     * Get Module_Data.
     *
     * @return ?\MerchantAPI\Model\VariableValue
     */
    public function getModuleData() : ?VariableValue
    {
        return $this->getField('Module_Data');
    }

    /**
     * Set Module_Code.
     *
     * @param ?string $moduleCode
     * @return $this
     */
    public function setModuleCode(?string $moduleCode) : self
    {
        return $this->setField('Module_Code', $moduleCode);
    }

    /**
     * Set Module_Operation.
     *
     * @param ?string $moduleOperation
     * @return $this
     */
    public function setModuleOperation(?string $moduleOperation) : self
    {
        return $this->setField('Module_Operation', $moduleOperation);
    }
    /**
     * Set Module_Data.
     *
     * @param mixed $moduleData
     * @return $this
     */
    public function setModuleData($moduleData) : self
    {
        if ($moduleData instanceof VariableValue) {
            return $this->setField('Module_Data', $moduleData);
        }

        return $this->setField('Module_Data', new VariableValue($moduleData));
    }
}
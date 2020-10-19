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
 * Data model for ReceivedReturn.
 *
 * @package MerchantAPI\Model
 */
class ReceivedReturn extends \MerchantAPI\Model
{
    /**
     * Get return_id.
     *
     * @return int
     */
    public function getReturnId()
    {
        return (int) $this->getField('return_id', 0);
    }

    /**
     * Get adjust_inventory.
     *
     * @return int
     */
    public function getAdjustInventory()
    {
        return (int) $this->getField('adjust_inventory', 0);
    }

    /**
     * Set return_id.
     *
     * @param int
     * @return $this
     */
    public function setReturnId($returnId)
    {
        return $this->setField('return_id', $returnId);
    }

    /**
     * Set adjust_inventory.
     *
     * @param int
     * @return $this
     */
    public function setAdjustInventory($adjustInventory)
    {
        return $this->setField('adjust_inventory', $adjustInventory);
    }
}
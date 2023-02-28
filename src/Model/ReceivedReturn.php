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
     * @return ?int
     */
    public function getReturnId() : ?int
    {
        return $this->getField('return_id');
    }

    /**
     * Get adjust_inventory.
     *
     * @return ?int
     */
    public function getAdjustInventory() : ?int
    {
        return $this->getField('adjust_inventory');
    }

    /**
     * Set return_id.
     *
     * @param ?int $returnId
     * @return $this
     */
    public function setReturnId(?int $returnId) : self
    {
        return $this->setField('return_id', $returnId);
    }

    /**
     * Set adjust_inventory.
     *
     * @param ?int $adjustInventory
     * @return $this
     */
    public function setAdjustInventory(?int $adjustInventory) : self
    {
        return $this->setField('adjust_inventory', $adjustInventory);
    }
}
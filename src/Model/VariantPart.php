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
 * Data model for VariantPart.
 *
 * @package MerchantAPI\Model
 */
class VariantPart extends \MerchantAPI\Model
{
    /**
     * Get part_id.
     *
     * @return int
     */
    public function getPartId()
    {
        return (int) $this->getField('part_id', 0);
    }

    /**
     * Get part_code.
     *
     * @return string
     */
    public function getPartCode()
    {
        return $this->getField('part_code');
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return (int) $this->getField('quantity', 0);
    }

    /**
     * Set part_id.
     *
     * @param int
     * @return $this
     */
    public function setPartId($partId)
    {
        return $this->setField('part_id', $partId);
    }

    /**
     * Set part_code.
     *
     * @param string
     * @return $this
     */
    public function setPartCode($partCode)
    {
        return $this->setField('part_code', $partCode);
    }

    /**
     * Set quantity.
     *
     * @param int
     * @return $this
     */
    public function setQuantity($quantity)
    {
        return $this->setField('quantity', $quantity);
    }
}
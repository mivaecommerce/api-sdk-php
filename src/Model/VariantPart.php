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
     * @return ?int
     */
    public function getPartId() : ?int
    {
        return $this->getField('part_id');
    }

    /**
     * Get part_code.
     *
     * @return ?string
     */
    public function getPartCode() : ?string
    {
        return $this->getField('part_code');
    }

    /**
     * Get quantity.
     *
     * @return ?int
     */
    public function getQuantity() : ?int
    {
        return $this->getField('quantity');
    }

    /**
     * Set part_id.
     *
     * @param ?int $partId
     * @return $this
     */
    public function setPartId(?int $partId) : self
    {
        return $this->setField('part_id', $partId);
    }

    /**
     * Set part_code.
     *
     * @param ?string $partCode
     * @return $this
     */
    public function setPartCode(?string $partCode) : self
    {
        return $this->setField('part_code', $partCode);
    }

    /**
     * Set quantity.
     *
     * @param ?int $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity) : self
    {
        return $this->setField('quantity', $quantity);
    }
}
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
 * Data model for OrderCharge.
 *
 * @package MerchantAPI\Model
 */
class OrderCharge extends \MerchantAPI\Model
{
    /**
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get charge_id.
     *
     * @return ?int
     */
    public function getChargeId() : ?int
    {
        return $this->getField('charge_id');
    }

    /**
     * Get module_id.
     *
     * @return ?int
     */
    public function getModuleId() : ?int
    {
        return $this->getField('module_id');
    }

    /**
     * Get type.
     *
     * @return ?string
     */
    public function getType() : ?string
    {
        return $this->getField('type');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get amount.
     *
     * @return ?float
     */
    public function getAmount() : ?float
    {
        return $this->getField('amount');
    }

    /**
     * Get formatted_amount.
     *
     * @return ?string
     */
    public function getFormattedAmount() : ?string
    {
        return $this->getField('formatted_amount');
    }

    /**
     * Get disp_amt.
     *
     * @return ?float
     */
    public function getDisplayAmount() : ?float
    {
        return $this->getField('disp_amt');
    }

    /**
     * Get formatted_disp_amt.
     *
     * @return ?string
     */
    public function getFormattedDisplayAmount() : ?string
    {
        return $this->getField('formatted_disp_amt');
    }

    /**
     * Get tax_exempt.
     *
     * @return ?bool
     */
    public function getTaxExempt() : ?bool
    {
        return $this->getField('tax_exempt');
    }

    /**
     * Get tax.
     *
     * @return ?float
     */
    public function getTax() : ?float
    {
        return $this->getField('tax');
    }

    /**
     * Get formatted_tax.
     *
     * @return ?string
     */
    public function getFormattedTax() : ?string
    {
        return $this->getField('formatted_tax');
    }

    /**
     * Set type.
     *
     * @param ?string $type
     * @return $this
     */
    public function setType(?string $type) : self
    {
        return $this->setField('type', $type);
    }

    /**
     * Set descrip.
     *
     * @param ?string $description
     * @return $this
     */
    public function setDescription(?string $description) : self
    {
        return $this->setField('descrip', $description);
    }

    /**
     * Set amount.
     *
     * @param ?float $amount
     * @return $this
     */
    public function setAmount(?float $amount) : self
    {
        return $this->setField('amount', $amount);
    }

    /**
     * Set disp_amt.
     *
     * @param ?float $displayAmount
     * @return $this
     */
    public function setDisplayAmount(?float $displayAmount) : self
    {
        return $this->setField('disp_amt', $displayAmount);
    }

    /**
     * Set tax_exempt.
     *
     * @param ?bool $taxExempt
     * @return $this
     */
    public function setTaxExempt(?bool $taxExempt) : self
    {
        return $this->setField('tax_exempt', $taxExempt);
    }
}
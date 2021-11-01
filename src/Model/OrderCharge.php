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
     * @return int
     */
    public function getOrderId()
    {
        return (int) $this->getField('order_id', 0);
    }

    /**
     * Get charge_id.
     *
     * @return int
     */
    public function getChargeId()
    {
        return (int) $this->getField('charge_id', 0);
    }

    /**
     * Get module_id.
     *
     * @return int
     */
    public function getModuleId()
    {
        return (int) $this->getField('module_id', 0);
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
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return (float) $this->getField('amount', 0.00);
    }

    /**
     * Get formatted_amount.
     *
     * @return string
     */
    public function getFormattedAmount()
    {
        return $this->getField('formatted_amount');
    }

    /**
     * Get disp_amt.
     *
     * @return float
     */
    public function getDisplayAmount()
    {
        return (float) $this->getField('disp_amt', 0.00);
    }

    /**
     * Get formatted_disp_amt.
     *
     * @return string
     */
    public function getFormattedDisplayAmount()
    {
        return $this->getField('formatted_disp_amt');
    }

    /**
     * Get tax_exempt.
     *
     * @return bool
     */
    public function getTaxExempt()
    {
        return (bool) $this->getField('tax_exempt', false);
    }

    /**
     * Get tax.
     *
     * @return float
     */
    public function getTax()
    {
        return (float) $this->getField('tax', 0.00);
    }

    /**
     * Get formatted_tax.
     *
     * @return string
     */
    public function getFormattedTax()
    {
        return $this->getField('formatted_tax');
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
     * Set descrip.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setField('descrip', $description);
    }

    /**
     * Set amount.
     *
     * @param float
     * @return $this
     */
    public function setAmount($amount)
    {
        return $this->setField('amount', $amount);
    }

    /**
     * Set disp_amt.
     *
     * @param float
     * @return $this
     */
    public function setDisplayAmount($displayAmount)
    {
        return $this->setField('disp_amt', $displayAmount);
    }

    /**
     * Set tax_exempt.
     *
     * @param bool
     * @return $this
     */
    public function setTaxExempt($taxExempt)
    {
        return $this->setField('tax_exempt', $taxExempt);
    }
}
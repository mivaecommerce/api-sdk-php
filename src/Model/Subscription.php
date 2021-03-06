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
 * Data model for Subscription.
 *
 * @package MerchantAPI\Model
 */
class Subscription extends \MerchantAPI\Model
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

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
     * Get line_id.
     *
     * @return int
     */
    public function getLineId()
    {
        return (int) $this->getField('line_id', 0);
    }

    /**
     * Get cust_id.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return (int) $this->getField('cust_id', 0);
    }

    /**
     * Get custpc_id.
     *
     * @return int
     */
    public function getCustomerPaymentCardId()
    {
        return (int) $this->getField('custpc_id', 0);
    }

    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get subterm_id.
     *
     * @return int
     */
    public function getSubscriptionTermId()
    {
        return (int) $this->getField('subterm_id', 0);
    }

    /**
     * Get addr_id.
     *
     * @return int
     */
    public function getAddressId()
    {
        return (int) $this->getField('addr_id', 0);
    }

    /**
     * Get ship_id.
     *
     * @return int
     */
    public function getShipId()
    {
        return (int) $this->getField('ship_id', 0);
    }

    /**
     * Get ship_data.
     *
     * @return string
     */
    public function getShipData()
    {
        return $this->getField('ship_data');
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
     * Get termrem.
     *
     * @return int
     */
    public function getTermRemaining()
    {
        return (int) $this->getField('termrem', 0);
    }

    /**
     * Get termproc.
     *
     * @return int
     */
    public function getTermProcessed()
    {
        return (int) $this->getField('termproc', 0);
    }

    /**
     * Get firstdate.
     *
     * @return int
     */
    public function getFirstDate()
    {
        return (int) $this->getField('firstdate', 0);
    }

    /**
     * Get lastdate.
     *
     * @return int
     */
    public function getLastDate()
    {
        return (int) $this->getField('lastdate', 0);
    }

    /**
     * Get nextdate.
     *
     * @return int
     */
    public function getNextDate()
    {
        return (int) $this->getField('nextdate', 0);
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getField('status');
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getField('message');
    }

    /**
     * Get cncldate.
     *
     * @return string
     */
    public function getCancelDate()
    {
        return $this->getField('cncldate');
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
     * Get shipping.
     *
     * @return float
     */
    public function getShipping()
    {
        return (float) $this->getField('shipping', 0.00);
    }

    /**
     * Get formatted_shipping.
     *
     * @return string
     */
    public function getFormattedShipping()
    {
        return $this->getField('formatted_shipping');
    }

    /**
     * Get subtotal.
     *
     * @return float
     */
    public function getSubtotal()
    {
        return (float) $this->getField('subtotal', 0.00);
    }

    /**
     * Get formatted_subtotal.
     *
     * @return string
     */
    public function getFormattedSubtotal()
    {
        return $this->getField('formatted_subtotal');
    }

    /**
     * Get total.
     *
     * @return float
     */
    public function getTotal()
    {
        return (float) $this->getField('total', 0.00);
    }

    /**
     * Get formatted_total.
     *
     * @return string
     */
    public function getFormattedTotal()
    {
        return $this->getField('formatted_total');
    }
}
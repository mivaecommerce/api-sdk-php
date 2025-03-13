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
 * Data model for BaseSubscription.
 *
 * @package MerchantAPI\Model
 */
class BaseSubscription extends \MerchantAPI\Model
{
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
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get line_id.
     *
     * @return ?int
     */
    public function getLineId() : ?int
    {
        return $this->getField('line_id');
    }

    /**
     * Get cust_id.
     *
     * @return ?int
     */
    public function getCustomerId() : ?int
    {
        return $this->getField('cust_id');
    }

    /**
     * Get custpc_id.
     *
     * @return ?int
     */
    public function getCustomerPaymentCardId() : ?int
    {
        return $this->getField('custpc_id');
    }

    /**
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get subterm_id.
     *
     * @return ?int
     */
    public function getSubscriptionTermId() : ?int
    {
        return $this->getField('subterm_id');
    }

    /**
     * Get addr_id.
     *
     * @return ?int
     */
    public function getAddressId() : ?int
    {
        return $this->getField('addr_id');
    }

    /**
     * Get ship_id.
     *
     * @return ?int
     */
    public function getShipId() : ?int
    {
        return $this->getField('ship_id');
    }

    /**
     * Get ship_data.
     *
     * @return ?string
     */
    public function getShipData() : ?string
    {
        return $this->getField('ship_data');
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
     * Get termrem.
     *
     * @return ?int
     */
    public function getTermRemaining() : ?int
    {
        return $this->getField('termrem');
    }

    /**
     * Get termproc.
     *
     * @return ?int
     */
    public function getTermProcessed() : ?int
    {
        return $this->getField('termproc');
    }

    /**
     * Get firstdate.
     *
     * @return ?int
     */
    public function getFirstDate() : ?int
    {
        return $this->getTimestampField('firstdate');
    }

    /**
     * Get lastdate.
     *
     * @return ?int
     */
    public function getLastDate() : ?int
    {
        return $this->getTimestampField('lastdate');
    }

    /**
     * Get nextdate.
     *
     * @return ?int
     */
    public function getNextDate() : ?int
    {
        return $this->getTimestampField('nextdate');
    }

    /**
     * Get status.
     *
     * @return ?string
     */
    public function getStatus() : ?string
    {
        return $this->getField('status');
    }

    /**
     * Get message.
     *
     * @return ?string
     */
    public function getMessage() : ?string
    {
        return $this->getField('message');
    }

    /**
     * Get cncldate.
     *
     * @return ?int
     */
    public function getCancelDate() : ?int
    {
        return $this->getTimestampField('cncldate');
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
     * Get shipping.
     *
     * @return ?float
     */
    public function getShipping() : ?float
    {
        return $this->getField('shipping');
    }

    /**
     * Get formatted_shipping.
     *
     * @return ?string
     */
    public function getFormattedShipping() : ?string
    {
        return $this->getField('formatted_shipping');
    }

    /**
     * Get subtotal.
     *
     * @return ?float
     */
    public function getSubtotal() : ?float
    {
        return $this->getField('subtotal');
    }

    /**
     * Get formatted_subtotal.
     *
     * @return ?string
     */
    public function getFormattedSubtotal() : ?string
    {
        return $this->getField('formatted_subtotal');
    }

    /**
     * Get total.
     *
     * @return ?float
     */
    public function getTotal() : ?float
    {
        return $this->getField('total');
    }

    /**
     * Get formatted_total.
     *
     * @return ?string
     */
    public function getFormattedTotal() : ?string
    {
        return $this->getField('formatted_total');
    }

    /**
     * Get authfails.
     *
     * @return ?int
     */
    public function getAuthorizationFailureCount() : ?int
    {
        return $this->getField('authfails');
    }

    /**
     * Get lastafail.
     *
     * @return ?int
     */
    public function getLastAuthorizationFailure() : ?int
    {
        return $this->getTimestampField('lastafail');
    }
}
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
 * Data model for ProductSubscriptionSettings.
 *
 * @package MerchantAPI\Model
 */
class ProductSubscriptionSettings extends \MerchantAPI\Model
{
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
     * Get enabled.
     *
     * @return ?bool
     */
    public function getEnabled() : ?bool
    {
        return $this->getField('enabled');
    }

    /**
     * Get mandatory.
     *
     * @return ?bool
     */
    public function getMandatory() : ?bool
    {
        return $this->getField('mandatory');
    }

    /**
     * Get can_cancel.
     *
     * @return ?bool
     */
    public function getCanCancel() : ?bool
    {
        return $this->getField('can_cancel');
    }

    /**
     * Get cncl_min.
     *
     * @return ?int
     */
    public function getCancelMinimumRequiredOrders() : ?int
    {
        return $this->getField('cncl_min');
    }

    /**
     * Get can_qty.
     *
     * @return ?bool
     */
    public function getCanChangeQuantities() : ?bool
    {
        return $this->getField('can_qty');
    }

    /**
     * Get qty_min.
     *
     * @return ?int
     */
    public function getQuantitiesMinimumRequiredOrders() : ?int
    {
        return $this->getField('qty_min');
    }

    /**
     * Get can_term.
     *
     * @return ?bool
     */
    public function getCanChangeTerm() : ?bool
    {
        return $this->getField('can_term');
    }

    /**
     * Get term_min.
     *
     * @return ?int
     */
    public function getTermMinimumRequiredOrders() : ?int
    {
        return $this->getField('term_min');
    }

    /**
     * Get can_date.
     *
     * @return ?bool
     */
    public function getCanChangeNextDeliveryDate() : ?bool
    {
        return $this->getField('can_date');
    }

    /**
     * Get date_min.
     *
     * @return ?int
     */
    public function getNextDeliveryDateMinimumRequiredOrders() : ?int
    {
        return $this->getField('date_min');
    }
}
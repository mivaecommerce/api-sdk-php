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
 * Data model for CopyProductRule.
 *
 * @package MerchantAPI\Model
 */
class CopyProductRule extends \MerchantAPI\Model
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
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get product.
     *
     * @return ?bool
     */
    public function getCoreProductData() : ?bool
    {
        return $this->getField('product');
    }

    /**
     * Get attributes.
     *
     * @return ?bool
     */
    public function getAttributes() : ?bool
    {
        return $this->getField('attributes');
    }

    /**
     * Get categories.
     *
     * @return ?bool
     */
    public function getCategoryAssignments() : ?bool
    {
        return $this->getField('categories');
    }

    /**
     * Get invset.
     *
     * @return ?bool
     */
    public function getInventorySettings() : ?bool
    {
        return $this->getField('invset');
    }

    /**
     * Get invlevel.
     *
     * @return ?bool
     */
    public function getInventoryLevel() : ?bool
    {
        return $this->getField('invlevel');
    }

    /**
     * Get images.
     *
     * @return ?bool
     */
    public function getImages() : ?bool
    {
        return $this->getField('images');
    }

    /**
     * Get relprod.
     *
     * @return ?bool
     */
    public function getRelatedProducts() : ?bool
    {
        return $this->getField('relprod');
    }

    /**
     * Get upsale.
     *
     * @return ?bool
     */
    public function getUpsale() : ?bool
    {
        return $this->getField('upsale');
    }

    /**
     * Get availgroup.
     *
     * @return ?bool
     */
    public function getAvailabilityGroupAssignments() : ?bool
    {
        return $this->getField('availgroup');
    }

    /**
     * Get pricegroup.
     *
     * @return ?bool
     */
    public function getPriceGroupAssignments() : ?bool
    {
        return $this->getField('pricegroup');
    }

    /**
     * Get ddownload.
     *
     * @return ?bool
     */
    public function getDigitalDownloadSettings() : ?bool
    {
        return $this->getField('ddownload');
    }

    /**
     * Get giftcert.
     *
     * @return ?bool
     */
    public function getGiftCertificateSales() : ?bool
    {
        return $this->getField('giftcert');
    }

    /**
     * Get subscrip.
     *
     * @return ?bool
     */
    public function getSubscriptionSettings() : ?bool
    {
        return $this->getField('subscrip');
    }

    /**
     * Get payment.
     *
     * @return ?bool
     */
    public function getPaymentRules() : ?bool
    {
        return $this->getField('payment');
    }

    /**
     * Get shipping.
     *
     * @return ?bool
     */
    public function getShippingRules() : ?bool
    {
        return $this->getField('shipping');
    }

    /**
     * Get kit.
     *
     * @return ?bool
     */
    public function getProductKits() : ?bool
    {
        return $this->getField('kit');
    }

    /**
     * Get variants.
     *
     * @return ?bool
     */
    public function getProductVariants() : ?bool
    {
        return $this->getField('variants');
    }
}
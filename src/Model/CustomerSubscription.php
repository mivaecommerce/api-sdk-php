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
 * Data model for CustomerSubscription.
 *
 * @package MerchantAPI\Model
 */
class CustomerSubscription extends Subscription
{
    /**
     * Get frequency.
     *
     * @return ?string
     */
    public function getFrequency() : ?string
    {
        return $this->getField('frequency');
    }

    /**
     * Get term.
     *
     * @return ?int
     */
    public function getTerm() : ?int
    {
        return $this->getField('term');
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
     * Get n.
     *
     * @return ?int
     */
    public function getN() : ?int
    {
        return $this->getField('n');
    }

    /**
     * Get fixed_dow.
     *
     * @return ?int
     */
    public function getFixedDayOfWeek() : ?int
    {
        return $this->getField('fixed_dow');
    }

    /**
     * Get fixed_dom.
     *
     * @return ?int
     */
    public function getFixedDayOfMonth() : ?int
    {
        return $this->getField('fixed_dom');
    }

    /**
     * Get sub_count.
     *
     * @return ?int
     */
    public function getSubscriptionCount() : ?int
    {
        return $this->getField('sub_count');
    }

    /**
     * Get method.
     *
     * @return ?string
     */
    public function getMethod() : ?string
    {
        return $this->getField('method');
    }

    /**
     * Get product_code.
     *
     * @return ?string
     */
    public function getProductCode() : ?string
    {
        return $this->getField('product_code');
    }

    /**
     * Get product_name.
     *
     * @return ?string
     */
    public function getProductName() : ?string
    {
        return $this->getField('product_name');
    }

    /**
     * Get product_sku.
     *
     * @return ?string
     */
    public function getProductSku() : ?string
    {
        return $this->getField('product_sku');
    }

    /**
     * Get product_price.
     *
     * @return ?float
     */
    public function getProductPrice() : ?float
    {
        return $this->getField('product_price');
    }

    /**
     * Get product_formatted_price.
     *
     * @return ?string
     */
    public function getProductFormattedPrice() : ?string
    {
        return $this->getField('product_formatted_price');
    }

    /**
     * Get product_cost.
     *
     * @return ?float
     */
    public function getProductCost() : ?float
    {
        return $this->getField('product_cost');
    }

    /**
     * Get product_formatted_cost.
     *
     * @return ?string
     */
    public function getProductFormattedCost() : ?string
    {
        return $this->getField('product_formatted_cost');
    }

    /**
     * Get product_weight.
     *
     * @return ?float
     */
    public function getProductWeight() : ?float
    {
        return $this->getField('product_weight');
    }

    /**
     * Get product_taxable.
     *
     * @return ?bool
     */
    public function getProductTaxable() : ?bool
    {
        return $this->getField('product_taxable');
    }

    /**
     * Get product_thumbnail.
     *
     * @return ?string
     */
    public function getProductThumbnail() : ?string
    {
        return $this->getField('product_thumbnail');
    }

    /**
     * Get product_image.
     *
     * @return ?string
     */
    public function getProductImage() : ?string
    {
        return $this->getField('product_image');
    }

    /**
     * Get product_active.
     *
     * @return ?bool
     */
    public function getProductActive() : ?bool
    {
        return $this->getField('product_active');
    }

    /**
     * Get product_dt_created.
     *
     * @return ?int
     */
    public function getProductDateTimeCreated() : ?int
    {
        return $this->getTimestampField('product_dt_created');
    }

    /**
     * Get product_dt_updated.
     *
     * @return ?int
     */
    public function getProductDateTimeUpdated() : ?int
    {
        return $this->getTimestampField('product_dt_updated');
    }

    /**
     * Get product_page_title.
     *
     * @return ?string
     */
    public function getProductPageTitle() : ?string
    {
        return $this->getField('product_page_title');
    }

    /**
     * Get product_page_id.
     *
     * @return ?int
     */
    public function getProductPageId() : ?int
    {
        return $this->getField('product_page_id');
    }

    /**
     * Get product_page_code.
     *
     * @return ?string
     */
    public function getProductPageCode() : ?string
    {
        return $this->getField('product_page_code');
    }

    /**
     * Get product_cancat_id.
     *
     * @return ?int
     */
    public function getProductCanonicalCategoryId() : ?int
    {
        return $this->getField('product_cancat_id');
    }

    /**
     * Get product_cancat_code.
     *
     * @return ?string
     */
    public function getProductCanonicalCategoryCode() : ?string
    {
        return $this->getField('product_cancat_code');
    }

    /**
     * Get product_inventory_active.
     *
     * @return ?bool
     */
    public function getProductInventoryActive() : ?bool
    {
        return $this->getField('product_inventory_active');
    }

    /**
     * Get product_inventory.
     *
     * @return ?int
     */
    public function getProductInventory() : ?int
    {
        return $this->getField('product_inventory');
    }

    /**
     * Get imagetypes.
     *
     * @return array
     */
    public function getImageTypes() : ?array
    {
        return $this->getField('image_types');
    }

    /**
     * Get paymentcard_lastfour.
     *
     * @return ?string
     */
    public function getPaymentCardLastFour() : ?string
    {
        return $this->getField('paymentcard_lastfour');
    }

    /**
     * Get paymentcard_type.
     *
     * @return ?string
     */
    public function getPaymentCardType() : ?string
    {
        return $this->getField('paymentcard_type');
    }

    /**
     * Get address_descrip.
     *
     * @return ?string
     */
    public function getAddressDescription() : ?string
    {
        return $this->getField('address_descrip');
    }

    /**
     * Get address_fname.
     *
     * @return ?string
     */
    public function getAddressFirstName() : ?string
    {
        return $this->getField('address_fname');
    }

    /**
     * Get address_lname.
     *
     * @return ?string
     */
    public function getAddressLastName() : ?string
    {
        return $this->getField('address_lname');
    }

    /**
     * Get address_email.
     *
     * @return ?string
     */
    public function getAddressEmail() : ?string
    {
        return $this->getField('address_email');
    }

    /**
     * Get address_comp.
     *
     * @return ?string
     */
    public function getAddressCompany() : ?string
    {
        return $this->getField('address_comp');
    }

    /**
     * Get address_phone.
     *
     * @return ?string
     */
    public function getAddressPhone() : ?string
    {
        return $this->getField('address_phone');
    }

    /**
     * Get address_fax.
     *
     * @return ?string
     */
    public function getAddressFax() : ?string
    {
        return $this->getField('address_fax');
    }

    /**
     * Get address_addr.
     *
     * @return ?string
     */
    public function getAddressAddress() : ?string
    {
        return $this->getField('address_addr');
    }

    /**
     * Get address_addr1.
     *
     * @return ?string
     */
    public function getAddressAddress1() : ?string
    {
        return $this->getField('address_addr1');
    }

    /**
     * Get address_addr2.
     *
     * @return ?string
     */
    public function getAddressAddress2() : ?string
    {
        return $this->getField('address_addr2');
    }

    /**
     * Get address_city.
     *
     * @return ?string
     */
    public function getAddressCity() : ?string
    {
        return $this->getField('address_city');
    }

    /**
     * Get address_state.
     *
     * @return ?string
     */
    public function getAddressState() : ?string
    {
        return $this->getField('address_state');
    }

    /**
     * Get address_zip.
     *
     * @return ?string
     */
    public function getAddressZip() : ?string
    {
        return $this->getField('address_zip');
    }

    /**
     * Get address_cntry.
     *
     * @return ?string
     */
    public function getAddressCountry() : ?string
    {
        return $this->getField('address_cntry');
    }

    /**
     * Get address_resdntl.
     *
     * @return ?bool
     */
    public function getAddressResidential() : ?bool
    {
        return $this->getField('address_resdntl');
    }

    /**
     * Get customer_login.
     *
     * @return ?string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->getField('customer_login');
    }

    /**
     * Get customer_pw_email.
     *
     * @return ?string
     */
    public function getCustomerPasswordEmail() : ?string
    {
        return $this->getField('customer_pw_email');
    }

    /**
     * Get customer_business_title.
     *
     * @return ?string
     */
    public function getCustomerBusinessTitle() : ?string
    {
        return $this->getField('customer_business_title');
    }
}
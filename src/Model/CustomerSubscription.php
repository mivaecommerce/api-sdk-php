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
     * @return string
     */
    public function getFrequency()
    {
        return $this->getField('frequency');
    }

    /**
     * Get term.
     *
     * @return int
     */
    public function getTerm()
    {
        return (int) $this->getField('term', 0);
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
     * Get n.
     *
     * @return int
     */
    public function getN()
    {
        return (int) $this->getField('n', 0);
    }

    /**
     * Get fixed_dow.
     *
     * @return int
     */
    public function getFixedDayOfWeek()
    {
        return (int) $this->getField('fixed_dow', 0);
    }

    /**
     * Get fixed_dom.
     *
     * @return int
     */
    public function getFixedDayOfMonth()
    {
        return (int) $this->getField('fixed_dom', 0);
    }

    /**
     * Get sub_count.
     *
     * @return int
     */
    public function getSubscriptionCount()
    {
        return (int) $this->getField('sub_count', 0);
    }

    /**
     * Get method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->getField('method');
    }

    /**
     * Get product_code.
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->getField('product_code');
    }

    /**
     * Get product_name.
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->getField('product_name');
    }

    /**
     * Get product_sku.
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->getField('product_sku');
    }

    /**
     * Get product_price.
     *
     * @return float
     */
    public function getProductPrice()
    {
        return (float) $this->getField('product_price', 0.00);
    }

    /**
     * Get product_formatted_price.
     *
     * @return string
     */
    public function getProductFormattedPrice()
    {
        return $this->getField('product_formatted_price');
    }

    /**
     * Get product_cost.
     *
     * @return float
     */
    public function getProductCost()
    {
        return (float) $this->getField('product_cost', 0.00);
    }

    /**
     * Get product_formatted_cost.
     *
     * @return string
     */
    public function getProductFormattedCost()
    {
        return $this->getField('product_formatted_cost');
    }

    /**
     * Get product_weight.
     *
     * @return float
     */
    public function getProductWeight()
    {
        return (float) $this->getField('product_weight', 0.00);
    }

    /**
     * Get product_taxable.
     *
     * @return bool
     */
    public function getProductTaxable()
    {
        return (bool) $this->getField('product_taxable', false);
    }

    /**
     * Get product_thumbnail.
     *
     * @return string
     */
    public function getProductThumbnail()
    {
        return $this->getField('product_thumbnail');
    }

    /**
     * Get product_image.
     *
     * @return string
     */
    public function getProductImage()
    {
        return $this->getField('product_image');
    }

    /**
     * Get product_active.
     *
     * @return bool
     */
    public function getProductActive()
    {
        return (bool) $this->getField('product_active', false);
    }

    /**
     * Get product_dt_created.
     *
     * @return int
     */
    public function getProductDateTimeCreated()
    {
        return (int) $this->getField('product_dt_created', 0);
    }

    /**
     * Get product_dt_updated.
     *
     * @return int
     */
    public function getProductDateTimeUpdated()
    {
        return (int) $this->getField('product_dt_updated', 0);
    }

    /**
     * Get product_page_title.
     *
     * @return string
     */
    public function getProductPageTitle()
    {
        return $this->getField('product_page_title');
    }

    /**
     * Get product_page_id.
     *
     * @return int
     */
    public function getProductPageId()
    {
        return (int) $this->getField('product_page_id', 0);
    }

    /**
     * Get product_page_code.
     *
     * @return string
     */
    public function getProductPageCode()
    {
        return $this->getField('product_page_code');
    }

    /**
     * Get product_cancat_id.
     *
     * @return int
     */
    public function getProductCanonicalCategoryId()
    {
        return (int) $this->getField('product_cancat_id', 0);
    }

    /**
     * Get product_cancat_code.
     *
     * @return string
     */
    public function getProductCanonicalCategoryCode()
    {
        return $this->getField('product_cancat_code');
    }

    /**
     * Get product_inventory_active.
     *
     * @return bool
     */
    public function getProductInventoryActive()
    {
        return (bool) $this->getField('product_inventory_active', false);
    }

    /**
     * Get product_inventory.
     *
     * @return int
     */
    public function getProductInventory()
    {
        return (int) $this->getField('product_inventory', 0);
    }

    /**
     * Get imagetypes.
     *
     * @return array
     */
    public function getImageTypes()
    {
        return $this->getField('image_types');
    }

    /**
     * Get paymentcard_lastfour.
     *
     * @return string
     */
    public function getPaymentCardLastFour()
    {
        return $this->getField('paymentcard_lastfour');
    }

    /**
     * Get paymentcard_type.
     *
     * @return string
     */
    public function getPaymentCardType()
    {
        return $this->getField('paymentcard_type');
    }

    /**
     * Get address_descrip.
     *
     * @return string
     */
    public function getAddressDescrip()
    {
        return $this->getField('address_descrip');
    }

    /**
     * Get address_fname.
     *
     * @return string
     */
    public function getAddressFirstName()
    {
        return $this->getField('address_fname');
    }

    /**
     * Get address_lname.
     *
     * @return string
     */
    public function getAddressLastName()
    {
        return $this->getField('address_lname');
    }

    /**
     * Get address_email.
     *
     * @return string
     */
    public function getAddressEmail()
    {
        return $this->getField('address_email');
    }

    /**
     * Get address_comp.
     *
     * @return string
     */
    public function getAddressCompany()
    {
        return $this->getField('address_comp');
    }

    /**
     * Get address_phone.
     *
     * @return string
     */
    public function getAddressPhone()
    {
        return $this->getField('address_phone');
    }

    /**
     * Get address_fax.
     *
     * @return string
     */
    public function getAddressFax()
    {
        return $this->getField('address_fax');
    }

    /**
     * Get address_addr.
     *
     * @return string
     */
    public function getAddressAdress()
    {
        return $this->getField('address_addr');
    }

    /**
     * Get address_addr1.
     *
     * @return string
     */
    public function getAddressAddress_1()
    {
        return $this->getField('address_addr1');
    }

    /**
     * Get address_addr2.
     *
     * @return string
     */
    public function getAddressAddress_2()
    {
        return $this->getField('address_addr2');
    }

    /**
     * Get address_city.
     *
     * @return string
     */
    public function getAddressCity()
    {
        return $this->getField('address_city');
    }

    /**
     * Get address_state.
     *
     * @return string
     */
    public function getAddressState()
    {
        return $this->getField('address_state');
    }

    /**
     * Get address_zip.
     *
     * @return string
     */
    public function getAddressZip()
    {
        return $this->getField('address_zip');
    }

    /**
     * Get address_cntry.
     *
     * @return string
     */
    public function getAddressCountry()
    {
        return $this->getField('address_cntry');
    }

    /**
     * Get address_resdntl.
     *
     * @return bool
     */
    public function getAddressResidential()
    {
        return (bool) $this->getField('address_resdntl', false);
    }

    /**
     * Get customer_login.
     *
     * @return string
     */
    public function getCustomerLogin()
    {
        return $this->getField('customer_login');
    }

    /**
     * Get customer_pw_email.
     *
     * @return string
     */
    public function getCustomerPasswordEmail()
    {
        return $this->getField('customer_pw_email');
    }

    /**
     * Get customer_business_title.
     *
     * @return string
     */
    public function getCustomerBusinessTitle()
    {
        return $this->getField('customer_business_title');
    }
}
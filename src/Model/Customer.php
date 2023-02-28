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
 * Data model for Customer.
 *
 * @package MerchantAPI\Model
 */
class Customer extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['CustomField_Values'])) {
            if ($data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->setField('CustomField_Values', $data['CustomField_Values']);
            } else if (is_array($data['CustomField_Values'])) {
                $this->setField('CustomField_Values', new CustomFieldValues($data['CustomField_Values']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected CustomFieldValues or an array but got %s',
                    is_object($data['CustomField_Values']) ?
                        get_class($data['CustomField_Values']) : gettype($data['CustomField_Values'])));
            }
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['CustomField_Values'])) {
            if ($this->data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->data['CustomField_Values'] = clone $this->data['CustomField_Values'];
            }
        }
    }

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
     * Get account_id.
     *
     * @return ?int
     */
    public function getAccountId() : ?int
    {
        return $this->getField('account_id');
    }

    /**
     * Get login.
     *
     * @return ?string
     */
    public function getLogin() : ?string
    {
        return $this->getField('login');
    }

    /**
     * Get pw_email.
     *
     * @return ?string
     */
    public function getPasswordEmail() : ?string
    {
        return $this->getField('pw_email');
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
     * Get ship_res.
     *
     * @return ?bool
     */
    public function getShippingResidential() : ?bool
    {
        return $this->getField('ship_res');
    }

    /**
     * Get ship_fname.
     *
     * @return ?string
     */
    public function getShipFirstName() : ?string
    {
        return $this->getField('ship_fname');
    }

    /**
     * Get ship_lname.
     *
     * @return ?string
     */
    public function getShipLastName() : ?string
    {
        return $this->getField('ship_lname');
    }

    /**
     * Get ship_email.
     *
     * @return ?string
     */
    public function getShipEmail() : ?string
    {
        return $this->getField('ship_email');
    }

    /**
     * Get ship_comp.
     *
     * @return ?string
     */
    public function getShipCompany() : ?string
    {
        return $this->getField('ship_comp');
    }

    /**
     * Get ship_phone.
     *
     * @return ?string
     */
    public function getShipPhone() : ?string
    {
        return $this->getField('ship_phone');
    }

    /**
     * Get ship_fax.
     *
     * @return ?string
     */
    public function getShipFax() : ?string
    {
        return $this->getField('ship_fax');
    }

    /**
     * Get ship_addr1.
     *
     * @return ?string
     */
    public function getShipAddress1() : ?string
    {
        return $this->getField('ship_addr1');
    }

    /**
     * Get ship_addr2.
     *
     * @return ?string
     */
    public function getShipAddress2() : ?string
    {
        return $this->getField('ship_addr2');
    }

    /**
     * Get ship_city.
     *
     * @return ?string
     */
    public function getShipCity() : ?string
    {
        return $this->getField('ship_city');
    }

    /**
     * Get ship_state.
     *
     * @return ?string
     */
    public function getShipState() : ?string
    {
        return $this->getField('ship_state');
    }

    /**
     * Get ship_zip.
     *
     * @return ?string
     */
    public function getShipZip() : ?string
    {
        return $this->getField('ship_zip');
    }

    /**
     * Get ship_cntry.
     *
     * @return ?string
     */
    public function getShipCountry() : ?string
    {
        return $this->getField('ship_cntry');
    }

    /**
     * Get bill_id.
     *
     * @return ?int
     */
    public function getBillId() : ?int
    {
        return $this->getField('bill_id');
    }

    /**
     * Get bill_fname.
     *
     * @return ?string
     */
    public function getBillFirstName() : ?string
    {
        return $this->getField('bill_fname');
    }

    /**
     * Get bill_lname.
     *
     * @return ?string
     */
    public function getBillLastName() : ?string
    {
        return $this->getField('bill_lname');
    }

    /**
     * Get bill_email.
     *
     * @return ?string
     */
    public function getBillEmail() : ?string
    {
        return $this->getField('bill_email');
    }

    /**
     * Get bill_comp.
     *
     * @return ?string
     */
    public function getBillCompany() : ?string
    {
        return $this->getField('bill_comp');
    }

    /**
     * Get bill_phone.
     *
     * @return ?string
     */
    public function getBillPhone() : ?string
    {
        return $this->getField('bill_phone');
    }

    /**
     * Get bill_fax.
     *
     * @return ?string
     */
    public function getBillFax() : ?string
    {
        return $this->getField('bill_fax');
    }

    /**
     * Get bill_addr1.
     *
     * @return ?string
     */
    public function getBillAddress1() : ?string
    {
        return $this->getField('bill_addr1');
    }

    /**
     * Get bill_addr2.
     *
     * @return ?string
     */
    public function getBillAddress2() : ?string
    {
        return $this->getField('bill_addr2');
    }

    /**
     * Get bill_city.
     *
     * @return ?string
     */
    public function getBillCity() : ?string
    {
        return $this->getField('bill_city');
    }

    /**
     * Get bill_state.
     *
     * @return ?string
     */
    public function getBillState() : ?string
    {
        return $this->getField('bill_state');
    }

    /**
     * Get bill_zip.
     *
     * @return ?string
     */
    public function getBillZip() : ?string
    {
        return $this->getField('bill_zip');
    }

    /**
     * Get bill_cntry.
     *
     * @return ?string
     */
    public function getBillCountry() : ?string
    {
        return $this->getField('bill_cntry');
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
     * Get order_cnt.
     *
     * @return ?int
     */
    public function getOrderCount() : ?int
    {
        return $this->getField('order_cnt');
    }

    /**
     * Get order_avg.
     *
     * @return ?float
     */
    public function getOrderAverage() : ?float
    {
        return $this->getField('order_avg');
    }

    /**
     * Get formatted_order_avg.
     *
     * @return ?string
     */
    public function getFormattedOrderAverage() : ?string
    {
        return $this->getField('formatted_order_avg');
    }

    /**
     * Get order_tot.
     *
     * @return ?float
     */
    public function getOrderTotal() : ?float
    {
        return $this->getField('order_tot');
    }

    /**
     * Get formatted_order_tot.
     *
     * @return ?string
     */
    public function getFormattedOrderTotal() : ?string
    {
        return $this->getField('formatted_order_tot');
    }

    /**
     * Get note_count.
     *
     * @return ?int
     */
    public function getNoteCount() : ?int
    {
        return $this->getField('note_count');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getCreatedOn() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get dt_login.
     *
     * @return ?int
     */
    public function getLastLogin() : ?int
    {
        return $this->getTimestampField('dt_login');
    }

    /**
     * Get dt_pwchg.
     *
     * @return ?int
     */
    public function getPasswordChangeDateTime() : ?int
    {
        return $this->getTimestampField('dt_pwchg');
    }

    /**
     * Get credit.
     *
     * @return ?float
     */
    public function getCredit() : ?float
    {
        return $this->getField('credit');
    }

    /**
     * Get formatted_credit.
     *
     * @return ?string
     */
    public function getFormattedCredit() : ?string
    {
        return $this->getField('formatted_credit');
    }

    /**
     * Get business_title.
     *
     * @return ?string
     */
    public function getBusinessTitle() : ?string
    {
        return $this->getField('business_title');
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?\MerchantAPI\Model\CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->getField('CustomField_Values');
    }
}
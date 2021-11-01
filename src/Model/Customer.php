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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get account_id.
     *
     * @return int
     */
    public function getAccountId()
    {
        return (int) $this->getField('account_id', 0);
    }

    /**
     * Get login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->getField('login');
    }

    /**
     * Get pw_email.
     *
     * @return string
     */
    public function getPasswordEmail()
    {
        return $this->getField('pw_email');
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
     * Get ship_res.
     *
     * @return bool
     */
    public function getShippingResidential()
    {
        return (bool) $this->getField('ship_res', false);
    }

    /**
     * Get ship_fname.
     *
     * @return string
     */
    public function getShipFirstName()
    {
        return $this->getField('ship_fname');
    }

    /**
     * Get ship_lname.
     *
     * @return string
     */
    public function getShipLastName()
    {
        return $this->getField('ship_lname');
    }

    /**
     * Get ship_email.
     *
     * @return string
     */
    public function getShipEmail()
    {
        return $this->getField('ship_email');
    }

    /**
     * Get ship_comp.
     *
     * @return string
     */
    public function getShipCompany()
    {
        return $this->getField('ship_comp');
    }

    /**
     * Get ship_phone.
     *
     * @return string
     */
    public function getShipPhone()
    {
        return $this->getField('ship_phone');
    }

    /**
     * Get ship_fax.
     *
     * @return string
     */
    public function getShipFax()
    {
        return $this->getField('ship_fax');
    }

    /**
     * Get ship_addr1.
     *
     * @return string
     */
    public function getShipAddress1()
    {
        return $this->getField('ship_addr1');
    }

    /**
     * Get ship_addr2.
     *
     * @return string
     */
    public function getShipAddress2()
    {
        return $this->getField('ship_addr2');
    }

    /**
     * Get ship_city.
     *
     * @return string
     */
    public function getShipCity()
    {
        return $this->getField('ship_city');
    }

    /**
     * Get ship_state.
     *
     * @return string
     */
    public function getShipState()
    {
        return $this->getField('ship_state');
    }

    /**
     * Get ship_zip.
     *
     * @return string
     */
    public function getShipZip()
    {
        return $this->getField('ship_zip');
    }

    /**
     * Get ship_cntry.
     *
     * @return string
     */
    public function getShipCountry()
    {
        return $this->getField('ship_cntry');
    }

    /**
     * Get bill_id.
     *
     * @return int
     */
    public function getBillId()
    {
        return (int) $this->getField('bill_id', 0);
    }

    /**
     * Get bill_fname.
     *
     * @return string
     */
    public function getBillFirstName()
    {
        return $this->getField('bill_fname');
    }

    /**
     * Get bill_lname.
     *
     * @return string
     */
    public function getBillLastName()
    {
        return $this->getField('bill_lname');
    }

    /**
     * Get bill_email.
     *
     * @return string
     */
    public function getBillEmail()
    {
        return $this->getField('bill_email');
    }

    /**
     * Get bill_comp.
     *
     * @return string
     */
    public function getBillCompany()
    {
        return $this->getField('bill_comp');
    }

    /**
     * Get bill_phone.
     *
     * @return string
     */
    public function getBillPhone()
    {
        return $this->getField('bill_phone');
    }

    /**
     * Get bill_fax.
     *
     * @return string
     */
    public function getBillFax()
    {
        return $this->getField('bill_fax');
    }

    /**
     * Get bill_addr1.
     *
     * @return string
     */
    public function getBillAddress1()
    {
        return $this->getField('bill_addr1');
    }

    /**
     * Get bill_addr2.
     *
     * @return string
     */
    public function getBillAddress2()
    {
        return $this->getField('bill_addr2');
    }

    /**
     * Get bill_city.
     *
     * @return string
     */
    public function getBillCity()
    {
        return $this->getField('bill_city');
    }

    /**
     * Get bill_state.
     *
     * @return string
     */
    public function getBillState()
    {
        return $this->getField('bill_state');
    }

    /**
     * Get bill_zip.
     *
     * @return string
     */
    public function getBillZip()
    {
        return $this->getField('bill_zip');
    }

    /**
     * Get bill_cntry.
     *
     * @return string
     */
    public function getBillCountry()
    {
        return $this->getField('bill_cntry');
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
     * Get order_cnt.
     *
     * @return int
     */
    public function getOrderCount()
    {
        return (int) $this->getField('order_cnt', 0);
    }

    /**
     * Get order_avg.
     *
     * @return float
     */
    public function getOrderAverage()
    {
        return (float) $this->getField('order_avg', 0.00);
    }

    /**
     * Get formatted_order_avg.
     *
     * @return string
     */
    public function getFormattedOrderAverage()
    {
        return $this->getField('formatted_order_avg');
    }

    /**
     * Get order_tot.
     *
     * @return float
     */
    public function getOrderTotal()
    {
        return (float) $this->getField('order_tot', 0.00);
    }

    /**
     * Get formatted_order_tot.
     *
     * @return string
     */
    public function getFormattedOrderTotal()
    {
        return $this->getField('formatted_order_tot');
    }

    /**
     * Get note_count.
     *
     * @return int
     */
    public function getNoteCount()
    {
        return (int) $this->getField('note_count', 0);
    }

    /**
     * Get dt_created.
     *
     * @return int
     */
    public function getCreatedOn()
    {
        return (int) $this->getField('dt_created', 0);
    }

    /**
     * Get dt_login.
     *
     * @return int
     */
    public function getLastLogin()
    {
        return (int) $this->getField('dt_login', 0);
    }

    /**
     * Get dt_pwchg.
     *
     * @return int
     */
    public function getPasswordChangeDateTime()
    {
        return (int) $this->getField('dt_pwchg', 0);
    }

    /**
     * Get credit.
     *
     * @return float
     */
    public function getCredit()
    {
        return (float) $this->getField('credit', 0.00);
    }

    /**
     * Get formatted_credit.
     *
     * @return string
     */
    public function getFormattedCredit()
    {
        return $this->getField('formatted_credit');
    }

    /**
     * Get business_title.
     *
     * @return string
     */
    public function getBusinessTitle()
    {
        return $this->getField('business_title');
    }

    /**
     * Get CustomField_Values.
     *
     * @return \MerchantAPI\Model\CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->getField('CustomField_Values', null);
    }
}
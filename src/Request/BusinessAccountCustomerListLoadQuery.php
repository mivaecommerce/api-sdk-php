<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\BusinessAccountCustomer;
use MerchantAPI\BaseClient;

/**
 * Handles API Request BusinessAccountCustomerList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/businessaccountcustomerlist_load_query
 */
class BusinessAccountCustomerListLoadQuery extends CustomerListLoadQuery
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BusinessAccountCustomerList_Load_Query';

    /** @var int */
    protected $businessAccountId;

    /** @var int */
    protected $editBusinessAccount;

    /** @var string */
    protected $businessAccountTitle;

    /** @var bool */
    protected $assigned;

    /** @var bool */
    protected $unassigned;

    /**
     * Get BusinessAccount_ID.
     *
     * @return int
     */
    public function getBusinessAccountId()
    {
        return $this->businessAccountId;
    }

    /**
     * Get Edit_BusinessAccount.
     *
     * @return int
     */
    public function getEditBusinessAccount()
    {
        return $this->editBusinessAccount;
    }

    /**
     * Get BusinessAccount_Title.
     *
     * @return string
     */
    public function getBusinessAccountTitle()
    {
        return $this->businessAccountTitle;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned()
    {
        return $this->unassigned;
    }

    /**
     * Set BusinessAccount_ID.
     *
     * @param int
     * @return $this
     */
    public function setBusinessAccountId($businessAccountId)
    {
        $this->businessAccountId = $businessAccountId;

        return $this;
    }

    /**
     * Set Edit_BusinessAccount.
     *
     * @param int
     * @return $this
     */
    public function setEditBusinessAccount($editBusinessAccount)
    {
        $this->editBusinessAccount = $editBusinessAccount;

        return $this;
    }

    /**
     * Set BusinessAccount_Title.
     *
     * @param string
     * @return $this
     */
    public function setBusinessAccountTitle($businessAccountTitle)
    {
        $this->businessAccountTitle = $businessAccountTitle;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param bool
     * @return $this
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Set Unassigned.
     *
     * @param bool
     * @return $this
     */
    public function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getBusinessAccountId()) {
            $data['BusinessAccount_ID'] = $this->getBusinessAccountId();
        } else if ($this->getEditBusinessAccount()) {
            $data['Edit_BusinessAccount'] = $this->getEditBusinessAccount();
        } else if ($this->getBusinessAccountTitle()) {
            $data['BusinessAccount_Title'] = $this->getBusinessAccountTitle();
        }

        if (!is_null($this->getBusinessAccountId())) {
            $data['BusinessAccount_ID'] = $this->getBusinessAccountId();
        }

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        if (!is_null($this->getUnassigned())) {
            $data['Unassigned'] = $this->getUnassigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BusinessAccountCustomerListLoadQuery($this, $httpResponse, $data);
    }
}
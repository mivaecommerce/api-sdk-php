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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'BusinessAccountCustomerList_Load_Query';

    /** @var ?int */
    protected ?int $businessAccountId = null;

    /** @var ?int */
    protected ?int $editBusinessAccount = null;

    /** @var ?string */
    protected ?string $businessAccountTitle = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

    /**
     * Get BusinessAccount_ID.
     *
     * @return int
     */
    public function getBusinessAccountId() : ?int
    {
        return $this->businessAccountId;
    }

    /**
     * Get Edit_BusinessAccount.
     *
     * @return int
     */
    public function getEditBusinessAccount() : ?int
    {
        return $this->editBusinessAccount;
    }

    /**
     * Get BusinessAccount_Title.
     *
     * @return string
     */
    public function getBusinessAccountTitle() : ?string
    {
        return $this->businessAccountTitle;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned() : ?bool
    {
        return $this->unassigned;
    }

    /**
     * Set BusinessAccount_ID.
     *
     * @param ?int $businessAccountId
     * @return $this
     */
    public function setBusinessAccountId(?int $businessAccountId) : self
    {
        $this->businessAccountId = $businessAccountId;

        return $this;
    }

    /**
     * Set Edit_BusinessAccount.
     *
     * @param ?int $editBusinessAccount
     * @return $this
     */
    public function setEditBusinessAccount(?int $editBusinessAccount) : self
    {
        $this->editBusinessAccount = $editBusinessAccount;

        return $this;
    }

    /**
     * Set BusinessAccount_Title.
     *
     * @param ?string $businessAccountTitle
     * @return $this
     */
    public function setBusinessAccountTitle(?string $businessAccountTitle) : self
    {
        $this->businessAccountTitle = $businessAccountTitle;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param ?bool $assigned
     * @return $this
     */
    public function setAssigned(?bool $assigned) : self
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Set Unassigned.
     *
     * @param ?bool $unassigned
     * @return $this
     */
    public function setUnassigned(?bool $unassigned) : self
    {
        $this->unassigned = $unassigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BusinessAccountCustomerListLoadQuery($this, $httpResponse, $data);
    }
}
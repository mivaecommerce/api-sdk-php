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

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\BusinessAccount;
use MerchantAPI\BaseClient;

/**
 * Handles API Request BusinessAccount_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/businessaccount_update
 */
class BusinessAccountUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BusinessAccount_Update';

    /** @var int */
    protected $businessAccountId;

    /** @var int */
    protected $editBusinessAccount;

    /** @var string */
    protected $businessAccountTitle;

    /** @var bool */
    protected $businessAccountTaxExempt;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\BusinessAccount
     */
    public function __construct(BaseClient $client = null, BusinessAccount $businessAccount = null)
    {
        parent::__construct($client);
        if ($businessAccount) {
            if ($businessAccount->getId()) {
                $this->setBusinessAccountId($businessAccount->getId());
            }

            $this->setBusinessAccountTitle($businessAccount->getTitle());
            $this->setBusinessAccountTaxExempt($businessAccount->getTaxExempt());
        }
    }

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
     * Get BusinessAccount_Tax_Exempt.
     *
     * @return bool
     */
    public function getBusinessAccountTaxExempt()
    {
        return $this->businessAccountTaxExempt;
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
     * Set BusinessAccount_Tax_Exempt.
     *
     * @param bool
     * @return $this
     */
    public function setBusinessAccountTaxExempt($businessAccountTaxExempt)
    {
        $this->businessAccountTaxExempt = $businessAccountTaxExempt;

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

        if (!is_null($this->getBusinessAccountTitle())) {
            $data['BusinessAccount_Title'] = $this->getBusinessAccountTitle();
        }

        if (!is_null($this->getBusinessAccountTaxExempt())) {
            $data['BusinessAccount_Tax_Exempt'] = $this->getBusinessAccountTaxExempt();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BusinessAccountUpdate($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'BusinessAccount_Update';

    /** @var ?int */
    protected ?int $businessAccountId = null;

    /** @var ?int */
    protected ?int $editBusinessAccount = null;

    /** @var ?string */
    protected ?string $businessAccountTitle = null;

    /** @var ?bool */
    protected ?bool $businessAccountTaxExempt = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\BusinessAccount $businessAccount
     */
    public function __construct(?BaseClient $client = null, ?BusinessAccount $businessAccount = null)
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
     * Get BusinessAccount_Tax_Exempt.
     *
     * @return bool
     */
    public function getBusinessAccountTaxExempt() : ?bool
    {
        return $this->businessAccountTaxExempt;
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
     * Set BusinessAccount_Tax_Exempt.
     *
     * @param ?bool $businessAccountTaxExempt
     * @return $this
     */
    public function setBusinessAccountTaxExempt(?bool $businessAccountTaxExempt) : self
    {
        $this->businessAccountTaxExempt = $businessAccountTaxExempt;

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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BusinessAccountUpdate($this, $httpResponse, $data);
    }
}
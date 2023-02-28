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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PriceGroupBusinessAccount_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupbusinessaccount_update_assigned
 */
class PriceGroupBusinessAccountUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroupBusinessAccount_Update_Assigned';

    /** @var ?int */
    protected ?int $businessAccountId = null;

    /** @var ?string */
    protected ?string $editBusinessAccount = null;

    /** @var ?string */
    protected ?string $businessAccountTitle = null;

    /** @var ?int */
    protected ?int $priceGroupId = null;

    /** @var ?string */
    protected ?string $editPriceGroup = null;

    /** @var ?string */
    protected ?string $priceGroupName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PriceGroup $priceGroup
     */
    public function __construct(?BaseClient $client = null, ?PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setPriceGroupId($priceGroup->getId());
            }
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
     * @return string
     */
    public function getEditBusinessAccount() : ?string
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
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId() : ?int
    {
        return $this->priceGroupId;
    }

    /**
     * Get Edit_PriceGroup.
     *
     * @return string
     */
    public function getEditPriceGroup() : ?string
    {
        return $this->editPriceGroup;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName() : ?string
    {
        return $this->priceGroupName;
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
     * @param ?string $editBusinessAccount
     * @return $this
     */
    public function setEditBusinessAccount(?string $editBusinessAccount) : self
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
     * Set PriceGroup_ID.
     *
     * @param ?int $priceGroupId
     * @return $this
     */
    public function setPriceGroupId(?int $priceGroupId) : self
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set Edit_PriceGroup.
     *
     * @param ?string $editPriceGroup
     * @return $this
     */
    public function setEditPriceGroup(?string $editPriceGroup) : self
    {
        $this->editPriceGroup = $editPriceGroup;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param ?string $priceGroupName
     * @return $this
     */
    public function setPriceGroupName(?string $priceGroupName) : self
    {
        $this->priceGroupName = $priceGroupName;

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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getEditPriceGroup()) {
            $data['Edit_PriceGroup'] = $this->getEditPriceGroup();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        if ($this->getBusinessAccountId()) {
            $data['BusinessAccount_ID'] = $this->getBusinessAccountId();
        } else if ($this->getEditBusinessAccount()) {
            $data['Edit_BusinessAccount'] = $this->getEditBusinessAccount();
        } else if ($this->getBusinessAccountTitle()) {
            $data['BusinessAccount_Title'] = $this->getBusinessAccountTitle();
        }

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PriceGroupBusinessAccountUpdateAssigned($this, $httpResponse, $data);
    }
}
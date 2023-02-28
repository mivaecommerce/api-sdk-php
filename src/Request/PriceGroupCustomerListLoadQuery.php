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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\Model\PriceGroupCustomer;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PriceGroupCustomerList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupcustomerlist_load_query
 */
class PriceGroupCustomerListLoadQuery extends CustomerListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroupCustomerList_Load_Query';

    /** @var ?int */
    protected ?int $priceGroupId = null;

    /** @var ?string */
    protected ?string $priceGroupName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

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
            } else if ($priceGroup->getName()) {
                $this->setPriceGroupName($priceGroup->getName());
            }
        }
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
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned() : ?bool
    {
        return $this->unassigned;
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

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
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
        return new \MerchantAPI\Response\PriceGroupCustomerListLoadQuery($this, $httpResponse, $data);
    }
}
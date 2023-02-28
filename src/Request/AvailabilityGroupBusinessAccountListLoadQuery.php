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
use MerchantAPI\Model\AvailabilityGroup;
use MerchantAPI\Model\AvailabilityGroupBusinessAccount;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AvailabilityGroupBusinessAccountList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroupbusinessaccountlist_load_query
 */
class AvailabilityGroupBusinessAccountListLoadQuery extends BusinessAccountListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AvailabilityGroupBusinessAccountList_Load_Query';

    /** @var ?int */
    protected ?int $availabilityGroupId = null;

    /** @var ?string */
    protected ?string $editAvailabilityGroup = null;

    /** @var ?string */
    protected ?string $availabilityGroupName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\AvailabilityGroup $availabilityGroup
     */
    public function __construct(?BaseClient $client = null, ?AvailabilityGroup $availabilityGroup = null)
    {
        parent::__construct($client);
        if ($availabilityGroup) {
            if ($availabilityGroup->getId()) {
                $this->setAvailabilityGroupId($availabilityGroup->getId());
            }
        }
    }

    /**
     * Get AvailabilityGroup_ID.
     *
     * @return int
     */
    public function getAvailabilityGroupId() : ?int
    {
        return $this->availabilityGroupId;
    }

    /**
     * Get Edit_AvailabilityGroup.
     *
     * @return string
     */
    public function getEditAvailabilityGroup() : ?string
    {
        return $this->editAvailabilityGroup;
    }

    /**
     * Get AvailabilityGroup_Name.
     *
     * @return string
     */
    public function getAvailabilityGroupName() : ?string
    {
        return $this->availabilityGroupName;
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
     * Set AvailabilityGroup_ID.
     *
     * @param ?int $availabilityGroupId
     * @return $this
     */
    public function setAvailabilityGroupId(?int $availabilityGroupId) : self
    {
        $this->availabilityGroupId = $availabilityGroupId;

        return $this;
    }

    /**
     * Set Edit_AvailabilityGroup.
     *
     * @param ?string $editAvailabilityGroup
     * @return $this
     */
    public function setEditAvailabilityGroup(?string $editAvailabilityGroup) : self
    {
        $this->editAvailabilityGroup = $editAvailabilityGroup;

        return $this;
    }

    /**
     * Set AvailabilityGroup_Name.
     *
     * @param ?string $availabilityGroupName
     * @return $this
     */
    public function setAvailabilityGroupName(?string $availabilityGroupName) : self
    {
        $this->availabilityGroupName = $availabilityGroupName;

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

        if ($this->getAvailabilityGroupId()) {
            $data['AvailabilityGroup_ID'] = $this->getAvailabilityGroupId();
        } else if ($this->getEditAvailabilityGroup()) {
            $data['Edit_AvailabilityGroup'] = $this->getEditAvailabilityGroup();
        } else if ($this->getAvailabilityGroupName()) {
            $data['AvailabilityGroup_Name'] = $this->getAvailabilityGroupName();
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
        return new \MerchantAPI\Response\AvailabilityGroupBusinessAccountListLoadQuery($this, $httpResponse, $data);
    }
}
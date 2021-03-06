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
use MerchantAPI\Model\AvailabilityGroup;
use MerchantAPI\BaseClient;

/**
 * Handles API Request AvailabilityGroupBusinessAccount_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroupbusinessaccount_update_assigned
 */
class AvailabilityGroupBusinessAccountUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AvailabilityGroupBusinessAccount_Update_Assigned';

    /** @var int */
    protected $availabilityGroupId;

    /** @var string */
    protected $editAvailabilityGroup;

    /** @var string */
    protected $availabilityGroupName;

    /** @var int */
    protected $businessAccountId;

    /** @var string */
    protected $businessAccountTitle;

    /** @var bool */
    protected $assigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\AvailabilityGroup
     */
    public function __construct(BaseClient $client = null, AvailabilityGroup $availabilityGroup = null)
    {
        parent::__construct($client);
        if ($availabilityGroup) {
            if ($availabilityGroup->getId()) {
                $this->setAvailabilityGroupId($availabilityGroup->getId());
            } else if ($availabilityGroup->getName()) {
                $this->setEditAvailabilityGroup($availabilityGroup->getName());
            }
        }
    }

    /**
     * Get AvailabilityGroup_ID.
     *
     * @return int
     */
    public function getAvailabilityGroupId()
    {
        return $this->availabilityGroupId;
    }

    /**
     * Get Edit_AvailabilityGroup.
     *
     * @return string
     */
    public function getEditAvailabilityGroup()
    {
        return $this->editAvailabilityGroup;
    }

    /**
     * Get AvailabilityGroup_Name.
     *
     * @return string
     */
    public function getAvailabilityGroupName()
    {
        return $this->availabilityGroupName;
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
     * Set AvailabilityGroup_ID.
     *
     * @param int
     * @return $this
     */
    public function setAvailabilityGroupId($availabilityGroupId)
    {
        $this->availabilityGroupId = $availabilityGroupId;

        return $this;
    }

    /**
     * Set Edit_AvailabilityGroup.
     *
     * @param string
     * @return $this
     */
    public function setEditAvailabilityGroup($editAvailabilityGroup)
    {
        $this->editAvailabilityGroup = $editAvailabilityGroup;

        return $this;
    }

    /**
     * Set AvailabilityGroup_Name.
     *
     * @param string
     * @return $this
     */
    public function setAvailabilityGroupName($availabilityGroupName)
    {
        $this->availabilityGroupName = $availabilityGroupName;

        return $this;
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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getAvailabilityGroupId()) {
            $data['AvailabilityGroup_ID'] = $this->getAvailabilityGroupId();
        } else if ($this->getEditAvailabilityGroup()) {
            $data['Edit_AvailabilityGroup'] = $this->getEditAvailabilityGroup();
        } else if ($this->getAvailabilityGroupName()) {
            $data['AvailabilityGroup_Name'] = $this->getAvailabilityGroupName();
        }

        if ($this->getBusinessAccountId()) {
            $data['BusinessAccount_ID'] = $this->getBusinessAccountId();
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\AvailabilityGroupBusinessAccountUpdateAssigned($this, $httpResponse, $data);
    }
}
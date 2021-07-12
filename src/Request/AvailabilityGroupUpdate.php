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
 * Handles API Request AvailabilityGroup_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroup_update
 */
class AvailabilityGroupUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AvailabilityGroup_Update';

    /** @var int */
    protected $availabilityGroupId;

    /** @var string */
    protected $editAvailabilityGroup;

    /** @var string */
    protected $availabilityGroupName;

    /** @var bool */
    protected $availabilityGroupTaxExempt;

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
            }

            $this->setAvailabilityGroupTaxExempt($availabilityGroup->getTaxExempt());
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
     * Get AvailabilityGroup_Tax_Exempt.
     *
     * @return bool
     */
    public function getAvailabilityGroupTaxExempt()
    {
        return $this->availabilityGroupTaxExempt;
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
     * Set AvailabilityGroup_Tax_Exempt.
     *
     * @param bool
     * @return $this
     */
    public function setAvailabilityGroupTaxExempt($availabilityGroupTaxExempt)
    {
        $this->availabilityGroupTaxExempt = $availabilityGroupTaxExempt;

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
        }

        $data['AvailabilityGroup_Name'] = $this->getAvailabilityGroupName();

        if (!is_null($this->getAvailabilityGroupTaxExempt())) {
            $data['AvailabilityGroup_Tax_Exempt'] = $this->getAvailabilityGroupTaxExempt();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\AvailabilityGroupUpdate($this, $httpResponse, $data);
    }
}
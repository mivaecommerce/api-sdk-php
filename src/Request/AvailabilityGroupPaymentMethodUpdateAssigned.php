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
 * Handles API Request AvailabilityGroupPaymentMethod_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygrouppaymentmethod_update_assigned
 */
class AvailabilityGroupPaymentMethodUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AvailabilityGroupPaymentMethod_Update_Assigned';

    /** @var int */
    protected $availabilityGroupId;

    /** @var string */
    protected $editAvailabilityGroup;

    /** @var string */
    protected $availabilityGroupName;

    /** @var string */
    protected $moduleCode;

    /** @var string */
    protected $methodCode;

    /** @var int */
    protected $paymentCardTypeId;

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
     * Get Module_Code.
     *
     * @return string
     */
    public function getModuleCode()
    {
        return $this->moduleCode;
    }

    /**
     * Get Method_Code.
     *
     * @return string
     */
    public function getMethodCode()
    {
        return $this->methodCode;
    }

    /**
     * Get PaymentCardType_ID.
     *
     * @return int
     */
    public function getPaymentCardTypeId()
    {
        return $this->paymentCardTypeId;
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
     * Set Module_Code.
     *
     * @param string
     * @return $this
     */
    public function setModuleCode($moduleCode)
    {
        $this->moduleCode = $moduleCode;

        return $this;
    }

    /**
     * Set Method_Code.
     *
     * @param string
     * @return $this
     */
    public function setMethodCode($methodCode)
    {
        $this->methodCode = $methodCode;

        return $this;
    }

    /**
     * Set PaymentCardType_ID.
     *
     * @param int
     * @return $this
     */
    public function setPaymentCardTypeId($paymentCardTypeId)
    {
        $this->paymentCardTypeId = $paymentCardTypeId;

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

        $data['Module_Code'] = $this->getModuleCode();

        $data['Method_Code'] = $this->getMethodCode();

        if (!is_null($this->getPaymentCardTypeId())) {
            $data['PaymentCardType_ID'] = $this->getPaymentCardTypeId();
        }

        $data['Assigned'] = $this->getAssigned();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\AvailabilityGroupPaymentMethodUpdateAssigned($this, $httpResponse, $data);
    }
}
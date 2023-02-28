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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AvailabilityGroupCustomer_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroupcustomer_update_assigned
 */
class AvailabilityGroupCustomerUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AvailabilityGroupCustomer_Update_Assigned';

    /** @var ?int */
    protected ?int $availabilityGroupId = null;

    /** @var ?string */
    protected ?string $editAvailabilityGroup = null;

    /** @var ?string */
    protected ?string $availabilityGroupName = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

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
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId() : ?int
    {
        return $this->customerId;
    }

    /**
     * Get Edit_Customer.
     *
     * @return string
     */
    public function getEditCustomer() : ?string
    {
        return $this->editCustomer;
    }

    /**
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->customerLogin;
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
     * Set Customer_ID.
     *
     * @param ?int $customerId
     * @return $this
     */
    public function setCustomerId(?int $customerId) : self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Edit_Customer.
     *
     * @param ?string $editCustomer
     * @return $this
     */
    public function setEditCustomer(?string $editCustomer) : self
    {
        $this->editCustomer = $editCustomer;

        return $this;
    }

    /**
     * Set Customer_Login.
     *
     * @param ?string $customerLogin
     * @return $this
     */
    public function setCustomerLogin(?string $customerLogin) : self
    {
        $this->customerLogin = $customerLogin;

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

        if ($this->getAvailabilityGroupId()) {
            $data['AvailabilityGroup_ID'] = $this->getAvailabilityGroupId();
        } else if ($this->getEditAvailabilityGroup()) {
            $data['Edit_AvailabilityGroup'] = $this->getEditAvailabilityGroup();
        } else if ($this->getAvailabilityGroupName()) {
            $data['AvailabilityGroup_Name'] = $this->getAvailabilityGroupName();
        }

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
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
        return new \MerchantAPI\Response\AvailabilityGroupCustomerUpdateAssigned($this, $httpResponse, $data);
    }
}
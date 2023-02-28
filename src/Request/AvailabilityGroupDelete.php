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
 * Handles API Request AvailabilityGroup_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroup_delete
 */
class AvailabilityGroupDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AvailabilityGroup_Delete';

    /** @var ?int */
    protected ?int $availabilityGroupId = null;

    /** @var ?string */
    protected ?string $editAvailabilityGroup = null;

    /** @var ?string */
    protected ?string $availabilityGroupName = null;

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AvailabilityGroupDelete($this, $httpResponse, $data);
    }
}
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
 * Handles API Request AvailabilityGroup_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/availabilitygroup_insert
 */
class AvailabilityGroupInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AvailabilityGroup_Insert';

    /** @var ?string */
    protected ?string $availabilityGroupName = null;

    /** @var ?bool */
    protected ?bool $availabilityGroupTaxExempt = null;

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
     * Get AvailabilityGroup_Tax_Exempt.
     *
     * @return bool
     */
    public function getAvailabilityGroupTaxExempt() : ?bool
    {
        return $this->availabilityGroupTaxExempt;
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
     * Set AvailabilityGroup_Tax_Exempt.
     *
     * @param ?bool $availabilityGroupTaxExempt
     * @return $this
     */
    public function setAvailabilityGroupTaxExempt(?bool $availabilityGroupTaxExempt) : self
    {
        $this->availabilityGroupTaxExempt = $availabilityGroupTaxExempt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['AvailabilityGroup_Name'] = $this->getAvailabilityGroupName();

        if (!is_null($this->getAvailabilityGroupTaxExempt())) {
            $data['AvailabilityGroup_Tax_Exempt'] = $this->getAvailabilityGroupTaxExempt();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AvailabilityGroupInsert($this, $httpResponse, $data);
    }
}
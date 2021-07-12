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
use MerchantAPI\BaseClient;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AvailabilityGroup_Insert';

    /** @var string */
    protected $availabilityGroupName;

    /** @var bool */
    protected $availabilityGroupTaxExempt;

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
        return new \MerchantAPI\Response\AvailabilityGroupInsert($this, $httpResponse, $data);
    }
}
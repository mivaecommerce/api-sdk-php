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
use MerchantAPI\Model\CustomerAddress;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CustomerAddress_Update_Residential.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customeraddress_update_residential
 */
class CustomerAddressUpdateResidential extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerAddress_Update_Residential';

    /** @var ?int */
    protected ?int $addressId = null;

    /** @var ?int */
    protected ?int $customerAddressId = null;

    /** @var ?bool */
    protected ?bool $residential = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CustomerAddress $customerAddress
     */
    public function __construct(?BaseClient $client = null, ?CustomerAddress $customerAddress = null)
    {
        parent::__construct($client);
        if ($customerAddress) {
            if ($customerAddress->getId()) {
                $this->setAddressId($customerAddress->getId());
            }
        }
    }

    /**
     * Get Address_ID.
     *
     * @return int
     */
    public function getAddressId() : ?int
    {
        return $this->addressId;
    }

    /**
     * Get CustomerAddress_ID.
     *
     * @return int
     */
    public function getCustomerAddressId() : ?int
    {
        return $this->customerAddressId;
    }

    /**
     * Get Residential.
     *
     * @return bool
     */
    public function getResidential() : ?bool
    {
        return $this->residential;
    }

    /**
     * Set Address_ID.
     *
     * @param ?int $addressId
     * @return $this
     */
    public function setAddressId(?int $addressId) : self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Set CustomerAddress_ID.
     *
     * @param ?int $customerAddressId
     * @return $this
     */
    public function setCustomerAddressId(?int $customerAddressId) : self
    {
        $this->customerAddressId = $customerAddressId;

        return $this;
    }

    /**
     * Set Residential.
     *
     * @param ?bool $residential
     * @return $this
     */
    public function setResidential(?bool $residential) : self
    {
        $this->residential = $residential;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getAddressId()) {
            $data['Address_ID'] = $this->getAddressId();
        } else if ($this->getCustomerAddressId()) {
            $data['CustomerAddress_ID'] = $this->getCustomerAddressId();
        }

        if (!is_null($this->getResidential())) {
            $data['Residential'] = $this->getResidential();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerAddressUpdateResidential($this, $httpResponse, $data);
    }
}
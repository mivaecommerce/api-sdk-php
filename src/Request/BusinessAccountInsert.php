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
use MerchantAPI\Model\BusinessAccount;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request BusinessAccount_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/businessaccount_insert
 */
class BusinessAccountInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'BusinessAccount_Insert';

    /** @var ?string */
    protected ?string $businessAccountTitle = null;

    /** @var ?bool */
    protected ?bool $businessAccountTaxExempt = null;

    /**
     * Get BusinessAccount_Title.
     *
     * @return string
     */
    public function getBusinessAccountTitle() : ?string
    {
        return $this->businessAccountTitle;
    }

    /**
     * Get BusinessAccount_Tax_Exempt.
     *
     * @return bool
     */
    public function getBusinessAccountTaxExempt() : ?bool
    {
        return $this->businessAccountTaxExempt;
    }

    /**
     * Set BusinessAccount_Title.
     *
     * @param ?string $businessAccountTitle
     * @return $this
     */
    public function setBusinessAccountTitle(?string $businessAccountTitle) : self
    {
        $this->businessAccountTitle = $businessAccountTitle;

        return $this;
    }

    /**
     * Set BusinessAccount_Tax_Exempt.
     *
     * @param ?bool $businessAccountTaxExempt
     * @return $this
     */
    public function setBusinessAccountTaxExempt(?bool $businessAccountTaxExempt) : self
    {
        $this->businessAccountTaxExempt = $businessAccountTaxExempt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if (!is_null($this->getBusinessAccountTitle())) {
            $data['BusinessAccount_Title'] = $this->getBusinessAccountTitle();
        }

        if (!is_null($this->getBusinessAccountTaxExempt())) {
            $data['BusinessAccount_Tax_Exempt'] = $this->getBusinessAccountTaxExempt();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BusinessAccountInsert($this, $httpResponse, $data);
    }
}
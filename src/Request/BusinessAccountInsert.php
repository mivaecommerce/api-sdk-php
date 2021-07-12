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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BusinessAccount_Insert';

    /** @var string */
    protected $businessAccountTitle;

    /** @var bool */
    protected $businessAccountTaxExempt;

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
     * Get BusinessAccount_Tax_Exempt.
     *
     * @return bool
     */
    public function getBusinessAccountTaxExempt()
    {
        return $this->businessAccountTaxExempt;
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
     * Set BusinessAccount_Tax_Exempt.
     *
     * @param bool
     * @return $this
     */
    public function setBusinessAccountTaxExempt($businessAccountTaxExempt)
    {
        $this->businessAccountTaxExempt = $businessAccountTaxExempt;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BusinessAccountInsert($this, $httpResponse, $data);
    }
}
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

/**
 * Handles API Request BusinessAccountList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/businessaccountlist_delete
 */
class BusinessAccountListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BusinessAccountList_Delete';

    /** @var int[] */
    protected $businessAccountIds = [];

    /**
     * Get BusinessAccount_IDs.
     *
     * @return array
     */
    public function getBusinessAccountIds()
    {
        return $this->businessAccountIds;
    }

    /**
     * Add BusinessAccount_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addBusinessAccountId($businessAccountId)
    {
        $this->businessAccountIds[] = $businessAccountId;
        return $this;
    }

    /**
     * Add BusinessAccount model.
     *
     * @param \MerchantAPI\Model\BusinessAccount
     * @return $this
     */
    public function addBusinessAccount(BusinessAccount $businessAccount)
    {
        if ($businessAccount->getId()) {
            $this->businessAccountIds[] = $businessAccount->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['BusinessAccount_IDs'] = $this->getBusinessAccountIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BusinessAccountListDelete($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\CustomerCreditHistory;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CustomerCreditHistory_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/customercredithistory_delete
 */
class CustomerCreditHistoryDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CustomerCreditHistory_Delete';

    /** @var int */
    protected $customerCreditHistoryId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\CustomerCreditHistory
     */
    public function __construct(BaseClient $client = null, CustomerCreditHistory $customerCreditHistory = null)
    {
        parent::__construct($client);
        if ($customerCreditHistory) {
            $this->setCustomerCreditHistoryId($customerCreditHistory->getId());
        }
    }

    /**
     * Get CustomerCreditHistory_ID.
     *
     * @return int
     */
    public function getCustomerCreditHistoryId()
    {
        return $this->customerCreditHistoryId;
    }

    /**
     * Set CustomerCreditHistory_ID.
     *
     * @param int
     * @return $this
     */
    public function setCustomerCreditHistoryId($customerCreditHistoryId)
    {
        $this->customerCreditHistoryId = $customerCreditHistoryId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['CustomerCreditHistory_ID'] = $this->getCustomerCreditHistoryId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CustomerCreditHistoryDelete($this, $httpResponse, $data);
    }
}
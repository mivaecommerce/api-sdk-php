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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CustomerCreditHistory_Delete';

    /** @var ?int */
    protected ?int $customerCreditHistoryId = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CustomerCreditHistory $customerCreditHistory
     */
    public function __construct(?BaseClient $client = null, ?CustomerCreditHistory $customerCreditHistory = null)
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
    public function getCustomerCreditHistoryId() : ?int
    {
        return $this->customerCreditHistoryId;
    }

    /**
     * Set CustomerCreditHistory_ID.
     *
     * @param ?int $customerCreditHistoryId
     * @return $this
     */
    public function setCustomerCreditHistoryId(?int $customerCreditHistoryId) : self
    {
        $this->customerCreditHistoryId = $customerCreditHistoryId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['CustomerCreditHistory_ID'] = $this->getCustomerCreditHistoryId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CustomerCreditHistoryDelete($this, $httpResponse, $data);
    }
}
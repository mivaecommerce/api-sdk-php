<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\ListQuery\ListQueryResponse;
use MerchantAPI\Model\CustomerCreditHistory;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CustomerCreditHistoryList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/customercredithistorylist_load_query
 */
class CustomerCreditHistoryListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\CustomerCreditHistory[] */
    protected $customerCreditHistory = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->customerCreditHistory = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->customerCreditHistory[] = new CustomerCreditHistory($result);
            }
        }
    }

    /**
     * Get customerCreditHistory.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\CustomerCreditHistory[]
     */
    public function getCustomerCreditHistory()
    {
        return $this->customerCreditHistory;
    }
}
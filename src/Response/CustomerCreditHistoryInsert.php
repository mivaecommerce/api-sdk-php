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

use MerchantAPI\Response;
use MerchantAPI\Model\CustomerCreditHistory;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CustomerCreditHistory_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/customercredithistory_insert
 */
class CustomerCreditHistoryInsert extends Response
{
    /** @var \MerchantAPI\Model\CustomerCreditHistory */
    protected $customerCreditHistory;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->customerCreditHistory = new CustomerCreditHistory($this->data['data']);
    }

    /**
     * Get customerCreditHistory.
     *
     * @return \MerchantAPI\Model\CustomerCreditHistory|null
     */
    public function getCustomerCreditHistory()
    {
        return $this->customerCreditHistory;
    }
}
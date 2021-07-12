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
use MerchantAPI\Model\BusinessAccountCustomer;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for BusinessAccountCustomerList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/businessaccountcustomerlist_load_query
 */
class BusinessAccountCustomerListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\BusinessAccountCustomer[] */
    protected $businessAccountCustomers = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->businessAccountCustomers = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->businessAccountCustomers[] = new BusinessAccountCustomer($result);
            }
        }
    }

    /**
     * Get businessAccountCustomers.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\BusinessAccountCustomer[]
     */
    public function getBusinessAccountCustomers()
    {
        return $this->businessAccountCustomers;
    }
}
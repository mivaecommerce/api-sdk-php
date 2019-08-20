<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Response;

use MerchantAPI\ListQuery\ListQueryResponse;
use MerchantAPI\Model\PriceGroupCustomer;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PriceGroupCustomerList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/pricegroupcustomerlist_load_query
 */
class PriceGroupCustomerListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupCustomer[] */
    protected $priceGroupCustomers = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->priceGroupCustomers = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }
        
        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->priceGroupCustomers[] = new PriceGroupCustomer($result);
            }
        }
    }

    /**
     * Get priceGroupCustomers.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupCustomer[]
     */
    public function getPriceGroupCustomers()
    {
        return $this->priceGroupCustomers;
    }
}
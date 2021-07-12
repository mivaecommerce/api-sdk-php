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
use MerchantAPI\Model\CouponCustomer;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CouponCustomerList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/couponcustomerlist_load_query
 */
class CouponCustomerListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\CouponCustomer[] */
    protected $couponCustomers = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->couponCustomers = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->couponCustomers[] = new CouponCustomer($result);
            }
        }
    }

    /**
     * Get couponCustomers.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\CouponCustomer[]
     */
    public function getCouponCustomers()
    {
        return $this->couponCustomers;
    }
}
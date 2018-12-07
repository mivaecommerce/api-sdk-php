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
use MerchantAPI\Model\Coupon;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CouponList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/couponlist_load_query
 */
class CouponListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\Coupon[] */
    protected $coupons = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->coupons = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }
        
        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->coupons[] = new Coupon($result);
            }
        }
    }

    /**
     * Get coupons.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Coupon[]
     */
    public function getCoupons()
    {
        return $this->coupons;
    }
}
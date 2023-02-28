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
use MerchantAPI\Model\Coupon;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Coupon_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/coupon_insert
 */
class CouponInsert extends Response
{
    /** @var ?\MerchantAPI\Model\Coupon */
    protected ?Coupon $coupon = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->coupon = new Coupon($this->data['data']);
    }

    /**
     * Get coupon.
     *
     * @return \MerchantAPI\Model\Coupon|null
     */
    public function getCoupon() : ?Coupon
    {
        return $this->coupon;
    }
}
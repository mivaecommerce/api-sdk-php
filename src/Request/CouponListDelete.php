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
use MerchantAPI\Model\Coupon;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CouponList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/couponlist_delete
 */
class CouponListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CouponList_Delete';

    /** @var int[] */
    protected $couponIds = [];

    /**
     * Get Coupon_IDs.
     *
     * @return array
     */
    public function getCouponIds()
    {
        return $this->couponIds;
    }

    /**
     * Add Coupon_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addCouponId($couponId)
    {
        $this->couponIds[] = $couponId;
        return $this;
    }

    /**
     * Add Coupon model.
     *
     * @param \MerchantAPI\Model\Coupon
     * @return $this
     */
    public function addCoupon(Coupon $coupon)
    {
        if ($coupon->getId()) {
            $this->couponIds[] = $coupon->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Coupon_IDs'] = $this->getCouponIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CouponListDelete($this, $httpResponse, $data);
    }
}
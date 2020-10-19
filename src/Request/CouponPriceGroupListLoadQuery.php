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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Coupon;
use MerchantAPI\Model\CouponPriceGroup;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CouponPriceGroupList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/couponpricegrouplist_load_query
 */
class CouponPriceGroupListLoadQuery extends PriceGroupListLoadQuery
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CouponPriceGroupList_Load_Query';

    /** @var int */
    protected $couponId;

    /** @var string */
    protected $editCoupon;

    /** @var string */
    protected $couponCode;

    /** @var bool */
    protected $assigned;

    /** @var bool */
    protected $unassigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Coupon
     */
    public function __construct(BaseClient $client = null, Coupon $coupon = null)
    {
        parent::__construct($client);
        if ($coupon) {
            if ($coupon->getId()) {
                $this->setCouponId($coupon->getId());
            } else if ($coupon->getCode()) {
                $this->setEditCoupon($coupon->getCode());
            }
        }
    }

    /**
     * Get Coupon_ID.
     *
     * @return int
     */
    public function getCouponId()
    {
        return $this->couponId;
    }

    /**
     * Get Edit_Coupon.
     *
     * @return string
     */
    public function getEditCoupon()
    {
        return $this->editCoupon;
    }

    /**
     * Get Coupon_Code.
     *
     * @return string
     */
    public function getCouponCode()
    {
        return $this->couponCode;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned()
    {
        return $this->unassigned;
    }

    /**
     * Set Coupon_ID.
     *
     * @param int
     * @return $this
     */
    public function setCouponId($couponId)
    {
        $this->couponId = $couponId;

        return $this;
    }

    /**
     * Set Edit_Coupon.
     *
     * @param string
     * @return $this
     */
    public function setEditCoupon($editCoupon)
    {
        $this->editCoupon = $editCoupon;

        return $this;
    }

    /**
     * Set Coupon_Code.
     *
     * @param string
     * @return $this
     */
    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param bool
     * @return $this
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Set Unassigned.
     *
     * @param bool
     * @return $this
     */
    public function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getCouponId()) {
            $data['Coupon_ID'] = $this->getCouponId();
        } else if ($this->getEditCoupon()) {
            $data['Edit_Coupon'] = $this->getEditCoupon();
        } else if ($this->getCouponCode()) {
            $data['Coupon_Code'] = $this->getCouponCode();
        }

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        if (!is_null($this->getUnassigned())) {
            $data['Unassigned'] = $this->getUnassigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CouponPriceGroupListLoadQuery($this, $httpResponse, $data);
    }
}
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
 * Handles API Request CouponPriceGroup_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/couponpricegroup_update_assigned
 */
class CouponPriceGroupUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CouponPriceGroup_Update_Assigned';

    /** @var int */
    protected $couponId;

    /** @var string */
    protected $editCoupon;

    /** @var string */
    protected $couponCode;

    /** @var int */
    protected $priceGroupId;

    /** @var string */
    protected $priceGroupName;

    /** @var bool */
    protected $assigned;

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
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId()
    {
        return $this->priceGroupId;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName()
    {
        return $this->priceGroupName;
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
     * Set PriceGroup_ID.
     *
     * @param int
     * @return $this
     */
    public function setPriceGroupId($priceGroupId)
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param string
     * @return $this
     */
    public function setPriceGroupName($priceGroupName)
    {
        $this->priceGroupName = $priceGroupName;

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

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        $data['Assigned'] = $this->getAssigned();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CouponPriceGroupUpdateAssigned($this, $httpResponse, $data);
    }
}
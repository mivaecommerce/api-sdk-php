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
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;

/**
 * Handles API Request OrderCoupon_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordercoupon_update_assigned
 */
class OrderCouponUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'OrderCoupon_Update_Assigned';

    /** @var int */
    protected $orderId;

    /** @var int */
    protected $couponId;

    /** @var string */
    protected $editCoupon;

    /** @var string */
    protected $couponCode;

    /** @var bool */
    protected $assigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(BaseClient $client = null, Order $order = null)
    {
        parent::__construct($client);
        if ($order) {
            if ($order->getId()) {
                $this->setOrderId($order->getId());
            }
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
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
     * Set Order_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getOrderId()) {
            $data['Order_ID'] = $this->getOrderId();
        }

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderCouponUpdateAssigned($this, $httpResponse, $data);
    }
}
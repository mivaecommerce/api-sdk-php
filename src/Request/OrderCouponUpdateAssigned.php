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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderCoupon_Update_Assigned';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var ?int */
    protected ?int $couponId = null;

    /** @var ?string */
    protected ?string $editCoupon = null;

    /** @var ?string */
    protected ?string $couponCode = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
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
    public function getOrderId() : ?int
    {
        return $this->orderId;
    }

    /**
     * Get Coupon_ID.
     *
     * @return int
     */
    public function getCouponId() : ?int
    {
        return $this->couponId;
    }

    /**
     * Get Edit_Coupon.
     *
     * @return string
     */
    public function getEditCoupon() : ?string
    {
        return $this->editCoupon;
    }

    /**
     * Get Coupon_Code.
     *
     * @return string
     */
    public function getCouponCode() : ?string
    {
        return $this->couponCode;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
    }

    /**
     * Set Order_ID.
     *
     * @param ?int $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId) : self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Coupon_ID.
     *
     * @param ?int $couponId
     * @return $this
     */
    public function setCouponId(?int $couponId) : self
    {
        $this->couponId = $couponId;

        return $this;
    }

    /**
     * Set Edit_Coupon.
     *
     * @param ?string $editCoupon
     * @return $this
     */
    public function setEditCoupon(?string $editCoupon) : self
    {
        $this->editCoupon = $editCoupon;

        return $this;
    }

    /**
     * Set Coupon_Code.
     *
     * @param ?string $couponCode
     * @return $this
     */
    public function setCouponCode(?string $couponCode) : self
    {
        $this->couponCode = $couponCode;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param ?bool $assigned
     * @return $this
     */
    public function setAssigned(?bool $assigned) : self
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderCouponUpdateAssigned($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CouponCustomer_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/couponcustomer_update_assigned
 */
class CouponCustomerUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CouponCustomer_Update_Assigned';

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?string */
    protected ?string $editCustomer = null;

    /** @var ?string */
    protected ?string $customerLogin = null;

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
     * @param ?\MerchantAPI\Model\Coupon $coupon
     */
    public function __construct(?BaseClient $client = null, ?Coupon $coupon = null)
    {
        parent::__construct($client);
        if ($coupon) {
            if ($coupon->getId()) {
                $this->setCouponId($coupon->getId());
            }

            $this->setCouponCode($coupon->getCode());
        }
    }

    /**
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId() : ?int
    {
        return $this->customerId;
    }

    /**
     * Get Edit_Customer.
     *
     * @return string
     */
    public function getEditCustomer() : ?string
    {
        return $this->editCustomer;
    }

    /**
     * Get Customer_Login.
     *
     * @return string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->customerLogin;
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
     * Set Customer_ID.
     *
     * @param ?int $customerId
     * @return $this
     */
    public function setCustomerId(?int $customerId) : self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Edit_Customer.
     *
     * @param ?string $editCustomer
     * @return $this
     */
    public function setEditCustomer(?string $editCustomer) : self
    {
        $this->editCustomer = $editCustomer;

        return $this;
    }

    /**
     * Set Customer_Login.
     *
     * @param ?string $customerLogin
     * @return $this
     */
    public function setCustomerLogin(?string $customerLogin) : self
    {
        $this->customerLogin = $customerLogin;

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

        if ($this->getCouponId()) {
            $data['Coupon_ID'] = $this->getCouponId();
        } else if ($this->getEditCoupon()) {
            $data['Edit_Coupon'] = $this->getEditCoupon();
        } else if ($this->getCouponCode()) {
            $data['Coupon_Code'] = $this->getCouponCode();
        }

        if ($this->getCustomerId()) {
            $data['Customer_ID'] = $this->getCustomerId();
        } else if ($this->getEditCustomer()) {
            $data['Edit_Customer'] = $this->getEditCustomer();
        } else if ($this->getCustomerLogin()) {
            $data['Customer_Login'] = $this->getCustomerLogin();
        }

        $data['Customer_Login'] = $this->getCustomerLogin();

        $data['Coupon_Code'] = $this->getCouponCode();

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
        return new \MerchantAPI\Response\CouponCustomerUpdateAssigned($this, $httpResponse, $data);
    }
}
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
 * Handles API Request Coupon_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/coupon_update
 */
class CouponUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Coupon_Update';

    /** @var ?int */
    protected ?int $couponId = null;

    /** @var ?string */
    protected ?string $couponCode = null;

    /** @var ?string */
    protected ?string $editCoupon = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $description = null;

    /** @var ?string */
    protected ?string $customerScope = null;

    /** @var int|\DateTime|null */
    protected $dateTimeStart = null;

    /** @var int|\DateTime|null */
    protected $dateTimeEnd = null;

    /** @var ?int */
    protected ?int $maxUse = null;

    /** @var ?int */
    protected ?int $maxPer = null;

    /** @var ?bool */
    protected ?bool $active = null;

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
            } else if ($coupon->getCode()) {
                $this->setEditCoupon($coupon->getCode());
            }

            $this->setCouponCode($coupon->getCode());
            $this->setCode($coupon->getCode());
            $this->setDescription($coupon->getDescription());
            $this->setCustomerScope($coupon->getCustomerScope());
            $this->setDateTimeStart($coupon->getDateTimeStart());
            $this->setDateTimeEnd($coupon->getDateTimeEnd());
            $this->setMaxUse($coupon->getMaxUse());
            $this->setMaxPer($coupon->getMaxPer());
            $this->setActive($coupon->getActive());
        }
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
     * Get Coupon_Code.
     *
     * @return string
     */
    public function getCouponCode() : ?string
    {
        return $this->couponCode;
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
     * Get Code.
     *
     * @return string
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription() : ?string
    {
        return $this->description;
    }

    /**
     * Get CustomerScope.
     *
     * @return string
     */
    public function getCustomerScope() : ?string
    {
        return $this->customerScope;
    }

    /**
     * Get DateTime_Start.
     *
     * @return int
     */
    public function getDateTimeStart() : ?int
    {
        return $this->dateTimeStart;
    }

    /**
     * Get DateTime_End.
     *
     * @return int
     */
    public function getDateTimeEnd() : ?int
    {
        return $this->dateTimeEnd;
    }

    /**
     * Get Max_Use.
     *
     * @return int
     */
    public function getMaxUse() : ?int
    {
        return $this->maxUse;
    }

    /**
     * Get Max_Per.
     *
     * @return int
     */
    public function getMaxPer() : ?int
    {
        return $this->maxPer;
    }

    /**
     * Get Active.
     *
     * @return bool
     */
    public function getActive() : ?bool
    {
        return $this->active;
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
     * Set Code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param ?string $description
     * @return $this
     */
    public function setDescription(?string $description) : self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set CustomerScope.
     *
     * @param ?string $customerScope
     * @return $this
     */
    public function setCustomerScope(?string $customerScope) : self
    {
        $this->customerScope = $customerScope;

        return $this;
    }

    /**
     * Set DateTime_Start.
     *
     * @param ?int|?\DateTime $dateTimeStart
     * @return $this
     */
    public function setDateTimeStart($dateTimeStart) : self
    {
        if ($dateTimeStart instanceof \DateTime) {
            $this->dateTimeStart = $dateTimeStart->getTimestamp();
        } else {
            $this->dateTimeStart = $dateTimeStart;
        }

        return $this;
    }

    /**
     * Set DateTime_End.
     *
     * @param ?int|?\DateTime $dateTimeEnd
     * @return $this
     */
    public function setDateTimeEnd($dateTimeEnd) : self
    {
        if ($dateTimeEnd instanceof \DateTime) {
            $this->dateTimeEnd = $dateTimeEnd->getTimestamp();
        } else {
            $this->dateTimeEnd = $dateTimeEnd;
        }

        return $this;
    }

    /**
     * Set Max_Use.
     *
     * @param ?int $maxUse
     * @return $this
     */
    public function setMaxUse(?int $maxUse) : self
    {
        $this->maxUse = $maxUse;

        return $this;
    }

    /**
     * Set Max_Per.
     *
     * @param ?int $maxPer
     * @return $this
     */
    public function setMaxPer(?int $maxPer) : self
    {
        $this->maxPer = $maxPer;

        return $this;
    }

    /**
     * Set Active.
     *
     * @param ?bool $active
     * @return $this
     */
    public function setActive(?bool $active) : self
    {
        $this->active = $active;

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
        }

        if (!is_null($this->getCouponCode())) {
            $data['Coupon_Code'] = $this->getCouponCode();
        }

        if (!is_null($this->getCode())) {
            $data['Code'] = $this->getCode();
        }

        if (!is_null($this->getDescription())) {
            $data['Description'] = $this->getDescription();
        }

        if (!is_null($this->getCustomerScope())) {
            $data['CustomerScope'] = $this->getCustomerScope();
        }

        if (!is_null($this->getDateTimeStart())) {
            $data['DateTime_Start'] = $this->getDateTimeStart();
        }

        if (!is_null($this->getDateTimeEnd())) {
            $data['DateTime_End'] = $this->getDateTimeEnd();
        }

        if (!is_null($this->getMaxUse())) {
            $data['Max_Use'] = $this->getMaxUse();
        }

        if (!is_null($this->getMaxPer())) {
            $data['Max_Per'] = $this->getMaxPer();
        }

        if (!is_null($this->getActive())) {
            $data['Active'] = $this->getActive();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CouponUpdate($this, $httpResponse, $data);
    }
}
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
 * Handles API Request Coupon_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/coupon_insert
 */
class CouponInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Coupon_Insert';

    /** @var string */
    protected $code;

    /** @var string */
    protected $description;

    /** @var string */
    protected $customerScope;

    /** @var int */
    protected $dateTimeStart;

    /** @var int */
    protected $dateTimeEnd;

    /** @var int */
    protected $maxUse;

    /** @var int */
    protected $maxPer;

    /** @var bool */
    protected $active;

    /** @var int */
    protected $priceGroupId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Coupon
     */
    public function __construct(BaseClient $client = null, Coupon $coupon = null)
    {
        parent::__construct($client);
        if ($coupon) {
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
     * Get Code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get CustomerScope.
     *
     * @return string
     */
    public function getCustomerScope()
    {
        return $this->customerScope;
    }

    /**
     * Get DateTime_Start.
     *
     * @return int
     */
    public function getDateTimeStart()
    {
        return $this->dateTimeStart;
    }

    /**
     * Get DateTime_End.
     *
     * @return int
     */
    public function getDateTimeEnd()
    {
        return $this->dateTimeEnd;
    }

    /**
     * Get Max_Use.
     *
     * @return int
     */
    public function getMaxUse()
    {
        return $this->maxUse;
    }

    /**
     * Get Max_Per.
     *
     * @return int
     */
    public function getMaxPer()
    {
        return $this->maxPer;
    }

    /**
     * Get Active.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
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
     * Set Code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set CustomerScope.
     *
     * @param string
     * @return $this
     */
    public function setCustomerScope($customerScope)
    {
        $this->customerScope = $customerScope;

        return $this;
    }

    /**
     * Set DateTime_Start.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeStart($dateTimeStart)
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
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeEnd($dateTimeEnd)
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
     * @param int
     * @return $this
     */
    public function setMaxUse($maxUse)
    {
        $this->maxUse = $maxUse;

        return $this;
    }

    /**
     * Set Max_Per.
     *
     * @param int
     * @return $this
     */
    public function setMaxPer($maxPer)
    {
        $this->maxPer = $maxPer;

        return $this;
    }

    /**
     * Set Active.
     *
     * @param bool
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Code'] = $this->getCode();

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

        if (!is_null($this->getPriceGroupId())) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CouponInsert($this, $httpResponse, $data);
    }
}
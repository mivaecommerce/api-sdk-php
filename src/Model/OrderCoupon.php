<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Model;

use MerchantAPI\DecimalHelper;

/**
 * Data model for OrderCoupon.
 *
 * @package MerchantAPI\Model
 */
class OrderCoupon extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['total'])) {
            $this->setField('total', DecimalHelper::create($data['total'], 16));
        }
    }

    /**
     * Get order_id.
     *
     * @return ?int
     */
    public function getOrderId() : ?int
    {
        return $this->getField('order_id');
    }

    /**
     * Get coupon_id.
     *
     * @return ?int
     */
    public function getCouponId() : ?int
    {
        return $this->getField('coupon_id');
    }

    /**
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get total.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getTotal() 
    {
        return $this->getField('total');
    }

    /**
     * Get assigned.
     *
     * @return ?bool
     */
    public function getAssigned() : ?bool
    {
        return $this->getField('assigned');
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        $data = parent::getData();

        if (isset($data['total'])) {
            $data['total'] = DecimalHelper::serialize($data['total'], 8);
        }

        return $data;
    }
}
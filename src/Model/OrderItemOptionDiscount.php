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
 * Data model for OrderItemOptionDiscount.
 *
 * @package MerchantAPI\Model
 */
class OrderItemOptionDiscount extends \MerchantAPI\Model
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

        if (isset($data['discount'])) {
            $this->setField('discount', DecimalHelper::create($data['discount'], 16));
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
     * Get line_id.
     *
     * @return ?int
     */
    public function getLineId() : ?int
    {
        return $this->getField('line_id');
    }

    /**
     * Get attr_id.
     *
     * @return ?int
     */
    public function getAttributeId() : ?int
    {
        return $this->getField('attr_id');
    }

    /**
     * Get attmpat_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->getField('attmpat_id');
    }

    /**
     * Get pgrp_id.
     *
     * @return ?int
     */
    public function getPriceGroupId() : ?int
    {
        return $this->getField('pgrp_id');
    }

    /**
     * Get display.
     *
     * @return ?bool
     */
    public function getDisplay() : ?bool
    {
        return $this->getField('display');
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
     * Get discount.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getDiscount() 
    {
        return $this->getField('discount');
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        $data = parent::getData();

        if (isset($data['discount'])) {
            $data['discount'] = DecimalHelper::serialize($data['discount'], 8);
        }

        return $data;
    }
}
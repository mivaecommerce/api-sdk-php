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
 * Data model for OrderPart.
 *
 * @package MerchantAPI\Model
 */
class OrderPart extends \MerchantAPI\Model
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

        if (isset($data['price'])) {
            $this->setField('price', DecimalHelper::create($data['price'], 16));
        }
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
     * Get sku.
     *
     * @return ?string
     */
    public function getSku() : ?string
    {
        return $this->getField('sku');
    }

    /**
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get quantity.
     *
     * @return ?int
     */
    public function getQuantity() : ?int
    {
        return $this->getField('quantity');
    }

    /**
     * Get total_quantity.
     *
     * @return ?int
     */
    public function getTotalQuantity() : ?int
    {
        return $this->getField('total_quantity');
    }

    /**
     * Get price.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getPrice() 
    {
        return $this->getField('price');
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        $data = parent::getData();

        if (isset($data['price'])) {
            $data['price'] = DecimalHelper::serialize($data['price'], 8);
        }

        return $data;
    }
}
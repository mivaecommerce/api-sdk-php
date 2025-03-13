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
 * Data model for RelatedProduct.
 *
 * @package MerchantAPI\Model
 */
class RelatedProduct extends \MerchantAPI\Model
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

        if (isset($data['cost'])) {
            $this->setField('cost', DecimalHelper::create($data['cost'], 16));
        }

        if (isset($data['weight'])) {
            $this->setField('weight', DecimalHelper::create($data['weight'], 16));
        }
    }

    /**
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
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
     * Get thumbnail.
     *
     * @return ?string
     */
    public function getThumbnail() : ?string
    {
        return $this->getField('thumbnail');
    }

    /**
     * Get image.
     *
     * @return ?string
     */
    public function getImage() : ?string
    {
        return $this->getField('image');
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
     * Get formatted_price.
     *
     * @return ?string
     */
    public function getFormattedPrice() : ?string
    {
        return $this->getField('formatted_price');
    }

    /**
     * Get cost.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getCost() 
    {
        return $this->getField('cost');
    }

    /**
     * Get formatted_cost.
     *
     * @return ?string
     */
    public function getFormattedCost() : ?string
    {
        return $this->getField('formatted_cost');
    }

    /**
     * Get weight.
     *
     * @return ?(float|string|int|Decimal)
     */
    public function getWeight() 
    {
        return $this->getField('weight');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }

    /**
     * Get page_title.
     *
     * @return ?string
     */
    public function getPageTitle() : ?string
    {
        return $this->getField('page_title');
    }

    /**
     * Get taxable.
     *
     * @return ?bool
     */
    public function getTaxable() : ?bool
    {
        return $this->getField('taxable');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getDateTimeCreated() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get dt_updated.
     *
     * @return ?int
     */
    public function getDateTimeUpdated() : ?int
    {
        return $this->getTimestampField('dt_updated');
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
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        return $this->getField('disp_order');
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
        if (isset($data['cost'])) {
            $data['cost'] = DecimalHelper::serialize($data['cost'], 8);
        }
        if (isset($data['weight'])) {
            $data['weight'] = DecimalHelper::serialize($data['weight'], 8);
        }

        return $data;
    }
}
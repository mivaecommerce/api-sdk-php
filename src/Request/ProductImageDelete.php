<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\ProductImageData;

/**
 * Handles API Request ProductImage_Delete.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productimage_delete
 */
class ProductImageDelete extends Request
{
    /** @var string The API function name */
    protected $function = 'ProductImage_Delete';

    /** @var int */
    protected $productImageId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\ProductImageData
     */
    public function __construct(ProductImageData $productImageData = null)
    {
        if ($productImageData) {
            $this->setProductImageId($productImageData->getId());
        }
    }

    /**
     * Get ProductImage_ID.
     *
     * @return int
     */
    public function getProductImageId()
    {
        return $this->productImageId;
    }

    /**
     * Set ProductImage_ID.
     *
     * @param int
     * @return $this
     */
    public function setProductImageId($productImageId)
    {
        $this->productImageId = $productImageId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        $data['ProductImage_ID'] = $this->getProductImageId();

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductImageDelete($this, $httpResponse, $data);
    }
}
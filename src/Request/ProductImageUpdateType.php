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
use MerchantAPI\BaseClient;

/**
 * Handles API Request ProductImage_Update_Type.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productimage_update_type
 */
class ProductImageUpdateType extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ProductImage_Update_Type';

    /** @var int */
    protected $productImageId;

    /** @var int */
    protected $imageTypeId;

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
     * Get ImageType_ID.
     *
     * @return int
     */
    public function getImageTypeId()
    {
        return $this->imageTypeId;
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
     * Set ImageType_ID.
     *
     * @param int
     * @return $this
     */
    public function setImageTypeId($imageTypeId)
    {
        $this->imageTypeId = $imageTypeId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['ProductImage_ID'] = $this->getProductImageId();

        if (!is_null($this->getImageTypeId())) {
            $data['ImageType_ID'] = $this->getImageTypeId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductImageUpdateType($this, $httpResponse, $data);
    }
}
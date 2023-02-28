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
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductImage_Update_Type';

    /** @var ?int */
    protected ?int $productImageId = null;

    /** @var ?int */
    protected ?int $imageTypeId = null;

    /**
     * Get ProductImage_ID.
     *
     * @return int
     */
    public function getProductImageId() : ?int
    {
        return $this->productImageId;
    }

    /**
     * Get ImageType_ID.
     *
     * @return int
     */
    public function getImageTypeId() : ?int
    {
        return $this->imageTypeId;
    }

    /**
     * Set ProductImage_ID.
     *
     * @param ?int $productImageId
     * @return $this
     */
    public function setProductImageId(?int $productImageId) : self
    {
        $this->productImageId = $productImageId;

        return $this;
    }

    /**
     * Set ImageType_ID.
     *
     * @param ?int $imageTypeId
     * @return $this
     */
    public function setImageTypeId(?int $imageTypeId) : self
    {
        $this->imageTypeId = $imageTypeId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductImageUpdateType($this, $httpResponse, $data);
    }
}
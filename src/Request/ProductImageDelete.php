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
use MerchantAPI\Model\ProductImageData;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ProductImage_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productimage_delete
 */
class ProductImageDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductImage_Delete';

    /** @var ?int */
    protected ?int $productImageId = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\ProductImageData $productImageData
     */
    public function __construct(?BaseClient $client = null, ?ProductImageData $productImageData = null)
    {
        parent::__construct($client);
        if ($productImageData) {
            $this->setProductImageId($productImageData->getId());
        }
    }

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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['ProductImage_ID'] = $this->getProductImageId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductImageDelete($this, $httpResponse, $data);
    }
}
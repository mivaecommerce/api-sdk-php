<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\ProductImageData;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for ProductImage_Add.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productimage_add
 */
class ProductImageAdd extends Response
{
    /** @var ?\MerchantAPI\Model\ProductImageData */
    protected ?ProductImageData $productImageData = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->productImageData = new ProductImageData($this->data['data']);
    }

    /**
     * Get productImageData.
     *
     * @return \MerchantAPI\Model\ProductImageData|null
     */
    public function getProductImageData() : ?ProductImageData
    {
        return $this->productImageData;
    }
}
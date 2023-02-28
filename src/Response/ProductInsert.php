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
use MerchantAPI\Model\Product;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Product_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/product_insert
 */
class ProductInsert extends Response
{
    /** @var ?\MerchantAPI\Model\Product */
    protected ?Product $product = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->product = new Product($this->data['data']);
    }

    /**
     * Get product.
     *
     * @return \MerchantAPI\Model\Product|null
     */
    public function getProduct() : ?Product
    {
        return $this->product;
    }
}
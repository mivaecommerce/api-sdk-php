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

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\ProductVariant;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for ProductVariantList_Load_Product.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productvariantlist_load_product
 */
class ProductVariantListLoadProduct extends Response
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariant[] */
    protected $productVariants = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->productVariants = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }
        
        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->productVariants[] = new ProductVariant($result);
            }
        }
    }

    /**
     * Get productVariants.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductVariant[]
     */
    public function getProductVariants()
    {
        return $this->productVariants;
    }
}
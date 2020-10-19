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

use MerchantAPI\ListQuery\ListQueryResponse;
use MerchantAPI\Model\PriceGroupProduct;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PriceGroupProductList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/pricegroupproductlist_load_query
 */
class PriceGroupProductListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupProduct[] */
    protected $priceGroupProducts = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->priceGroupProducts = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->priceGroupProducts[] = new PriceGroupProduct($result);
            }
        }
    }

    /**
     * Get priceGroupProducts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupProduct[]
     */
    public function getPriceGroupProducts()
    {
        return $this->priceGroupProducts;
    }
}
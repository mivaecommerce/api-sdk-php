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
use MerchantAPI\Model\AvailabilityGroupProduct;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AvailabilityGroupProductList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/availabilitygroupproductlist_load_query
 */
class AvailabilityGroupProductListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupProduct[] */
    protected $availabilityGroupProducts = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->availabilityGroupProducts = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->availabilityGroupProducts[] = new AvailabilityGroupProduct($result);
            }
        }
    }

    /**
     * Get availabilityGroupProducts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupProduct[]
     */
    public function getAvailabilityGroupProducts()
    {
        return $this->availabilityGroupProducts;
    }
}
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
use MerchantAPI\Model\PriceGroupCategory;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PriceGroupExcludedCategoryList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/pricegroupexcludedcategorylist_load_query
 */
class PriceGroupExcludedCategoryListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupCategory[] */
    protected $priceGroupCategories = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->priceGroupCategories = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->priceGroupCategories[] = new PriceGroupCategory($result);
            }
        }
    }

    /**
     * Get priceGroupCategories.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\PriceGroupCategory[]
     */
    public function getPriceGroupCategories()
    {
        return $this->priceGroupCategories;
    }
}
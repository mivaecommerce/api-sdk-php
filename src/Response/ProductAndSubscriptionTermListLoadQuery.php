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
use MerchantAPI\Model\ProductAndSubscriptionTerm;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for ProductAndSubscriptionTermList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/productandsubscriptiontermlist_load_query
 */
class ProductAndSubscriptionTermListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $productAndSubscriptionTerms;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->productAndSubscriptionTerms = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->productAndSubscriptionTerms[] = new ProductAndSubscriptionTerm($result);
            }
        }
    }

    /**
     * Get productAndSubscriptionTerms.
     *
     * @return \MerchantAPI\Collection
     */
    public function getProductAndSubscriptionTerms() : Collection
    {
        return $this->productAndSubscriptionTerms;
    }
}
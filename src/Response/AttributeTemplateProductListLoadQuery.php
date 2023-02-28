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
use MerchantAPI\Model\AttributeTemplateProduct;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for AttributeTemplateProductList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributetemplateproductlist_load_query
 */
class AttributeTemplateProductListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $attributeTemplateProducts;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->attributeTemplateProducts = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->attributeTemplateProducts[] = new AttributeTemplateProduct($result);
            }
        }
    }

    /**
     * Get attributeTemplateProducts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAttributeTemplateProducts() : Collection
    {
        return $this->attributeTemplateProducts;
    }
}
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
use MerchantAPI\Model\ProductAttribute;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for AttributeAndOptionList_Load_Product.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributeandoptionlist_load_product
 */
class AttributeAndOptionListLoadProduct extends Response
{
    /** @var \MerchantAPI\Collection */
    protected Collection $productAttributes;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->productAttributes = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->productAttributes[] = new ProductAttribute($result);
            }
        }
    }

    /**
     * Get productAttributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getProductAttributes() : Collection
    {
        return $this->productAttributes;
    }
}
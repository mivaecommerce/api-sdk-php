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

/**
 * API Response for Attribute_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attribute_insert
 */
class AttributeInsert extends Response
{
    /** @var ?\MerchantAPI\Model\ProductAttribute */
    protected ?ProductAttribute $productAttribute = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->productAttribute = new ProductAttribute($this->data['data']);
    }

    /**
     * Get productAttribute.
     *
     * @return \MerchantAPI\Model\ProductAttribute|null
     */
    public function getProductAttribute() : ?ProductAttribute
    {
        return $this->productAttribute;
    }
}
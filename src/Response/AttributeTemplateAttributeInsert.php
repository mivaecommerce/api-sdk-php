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
use MerchantAPI\Model\AttributeTemplateAttribute;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AttributeTemplateAttribute_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributetemplateattribute_insert
 */
class AttributeTemplateAttributeInsert extends Response
{
    /** @var \MerchantAPI\Model\AttributeTemplateAttribute */
    protected $attributeTemplateAttribute;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->attributeTemplateAttribute = new AttributeTemplateAttribute($this->data['data']);
    }

    /**
     * Get attributeTemplateAttribute.
     *
     * @return \MerchantAPI\Model\AttributeTemplateAttribute|null
     */
    public function getAttributeTemplateAttribute()
    {
        return $this->attributeTemplateAttribute;
    }
}
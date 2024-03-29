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
use MerchantAPI\Model\AttributeTemplate;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AttributeTemplate_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributetemplate_insert
 */
class AttributeTemplateInsert extends Response
{
    /** @var ?\MerchantAPI\Model\AttributeTemplate */
    protected ?AttributeTemplate $attributeTemplate = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->attributeTemplate = new AttributeTemplate($this->data['data']);
    }

    /**
     * Get attributeTemplate.
     *
     * @return \MerchantAPI\Model\AttributeTemplate|null
     */
    public function getAttributeTemplate() : ?AttributeTemplate
    {
        return $this->attributeTemplate;
    }
}
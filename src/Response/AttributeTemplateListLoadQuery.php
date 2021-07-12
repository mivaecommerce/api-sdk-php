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
use MerchantAPI\Model\AttributeTemplate;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AttributeTemplateList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributetemplatelist_load_query
 */
class AttributeTemplateListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\AttributeTemplate[] */
    protected $attributeTemplates = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->attributeTemplates = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->attributeTemplates[] = new AttributeTemplate($result);
            }
        }
    }

    /**
     * Get attributeTemplates.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AttributeTemplate[]
     */
    public function getAttributeTemplates()
    {
        return $this->attributeTemplates;
    }
}
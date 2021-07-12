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
use MerchantAPI\Model\AttributeTemplateOption;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AttributeTemplateOptionList_Load_Attribute.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/attributetemplateoptionlist_load_attribute
 */
class AttributeTemplateOptionListLoadAttribute extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\AttributeTemplateOption[] */
    protected $attributeTemplateOptions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->attributeTemplateOptions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->attributeTemplateOptions[] = new AttributeTemplateOption($result);
            }
        }
    }

    /**
     * Get attributeTemplateOptions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AttributeTemplateOption[]
     */
    public function getAttributeTemplateOptions()
    {
        return $this->attributeTemplateOptions;
    }
}
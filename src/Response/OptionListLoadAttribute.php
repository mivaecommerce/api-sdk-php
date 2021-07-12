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
use MerchantAPI\Model\ProductOption;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for OptionList_Load_Attribute.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/optionlist_load_attribute
 */
class OptionListLoadAttribute extends Response
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProductOption[] */
    protected $productOptions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->productOptions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->productOptions[] = new ProductOption($result);
            }
        }
    }

    /**
     * Get productOptions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductOption[]
     */
    public function getProductOptions()
    {
        return $this->productOptions;
    }
}
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
 * API Response for Option_Load_Code.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/option_load_code
 */
class OptionLoadCode extends Response
{
    /** @var ?\MerchantAPI\Model\ProductOption */
    protected ?ProductOption $productOption = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->productOption = new ProductOption($this->data['data']);
    }

    /**
     * Get productOption.
     *
     * @return \MerchantAPI\Model\ProductOption|null
     */
    public function getProductOption() : ?ProductOption
    {
        return $this->productOption;
    }
}
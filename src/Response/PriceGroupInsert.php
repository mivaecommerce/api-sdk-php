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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PriceGroup_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/pricegroup_insert
 */
class PriceGroupInsert extends Response
{
    /** @var ?\MerchantAPI\Model\PriceGroup */
    protected ?PriceGroup $priceGroup = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->priceGroup = new PriceGroup($this->data['data']);
    }

    /**
     * Get priceGroup.
     *
     * @return \MerchantAPI\Model\PriceGroup|null
     */
    public function getPriceGroup() : ?PriceGroup
    {
        return $this->priceGroup;
    }
}
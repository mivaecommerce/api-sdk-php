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
use MerchantAPI\Model\OrderCustomField;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for OrderCustomFieldList_Load.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/ordercustomfieldlist_load
 */
class OrderCustomFieldListLoad extends Response
{
    /** @var \MerchantAPI\Collection */
    protected Collection $orderCustomFields;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->orderCustomFields = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->orderCustomFields[] = new OrderCustomField($result);
            }
        }
    }

    /**
     * Get orderCustomFields.
     *
     * @return \MerchantAPI\Collection
     */
    public function getOrderCustomFields() : Collection
    {
        return $this->orderCustomFields;
    }
}
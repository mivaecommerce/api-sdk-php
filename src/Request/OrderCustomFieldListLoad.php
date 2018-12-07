<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\OrderCustomField;

/**
 * Handles API Request OrderCustomFieldList_Load.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordercustomfieldlist_load
 */
class OrderCustomFieldListLoad extends Request
{
    /** @var string The API function name */
    protected $function = 'OrderCustomFieldList_Load';

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderCustomFieldListLoad($this, $httpResponse, $data);
    }
}
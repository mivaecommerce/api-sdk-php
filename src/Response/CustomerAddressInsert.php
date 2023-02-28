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
use MerchantAPI\Model\CustomerAddress;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CustomerAddress_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/customeraddress_insert
 */
class CustomerAddressInsert extends Response
{
    /** @var ?\MerchantAPI\Model\CustomerAddress */
    protected ?CustomerAddress $customerAddress = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->customerAddress = new CustomerAddress($this->data['data']);
    }

    /**
     * Get customerAddress.
     *
     * @return \MerchantAPI\Model\CustomerAddress|null
     */
    public function getCustomerAddress() : ?CustomerAddress
    {
        return $this->customerAddress;
    }
}
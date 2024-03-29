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
use MerchantAPI\Model\Customer;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Customer_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/customer_insert
 */
class CustomerInsert extends Response
{
    /** @var ?\MerchantAPI\Model\Customer */
    protected ?Customer $customer = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->customer = new Customer($this->data['data']);
    }

    /**
     * Get customer.
     *
     * @return \MerchantAPI\Model\Customer|null
     */
    public function getCustomer() : ?Customer
    {
        return $this->customer;
    }
}
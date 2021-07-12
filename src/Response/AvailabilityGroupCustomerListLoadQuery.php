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
use MerchantAPI\Model\AvailabilityGroupCustomer;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AvailabilityGroupCustomerList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/availabilitygroupcustomerlist_load_query
 */
class AvailabilityGroupCustomerListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupCustomer[] */
    protected $availabilityGroupCustomers = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->availabilityGroupCustomers = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->availabilityGroupCustomers[] = new AvailabilityGroupCustomer($result);
            }
        }
    }

    /**
     * Get availabilityGroupCustomers.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupCustomer[]
     */
    public function getAvailabilityGroupCustomers()
    {
        return $this->availabilityGroupCustomers;
    }
}
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
use MerchantAPI\Model\AvailabilityGroupBusinessAccount;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AvailabilityGroupBusinessAccountList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/availabilitygroupbusinessaccountlist_load_query
 */
class AvailabilityGroupBusinessAccountListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupBusinessAccount[] */
    protected $availabilityGroupBusinessAccounts = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->availabilityGroupBusinessAccounts = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->availabilityGroupBusinessAccounts[] = new AvailabilityGroupBusinessAccount($result);
            }
        }
    }

    /**
     * Get availabilityGroupBusinessAccounts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\AvailabilityGroupBusinessAccount[]
     */
    public function getAvailabilityGroupBusinessAccounts()
    {
        return $this->availabilityGroupBusinessAccounts;
    }
}
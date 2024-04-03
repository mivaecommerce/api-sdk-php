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
use MerchantAPI\Model\CouponBusinessAccount;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for CouponBusinessAccountList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/couponbusinessaccountlist_load_query
 */
class CouponBusinessAccountListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $couponBusinessAccounts;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->couponBusinessAccounts = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->couponBusinessAccounts[] = new CouponBusinessAccount($result);
            }
        }
    }

    /**
     * Get couponBusinessAccounts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCouponBusinessAccounts() : Collection
    {
        return $this->couponBusinessAccounts;
    }
}
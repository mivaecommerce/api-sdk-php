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
use MerchantAPI\Model\CouponPriceGroup;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CouponPriceGroupList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/couponpricegrouplist_load_query
 */
class CouponPriceGroupListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\CouponPriceGroup[] */
    protected $couponPriceGroups = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->couponPriceGroups = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->couponPriceGroups[] = new CouponPriceGroup($result);
            }
        }
    }

    /**
     * Get couponPriceGroups.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\CouponPriceGroup[]
     */
    public function getCouponPriceGroups()
    {
        return $this->couponPriceGroups;
    }
}
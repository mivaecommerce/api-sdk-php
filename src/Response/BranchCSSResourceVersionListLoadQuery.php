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
use MerchantAPI\Model\BranchCSSResourceVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for BranchCSSResourceVersionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branchcssresourceversionlist_load_query
 */
class BranchCSSResourceVersionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\BranchCSSResourceVersion[] */
    protected $branchCSSResourceVersions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->branchCSSResourceVersions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->branchCSSResourceVersions[] = new BranchCSSResourceVersion($result);
            }
        }
    }

    /**
     * Get branchCSSResourceVersions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\BranchCSSResourceVersion[]
     */
    public function getBranchCSSResourceVersions()
    {
        return $this->branchCSSResourceVersions;
    }
}
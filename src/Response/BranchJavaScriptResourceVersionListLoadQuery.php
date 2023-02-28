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
use MerchantAPI\Model\BranchJavaScriptResourceVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for BranchJavaScriptResourceVersionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branchjavascriptresourceversionlist_load_query
 */
class BranchJavaScriptResourceVersionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $branchJavaScriptResourceVersions;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->branchJavaScriptResourceVersions = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->branchJavaScriptResourceVersions[] = new BranchJavaScriptResourceVersion($result);
            }
        }
    }

    /**
     * Get branchJavaScriptResourceVersions.
     *
     * @return \MerchantAPI\Collection
     */
    public function getBranchJavaScriptResourceVersions() : Collection
    {
        return $this->branchJavaScriptResourceVersions;
    }
}
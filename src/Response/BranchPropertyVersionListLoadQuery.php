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
use MerchantAPI\Model\BranchPropertyVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for BranchPropertyVersionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branchpropertyversionlist_load_query
 */
class BranchPropertyVersionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\BranchPropertyVersion[] */
    protected $branchPropertyVersions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->branchPropertyVersions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->branchPropertyVersions[] = new BranchPropertyVersion($result);
            }
        }
    }

    /**
     * Get branchPropertyVersions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\BranchPropertyVersion[]
     */
    public function getBranchPropertyVersions()
    {
        return $this->branchPropertyVersions;
    }
}
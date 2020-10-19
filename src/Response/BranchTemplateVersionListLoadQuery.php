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
use MerchantAPI\Model\BranchTemplateVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for BranchTemplateVersionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branchtemplateversionlist_load_query
 */
class BranchTemplateVersionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\BranchTemplateVersion[] */
    protected $branchTemplateVersions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->branchTemplateVersions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->branchTemplateVersions[] = new BranchTemplateVersion($result);
            }
        }
    }

    /**
     * Get branchTemplateVersions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\BranchTemplateVersion[]
     */
    public function getBranchTemplateVersions()
    {
        return $this->branchTemplateVersions;
    }
}
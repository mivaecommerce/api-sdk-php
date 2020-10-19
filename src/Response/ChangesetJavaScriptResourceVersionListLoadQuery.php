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
use MerchantAPI\Model\ChangesetJavaScriptResourceVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for ChangesetJavaScriptResourceVersionList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/changesetjavascriptresourceversionlist_load_query
 */
class ChangesetJavaScriptResourceVersionListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ChangesetJavaScriptResourceVersion[] */
    protected $changesetJavaScriptResourceVersions = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->changesetJavaScriptResourceVersions = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->changesetJavaScriptResourceVersions[] = new ChangesetJavaScriptResourceVersion($result);
            }
        }
    }

    /**
     * Get changesetJavaScriptResourceVersions.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ChangesetJavaScriptResourceVersion[]
     */
    public function getChangesetJavaScriptResourceVersions()
    {
        return $this->changesetJavaScriptResourceVersions;
    }
}
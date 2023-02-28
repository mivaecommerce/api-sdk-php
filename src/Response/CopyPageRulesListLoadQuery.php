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
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for CopyPageRulesList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/copypageruleslist_load_query
 */
class CopyPageRulesListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $copyPageRules;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->copyPageRules = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->copyPageRules[] = new CopyPageRule($result);
            }
        }
    }

    /**
     * Get copyPageRules.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCopyPageRules() : Collection
    {
        return $this->copyPageRules;
    }
}
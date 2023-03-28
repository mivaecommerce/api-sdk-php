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

use MerchantAPI\Response;
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CopyPageRules_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/copypagerules_insert
 */
class CopyPageRulesInsert extends Response
{
    /** @var ?\MerchantAPI\Model\CopyPageRule */
    protected ?CopyPageRule $copyPageRule = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->copyPageRule = new CopyPageRule($this->data['data']);
    }

    /**
     * Get copyPageRule.
     *
     * @return \MerchantAPI\Model\CopyPageRule|null
     */
    public function getCopyPageRule() : ?CopyPageRule
    {
        return $this->copyPageRule;
    }
}
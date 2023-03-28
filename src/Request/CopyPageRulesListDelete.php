<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyPageRulesList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copypageruleslist_delete
 */
class CopyPageRulesListDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyPageRulesList_Delete';

    /** @var int[] */
    protected array $copyPageRulesIds = [];

    /**
     * Get CopyPageRules_IDs.
     *
     * @return array
     */
    public function getCopyPageRulesIds() : array
    {
        return $this->copyPageRulesIds;
    }

    /**
     * Add CopyPageRules_IDs.
     *
     * @param int $copyPageRuleId
     * @return $this
     */
    public function addCopyPageRuleId(int $copyPageRuleId) : self
    {
        $this->copyPageRulesIds[] = $copyPageRuleId;
        return $this;
    }

    /**
     * Add CopyPageRule model.
     *
     * @param \MerchantAPI\Model\CopyPageRule $copyPageRule
     * @return $this
     */
    public function addCopyPageRule(CopyPageRule $copyPageRule) : self
    {
        if ($copyPageRule->getId()) {
            $this->copyPageRulesIds[] = $copyPageRule->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['CopyPageRules_IDs'] = $this->getCopyPageRulesIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyPageRulesListDelete($this, $httpResponse, $data);
    }
}
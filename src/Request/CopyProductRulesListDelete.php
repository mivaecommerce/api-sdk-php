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
use MerchantAPI\Model\CopyProductRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyProductRulesList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copyproductruleslist_delete
 */
class CopyProductRulesListDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyProductRulesList_Delete';

    /** @var int[] */
    protected array $copyProductRulesIds = [];

    /**
     * Get CopyProductRules_IDs.
     *
     * @return array
     */
    public function getCopyProductRulesIds() : array
    {
        return $this->copyProductRulesIds;
    }

    /**
     * Add CopyProductRules_IDs.
     *
     * @param int $copyProductRuleId
     * @return $this
     */
    public function addCopyProductRuleId(int $copyProductRuleId) : self
    {
        $this->copyProductRulesIds[] = $copyProductRuleId;
        return $this;
    }

    /**
     * Add CopyProductRule model.
     *
     * @param \MerchantAPI\Model\CopyProductRule $copyProductRule
     * @return $this
     */
    public function addCopyProductRule(CopyProductRule $copyProductRule) : self
    {
        if ($copyProductRule->getId()) {
            $this->copyProductRulesIds[] = $copyProductRule->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['CopyProductRules_IDs'] = $this->getCopyProductRulesIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyProductRulesListDelete($this, $httpResponse, $data);
    }
}
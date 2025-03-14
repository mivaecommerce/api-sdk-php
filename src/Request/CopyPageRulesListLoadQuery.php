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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyPageRulesList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copypageruleslist_load_query
 */
class CopyPageRulesListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyPageRulesList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'name',
        'secure',
        'title',
        'template',
        'items',
        'settings',
        'jsres',
        'cssres',
        'cacheset',
        'public',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'name',
        'secure',
        'title',
        'template',
        'items',
        'settings',
        'jsres',
        'cssres',
        'cacheset',
        'public',
    ];

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyPageRulesListLoadQuery($this, $httpResponse, $data);
    }
}
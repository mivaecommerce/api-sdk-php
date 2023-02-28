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
use MerchantAPI\Model\Note;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request NoteList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/notelist_load_query
 */
class NoteListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'NoteList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'notetext',
        'dtstamp',
        'cust_id',
        'account_id',
        'order_id',
        'admin_user',
        'cust_login',
        'business_title',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'notetext',
        'dtstamp',
        'cust_id',
        'account_id',
        'order_id',
        'admin_user',
        'cust_login',
        'business_title',
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
        return new \MerchantAPI\Response\NoteListLoadQuery($this, $httpResponse, $data);
    }
}
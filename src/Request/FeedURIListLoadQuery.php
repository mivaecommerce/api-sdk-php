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
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;

/**
 * Handles API Request FeedURIList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/feedurilist_load_query
 */
class FeedURIListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'FeedURIList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'canonical',
        'status',
        'uri',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'uri',
    ];

    /** @var int */
    protected $feedId;

    /** @var string */
    protected $feedCode;

    /**
     * Get Feed_ID.
     *
     * @return int
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * Get Feed_Code.
     *
     * @return string
     */
    public function getFeedCode()
    {
        return $this->feedCode;
    }

    /**
     * Set Feed_ID.
     *
     * @param int
     * @return $this
     */
    public function setFeedId($feedId)
    {
        $this->feedId = $feedId;

        return $this;
    }

    /**
     * Set Feed_Code.
     *
     * @param string
     * @return $this
     */
    public function setFeedCode($feedCode)
    {
        $this->feedCode = $feedCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getFeedId()) {
            $data['Feed_ID'] = $this->getFeedId();
        } else if ($this->getFeedCode()) {
            $data['Feed_Code'] = $this->getFeedCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\FeedURIListLoadQuery($this, $httpResponse, $data);
    }
}
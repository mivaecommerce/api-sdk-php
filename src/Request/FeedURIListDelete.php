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
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;

/**
 * Handles API Request FeedURIList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/feedurilist_delete
 */
class FeedURIListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'FeedURIList_Delete';

    /** @var int[] */
    protected $uRIIds = [];

    /**
     * Get URI_IDs.
     *
     * @return array
     */
    public function getURIIds()
    {
        return $this->uRIIds;
    }

    /**
     * Add URI_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addUriID($uriId)
    {
        $this->uRIIds[] = $uriId;
        return $this;
    }

    /**
     * Add Uri model.
     *
     * @param \MerchantAPI\Model\Uri
     * @return $this
     */
    public function addUri(Uri $uri)
    {
        if ($uri->getId()) {
            $this->uRIIds[] = $uri->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['URI_IDs'] = $this->getURIIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\FeedURIListDelete($this, $httpResponse, $data);
    }
}
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
 * Handles API Request URIList_Delete.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/urilist_delete
 */
class URIListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected $function = 'URIList_Delete';

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
        return new \MerchantAPI\Response\URIListDelete($this, $httpResponse, $data);
    }
}
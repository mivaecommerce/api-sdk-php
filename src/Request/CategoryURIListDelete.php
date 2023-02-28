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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CategoryURIList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categoryurilist_delete
 */
class CategoryURIListDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CategoryURIList_Delete';

    /** @var int[] */
    protected array $uRIIds = [];

    /**
     * Get URI_IDs.
     *
     * @return array
     */
    public function getURIIds() : array
    {
        return $this->uRIIds;
    }

    /**
     * Add URI_IDs.
     *
     * @param int $uriId
     * @return $this
     */
    public function addUriID(int $uriId) : self
    {
        $this->uRIIds[] = $uriId;
        return $this;
    }

    /**
     * Add Uri model.
     *
     * @param \MerchantAPI\Model\Uri $uri
     * @return $this
     */
    public function addUri(Uri $uri) : self
    {
        if ($uri->getId()) {
            $this->uRIIds[] = $uri->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['URI_IDs'] = $this->getURIIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CategoryURIListDelete($this, $httpResponse, $data);
    }
}
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
 * Handles API Request URI_Delete.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/uri_delete
 */
class URIDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected $function = 'URI_Delete';

    /** @var int */
    protected $uRIId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Uri
     */
    public function __construct(BaseClient $client = null, Uri $uri = null)
    {
        parent::__construct($client);
        if ($uri) {
            if ($uri->getId()) {
                $this->setURIId($uri->getId());
            }
        }
    }

    /**
     * Get URI_ID.
     *
     * @return int
     */
    public function getURIId()
    {
        return $this->uRIId;
    }

    /**
     * Set URI_ID.
     *
     * @param int
     * @return $this
     */
    public function setURIId($uRIId)
    {
        $this->uRIId = $uRIId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getURIId()) {
            $data['URI_ID'] = $this->getURIId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\URIDelete($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\ProvisionMessage;
use MerchantAPI\BaseClient;

/**
 * Handles API Request Provision_Store.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/provision_store
 */
class ProvisionStore extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Provision_Store';

    /** @var string */
    protected $xml;

    /**
     * Get xml.
     *
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * Set xml.
     *
     * @param string
     * @return $this
     */
    public function setXml($xml)
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['XML'] = $this->getXml();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProvisionStore($this, $httpResponse, $data);
    }
}
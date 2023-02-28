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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Provision_Domain.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/provision_domain
 */
class ProvisionDomain extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected string $function = 'Provision_Domain';

    /** @var ?string */
    protected ?string $xml = null;

    /**
     * Get xml.
     *
     * @return string
     */
    public function getXml() : ?string
    {
        return $this->xml;
    }

    /**
     * Set xml.
     *
     * @param ?string $xml
     * @return $this
     */
    public function setXml(?string $xml) : self
    {
        $this->xml = $xml;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['XML'] = $this->getXml();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProvisionDomain($this, $httpResponse, $data);
    }
}
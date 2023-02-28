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
 * Handles API Request URI_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/uri_insert
 */
class URIInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'URI_Insert';

    /** @var ?string */
    protected ?string $uRI = null;

    /** @var ?string */
    protected ?string $destinationType = null;

    /** @var ?string */
    protected ?string $destination = null;

    /** @var ?int */
    protected ?int $status = null;

    /** @var ?bool */
    protected ?bool $canonical = null;

    /**
     * Get URI.
     *
     * @return string
     */
    public function getURI() : ?string
    {
        return $this->uRI;
    }

    /**
     * Get Destination_Type.
     *
     * @return string
     */
    public function getDestinationType() : ?string
    {
        return $this->destinationType;
    }

    /**
     * Get Destination.
     *
     * @return string
     */
    public function getDestination() : ?string
    {
        return $this->destination;
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus() : ?int
    {
        return $this->status;
    }

    /**
     * Get Canonical.
     *
     * @return bool
     */
    public function getCanonical() : ?bool
    {
        return $this->canonical;
    }

    /**
     * Set URI.
     *
     * @param ?string $uRI
     * @return $this
     */
    public function setURI(?string $uRI) : self
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * Set Destination_Type.
     *
     * @param ?string $destinationType
     * @return $this
     */
    public function setDestinationType(?string $destinationType) : self
    {
        $this->destinationType = $destinationType;

        return $this;
    }

    /**
     * Set Destination.
     *
     * @param ?string $destination
     * @return $this
     */
    public function setDestination(?string $destination) : self
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Set Status.
     *
     * @param ?int $status
     * @return $this
     */
    public function setStatus(?int $status) : self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set Canonical.
     *
     * @param ?bool $canonical
     * @return $this
     */
    public function setCanonical(?bool $canonical) : self
    {
        $this->canonical = $canonical;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if (!is_null($this->getURI())) {
            $data['URI'] = $this->getURI();
        }

        if (!is_null($this->getDestinationType())) {
            $data['Destination_Type'] = $this->getDestinationType();
        }

        if (!is_null($this->getDestination())) {
            $data['Destination'] = $this->getDestination();
        }

        if (!is_null($this->getStatus())) {
            $data['Status'] = $this->getStatus();
        }

        if (!is_null($this->getCanonical())) {
            $data['Canonical'] = $this->getCanonical();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\URIInsert($this, $httpResponse, $data);
    }
}
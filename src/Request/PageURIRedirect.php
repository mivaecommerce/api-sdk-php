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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PageURI_Redirect.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pageuri_redirect
 */
class PageURIRedirect extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PageURI_Redirect';

    /** @var ?string */
    protected ?string $destinationStoreCode = null;

    /** @var ?string */
    protected ?string $destinationType = null;

    /** @var ?string */
    protected ?string $destination = null;

    /** @var ?int */
    protected ?int $status = null;

    /** @var int[] */
    protected array $uRIIds = [];

    /**
     * Get Destination_Store_Code.
     *
     * @return string
     */
    public function getDestinationStoreCode() : ?string
    {
        return $this->destinationStoreCode;
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
     * Get URI_IDs.
     *
     * @return array
     */
    public function getURIIds() : array
    {
        return $this->uRIIds;
    }

    /**
     * Set Destination_Store_Code.
     *
     * @param ?string $destinationStoreCode
     * @return $this
     */
    public function setDestinationStoreCode(?string $destinationStoreCode) : self
    {
        $this->destinationStoreCode = $destinationStoreCode;

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

        if (!is_null($this->getDestinationStoreCode())) {
            $data['Destination_Store_Code'] = $this->getDestinationStoreCode();
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

        $data['URI_IDs'] = $this->getURIIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageURIRedirect($this, $httpResponse, $data);
    }
}
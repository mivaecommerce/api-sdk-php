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
 * Handles API Request CategoryURI_Redirect.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categoryuri_redirect
 */
class CategoryURIRedirect extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CategoryURI_Redirect';

    /** @var string */
    protected $destinationStoreCode;

    /** @var string */
    protected $destinationType;

    /** @var string */
    protected $destination;

    /** @var int */
    protected $status;

    /** @var int[] */
    protected $uRIIds = [];

    /**
     * Get Destination_Store_Code.
     *
     * @return string
     */
    public function getDestinationStoreCode()
    {
        return $this->destinationStoreCode;
    }

    /**
     * Get Destination_Type.
     *
     * @return string
     */
    public function getDestinationType()
    {
        return $this->destinationType;
    }

    /**
     * Get Destination.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

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
     * Set Destination_Store_Code.
     *
     * @param string
     * @return $this
     */
    public function setDestinationStoreCode($destinationStoreCode)
    {
        $this->destinationStoreCode = $destinationStoreCode;

        return $this;
    }

    /**
     * Set Destination_Type.
     *
     * @param string
     * @return $this
     */
    public function setDestinationType($destinationType)
    {
        $this->destinationType = $destinationType;

        return $this;
    }

    /**
     * Set Destination.
     *
     * @param string
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Set Status.
     *
     * @param int
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryURIRedirect($this, $httpResponse, $data);
    }
}
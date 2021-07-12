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
use MerchantAPI\BaseClient;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'URI_Insert';

    /** @var string */
    protected $uRI;

    /** @var string */
    protected $destinationType;

    /** @var string */
    protected $destination;

    /** @var int */
    protected $status;

    /** @var bool */
    protected $canonical;

    /**
     * Get URI.
     *
     * @return string
     */
    public function getURI()
    {
        return $this->uRI;
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
     * Get Canonical.
     *
     * @return bool
     */
    public function getCanonical()
    {
        return $this->canonical;
    }

    /**
     * Set URI.
     *
     * @param string
     * @return $this
     */
    public function setURI($uRI)
    {
        $this->uRI = $uRI;

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
     * Set Canonical.
     *
     * @param bool
     * @return $this
     */
    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\URIInsert($this, $httpResponse, $data);
    }
}
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
 * Handles API Request FeedURI_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/feeduri_insert
 */
class FeedURIInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'FeedURI_Insert';

    /** @var int */
    protected $feedId;

    /** @var string */
    protected $feedCode;

    /** @var string */
    protected $uRI;

    /** @var int */
    protected $status;

    /** @var bool */
    protected $canonical;

    /**
     * Get Feed_ID.
     *
     * @return int
     */
    public function getFeedId()
    {
        return $this->feedId;
    }

    /**
     * Get Feed_Code.
     *
     * @return string
     */
    public function getFeedCode()
    {
        return $this->feedCode;
    }

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
     * Set Feed_ID.
     *
     * @param int
     * @return $this
     */
    public function setFeedId($feedId)
    {
        $this->feedId = $feedId;

        return $this;
    }

    /**
     * Set Feed_Code.
     *
     * @param string
     * @return $this
     */
    public function setFeedCode($feedCode)
    {
        $this->feedCode = $feedCode;

        return $this;
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

        if ($this->getFeedId()) {
            $data['Feed_ID'] = $this->getFeedId();
        } else if ($this->getFeedCode()) {
            $data['Feed_Code'] = $this->getFeedCode();
        }

        if (!is_null($this->getURI())) {
            $data['URI'] = $this->getURI();
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
        return new \MerchantAPI\Response\FeedURIInsert($this, $httpResponse, $data);
    }
}
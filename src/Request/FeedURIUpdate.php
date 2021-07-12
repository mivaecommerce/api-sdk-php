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
 * Handles API Request FeedURI_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/feeduri_update
 */
class FeedURIUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'FeedURI_Update';

    /** @var int */
    protected $uRIId;

    /** @var string */
    protected $uRI;

    /** @var int */
    protected $status;

    /** @var bool */
    protected $canonical;

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

        if ($this->getURIId()) {
            $data['URI_ID'] = $this->getURIId();
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
        return new \MerchantAPI\Response\FeedURIUpdate($this, $httpResponse, $data);
    }
}
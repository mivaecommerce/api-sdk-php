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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'FeedURI_Insert';

    /** @var ?int */
    protected ?int $feedId = null;

    /** @var ?string */
    protected ?string $feedCode = null;

    /** @var ?string */
    protected ?string $uRI = null;

    /** @var ?int */
    protected ?int $status = null;

    /** @var ?bool */
    protected ?bool $canonical = null;

    /**
     * Get Feed_ID.
     *
     * @return int
     */
    public function getFeedId() : ?int
    {
        return $this->feedId;
    }

    /**
     * Get Feed_Code.
     *
     * @return string
     */
    public function getFeedCode() : ?string
    {
        return $this->feedCode;
    }

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
     * Set Feed_ID.
     *
     * @param ?int $feedId
     * @return $this
     */
    public function setFeedId(?int $feedId) : self
    {
        $this->feedId = $feedId;

        return $this;
    }

    /**
     * Set Feed_Code.
     *
     * @param ?string $feedCode
     * @return $this
     */
    public function setFeedCode(?string $feedCode) : self
    {
        $this->feedCode = $feedCode;

        return $this;
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\FeedURIInsert($this, $httpResponse, $data);
    }
}
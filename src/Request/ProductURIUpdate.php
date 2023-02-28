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
 * Handles API Request ProductURI_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/producturi_update
 */
class ProductURIUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ProductURI_Update';

    /** @var ?int */
    protected ?int $uRIId = null;

    /** @var ?string */
    protected ?string $uRI = null;

    /** @var ?int */
    protected ?int $status = null;

    /** @var ?bool */
    protected ?bool $canonical = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Uri $uri
     */
    public function __construct(?BaseClient $client = null, ?Uri $uri = null)
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
    public function getURIId() : ?int
    {
        return $this->uRIId;
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
     * Set URI_ID.
     *
     * @param ?int $uRIId
     * @return $this
     */
    public function setURIId(?int $uRIId) : self
    {
        $this->uRIId = $uRIId;

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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ProductURIUpdate($this, $httpResponse, $data);
    }
}
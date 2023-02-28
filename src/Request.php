<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI;

use MerchantAPI\Http\HttpHeaders;

/**
 * Abstract class all Requests inherit from.
 *
 * @package MerchantAPI
 */
abstract class Request implements RequestInterface
{
    /** @var ?BaseClient */
    protected ?BaseClient $client = null;

    /** @var ?string */
    protected ?string $storeCode = null;

    /** @var string */
    protected string $scope = RequestInterface::REQUEST_SCOPE_STORE;

    /** @var ?string */
    protected ?string $binaryEncoding = RequestInterface::BINARY_ENCODING_DEFAULT;

    /**
     * Constructor
     *
     * @param ?BaseClient $client
     */
    public function __construct(?BaseClient $client = null)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function getFunction() : string
    {
        if (isset($this->function)) {
            return $this->function;
        }

        $parts = explode('\\', get_class($this));
        return end($parts);
    }

    /**
     * @inheritDoc
     */
    public function getScope() : string
    {
        return $this->scope;
    }

    /**
     * @inheritDoc
     */
    public function getStoreCode() : ?string
    {
        return $this->storeCode;
    }

    /**
     * @inheritDoc
     */
    public function setStoreCode(?string $storeCode) : self
    {
        $this->storeCode = $storeCode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getClient() : BaseClient
    {
        return $this->client;
    }

    /**
     * @inheritDoc
     */
    public function setClient(?BaseClient $client) : self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = [];

        if ($this->getScope() == static::REQUEST_SCOPE_STORE) {
            if (!is_null($this->getStoreCode())) {
                $data['Store_Code'] = $this->getStoreCode();
            }
        }

        return $data;
    }

    /**
     * {inheritDoc}
     */
    public function send() : ResponseInterface
    {
        if (!$this->client) {
            throw new \Exception('No client assigned to request');
        }

        return $this->client->send($this);
    }

    /**
     * @inheritDoc
     */
    public function processRequestHeaders(HttpHeaders $headers) : void
    {
        ;
    }

    /**
     * @inheritDoc
     */
    public function getBinaryEncoding() : ?string
    {
        return $this->binaryEncoding;
    }

    /**
     * @inheritDoc
     */
    public function setBinaryEncoding(?string $binaryEncoding) : self
    {
        $this->binaryEncoding = $binaryEncoding;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
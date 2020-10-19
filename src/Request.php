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
use MerchantAPI\BaseClient;

/**
 * Abstract class all Requests inherit from.
 *
 * @package MerchantAPI
 */
abstract class Request implements RequestInterface
{
    /** @var Client */
    protected $client = null;

    /** @var null|string */
    protected $storeCode = null;

    /** @var string */
    protected $scope = RequestInterface::REQUEST_SCOPE_STORE;

    /** @var string */
    protected $binaryEncoding = RequestInterface::BINARY_ENCODING_DEFAULT;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(BaseClient $client = null)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function getFunction()
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
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @inheritDoc
     */
    public function getStoreCode()
    {
        return $this->storeCode;
    }

    /**
     * @inheritDoc
     */
    public function setStoreCode($storeCode)
    {
        $this->storeCode = $storeCode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @inheritDoc
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function send()
    {
        if (!$this->client) {
            throw new \Exception('No client assigned to request');
        }

        return $this->client->send($this);
    }

    /**
     * @inheritDoc
     */
    public function processRequestHeaders(HttpHeaders $headers)
    {
        ;
    }

    /**
     * @inheritDoc
     */
    public function getBinaryEncoding()
    {
        return $this->binaryEncoding;
    }

    /**
     * @inheritDoc
     */
    public function setBinaryEncoding($encoding)
    {
        $this->binaryEncoding = $binaryEncoding;
        return $this;
    }
}
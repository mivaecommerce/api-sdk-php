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

use MerchantAPI\Http\HttpClient;
use MerchantAPI\Http\HttpHeaders;
use MerchantAPI\Http\HttpClientException;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\MultiCall\MultiCallRequest;
use MerchantAPI\MultiCall\MultiCallOperation;
use MerchantAPI\Logger\Logger;
use MerchantAPI\Authenticator\Authenticator;

/**
 * Handles sending API Requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class BaseClient
{
    const DEFAULT_OPERATION_TIMEOUT = 60;

    /** @var string API URL Endpoint */
    protected string $endpoint;

    /** @var \MerchantAPI\Http\HttpClient */
    protected HttpClient $httpClient;

    /** @var \MerchantAPI\Logger\Logger */
    protected ?Logger $logger = null;

    /** @var \MerchantAPI\Authenticator\Authenticator */
    protected ?Authenticator $authenticator = null;

    /** @var array */
    protected array $globalHeaders = [];

    /** @var array */
    protected array $options = [
        'require_timestamp'         => true,
        'default_store_code'        => null,
        'operation_timeout'         => self::DEFAULT_OPERATION_TIMEOUT,
        'json_decode_flags'         => JSON_THROW_ON_ERROR,
        'curl_options'              => [
                CURLOPT_USERAGENT       => 'MerchantAPI-' . Version::STRING . '/php',
                CURLOPT_SSL_VERIFYPEER  => true,
                CURLOPT_SSL_VERIFYHOST  => 2
        ]
    ];

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param Authenticator $authenticator
     * @param array $options
     */
    public function __construct(string $endpoint, Authenticator $authenticator, array $options = [])
    {
        $this->endpoint         = $endpoint;
        $this->authenticator    = $authenticator;

        foreach($this->options as $key => $default ) {
            if (isset($options[$key])) {
                $this->options[$key] = $options[$key];
            }
        }

        $this->httpClient = new HttpClient(is_array($this->options['curl_options']) ?
            $this->options['curl_options'] : [] );
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient() : HttpClient
    {
        return $this->httpClient;
    }

    /**
     * @return ?Authenticator
     */
    public function getAuthenticator() : ?Authenticator
    {
        return $this->authenticator;
    }

    /**
     * Get the endpoint URL.
     *
     * @return string
     */
    public function getEndpoint() : string
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint URL.
     *
     * @param string $endpoint
     * @return $this
     */
    public function setEndpoint(string $endpoint) : self
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Set a client option.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     * @throws \MerchantAPI\ClientException
     */
    public function setOption(string $key, $value) : self
    {
        if (!array_key_exists($key, $this->options)) {
            throw new ClientException(sprintf('Unknown option %s', $key));
        }

        $this->options[$key] = $value;

        return $this;
    }

    /**
     * Get a client option.
     *
     * @param string $key
     * @return mixed
     * @throws \MerchantAPI\ClientException
     */
    public function getOption(string $key)
    {
        if (!array_key_exists($key, $this->options)) {
            throw new ClientException(sprintf('Unknown option `%s`', $key));
        }

        return $this->options[$key];
    }

    /**
     * Set the Logger instance
     *
     * @param Logger $logger
     * @return $this
     */
    public function setLogger(Logger $logger) : self
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Get the Logger instance
     *
     * @return Logger
     */
    public function getLogger() : ?Logger
    {
        return $this->logger;
    }

    /**
     * Set a global header to be sent with each request
     * @param string  $key
     * @param string $value
     * @return $this
     */
    public function setGlobalHeader(string $key, string $value) : self
    {
        $this->globalHeaders[$key] = $value;
        return $this;
    }

    /**
     * Get a global header if defined or null if not
     * @param string $key
     * @return ?string
     */
    public function getGlobalHeader(string $key) : ?string
    {
        return $this->globalHeaders[$key] ?? null;
    }

    /**
     * Check if a global header is defined
     * @param string $key
     * @return bool
     */
    public function hasGlobalHeader(string $key) : bool
    {
        return isset($this->globalHeaders[$key]);
    }

    /**
     * Remove a defined global header
     * @param string $key
     * @return $this
     */
    public function removeGlobalHeader(string $key) : self
    {
        unset($this->globalHeaders[$key]);
        return $this;
    }

    /**
     * Send a RequestInterface and get back its assigned ResponseInterface.
     *
     * @param \MerchantAPI\RequestInterface $request
     * @return \MerchantAPI\ResponseInterface
     * @throws \MerchantAPI\ClientException
     */
    public function send(RequestInterface $request) : ResponseInterface
    {
        $defaultStore  = $this->getOption('default_store_code');

        if ($request instanceof MultiCallRequest) {
            foreach ($request->getRequests() as $mrequest) {
                if ($mrequest instanceof MultiCallOperation) {
                    foreach ($mrequest->getRequests() as $orequest) {
                        if ($orequest->getScope() == RequestInterface::REQUEST_SCOPE_STORE &&
                           !is_null($orequest->getStoreCode()) &&
                           !is_null($defaultStore) &&
                           $orequest->getStoreCode() != $defaultStore) {
                            $orequest->setStoreCode($defaultStore);
                        }
                    }
                } else {
                    if ($mrequest->getScope() == RequestInterface::REQUEST_SCOPE_STORE &&
                        is_null($mrequest->getStoreCode()) &&
                        !is_null($defaultStore)) {
                        $mrequest->setStoreCode($defaultStore);
                    }
                }
            }

            $data = $request->toArray();
        } else {
            if ($request->getScope() == RequestInterface::REQUEST_SCOPE_STORE &&
                is_null($request->getStoreCode()) &&
                !is_null($defaultStore)) {
                $request->setStoreCode($defaultStore);
            }

            $data = array_merge($request->toArray(), [
                'Function'   => $request->getFunction()
            ]);
        }

        if ($this->getOption('require_timestamp')) {
            $data['Miva_Request_Timestamp'] = time();
        }

        $headers = new HttpHeaders($this->globalHeaders);

        if ($this->getOption('operation_timeout') != static::DEFAULT_OPERATION_TIMEOUT) {
            $headers->add('X-Miva-API-Timeout', $this->getOption('operation_timeout'));
        }

        if ($request->getBinaryEncoding() == RequestInterface::BINARY_ENCODING_BASE64) {
            $headers->add('X-Miva-API-Binary-Encoding', $request->getBinaryEncoding());
        }

        $request->processRequestHeaders($headers);

        if ($this->logger instanceof Logger) {
            $this->logger->logRequest($request, $headers, $data);
        }

        $httpResponse = $this->sendRequestLowLevel($data, [], $headers);

        $errorResponse = $httpResponse->getStatus() < 200 || $httpResponse->getStatus() >= 300;

        if ($errorResponse) {
            $json = [];
        } else {
            $encodeFlags = (int)$this->getOption('json_decode_flags');

            if (($encodeFlags & JSON_THROW_ON_ERROR) == 0) {
                $encodeFlags |= JSON_THROW_ON_ERROR;
            }

            try {
                $json = json_decode($httpResponse->getContent(), true, 512, $encodeFlags);
            } catch(\Exception $e) {
                throw new ClientException(sprintf('Error Decoding JSON: %s', $e->getMessage()), 0, $e, $httpResponse);
            }
        }

        $response = $request->createResponse($httpResponse, $json);
        
        if ($this->logger instanceof Logger) {
            $this->logger->logResponse($response);
        }

        if ($errorResponse) {
            if ($httpResponse->getStatus() == 401) {
                throw new ClientException('HTTP Authentication Error', 0, null, $httpResponse);
            }

            throw new ClientException('HTTP Response Error', 0, null, $httpResponse);
        }

        return $response;
    }

    /**
     * Low level API Request function.
     *
     * @param array $data
     * @param array $query
     * @param array|HttpHeaders $headers
     * @return \MerchantAPI\Http\HttpResponse
     * @throws \MerchantAPI\ClientException
     */
    public function sendRequestLowLevel(array $data, array $query = [], $headers = []) : HttpResponse
    {
        if (!is_array($headers) && !$headers instanceof HttpHeaders) {
            throw new ClientException('Expected an array or an instance of HttpHeaders');
        }

        if ($headers instanceof HttpHeaders)
        {
            $headers = $headers->all();
        }

        $json = json_encode($data);

        if ($json === false) {
            throw new ClientException(sprintf('Error Encoding JSON: %s', json_last_error_msg()));
        }

        $headers = array_merge($headers, [
            'Content-Type'              => 'application/json',
            'X-Miva-API-Authorization'  => $this->generateAuthHeader($json)
        ]);

        try {
            $response = $this->httpClient->post($this->getEndpoint(), $json, $query, $headers);
        } catch (HttpClientException $e) {
            throw new ClientException($e->getMessage(), 0, $e);
        }

        if (!strlen($response->getContent())) {
            throw new ClientException('Received an empty response', 0, null, $response);
        }

        return $response;
    }

    /**
     * Generates an authentication header for API request, including signature if required.
     *
     * @param string $data
     * @return string
     * @throws \MerchantAPI\ClientException
     */
    public function generateAuthHeader(string $data) : string
    {
        if (!$this->authenticator instanceof Authenticator) {
            throw new ClientException('Expected an Authenticator instance');
        }

        return $this->authenticator->generateAuthenticationHeader($data);
    }

    /**
     * Create as new instance of request by name.
     *
     * @param string $name
     * @param array $args
     * @return RequestInterface
     * @throws \InvalidArgumentException
     */
    public function createRequest(string $name, array $args = []) : RequestInterface
    {
        $class = sprintf('%s\\Request\\%s', __NAMESPACE__, str_replace('_', '', $name));

        if (class_exists($class)) {
            try {
                return (new \ReflectionClass($class))->newInstanceArgs($args);
            } catch (\ReflectionException $e) {
                throw new \InvalidArgumentException(sprintf('Unable to locate request %s', $name), $e->getCode(), $e);
            }
        }

        throw new \InvalidArgumentException(sprintf('Unable to locate request %s', $name));
    }
}
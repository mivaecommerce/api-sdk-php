<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: Client.php 71863 2018-12-06 21:42:32Z gidriss $
 */

namespace MerchantAPI;

use MerchantAPI\Http\HttpClient;
use MerchantAPI\Http\HttpClientException;
use MerchantAPI\MultiCall\MultiCallRequest;

/**
 * Handles sending API Requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class Client
{
    /** @var string SHA1 Digest */
    const SIGN_DIGEST_SHA1      = 'sha1';

    /** @var string SHA256 Digest */
    const SIGN_DIGEST_SHA256    = 'sha256';

    /** @var string No Request Signing */
    const SIGN_DIGEST_NONE      = false;

    /** @var array Valid Digests */
    protected $digests = [
        self::SIGN_DIGEST_SHA1,
        self::SIGN_DIGEST_SHA256
    ];

    /** @var string API URL Endpoint */
    protected $endpoint;

    /** @var string API Authentication Token */
    protected $apiToken;

    /** @var string Request Signing Key */
    protected $signingKey;

    /** @var \MerchantAPI\Http\HttpClient */
    protected $httpClient;

    /** @var array */
    protected $options = [
        'require_timestamp'         => true,
        'signing_key_digest'        => self::SIGN_DIGEST_SHA256,
        'default_store_code'        => null,
        'curl_options'              => [
                CURLOPT_USERAGENT       => 'MerchantAPI-' . Version::STRING . '/php',
                CURLOPT_SSL_VERIFYPEER  => true,
                CURLOPT_SSL_VERIFYHOST  => 2
        ]
    ];

    /**
     * Client constructor.
     *
     * @param $endpoint
     * @param $apiToken
     * @param string|null
     * @param array
     */
    public function __construct($endpoint, $apiToken, $signingKey = null, array $options = [])
    {
        $this->endpoint         = $endpoint;
        $this->apiToken         = $apiToken;
        $this->signingKey       = $signingKey;

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
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Get the endpoint URL.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint URL.
     *
     * @param string $endpoint
     * @return Client
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * Get the authentication API token.
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * Set the authentication API token.
     *
     * @param string $apiToken
     * @return \MerchantAPI\Client
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
        return $this;
    }

    /**
     * Set a client option.
     *
     * @param $key
     * @param $value
     * @return $this
     * @throws \MerchantAPI\ClientException
     */
    public function setOption($key, $value)
    {
        if (!isset($this->options[$key])) {
            throw new ClientException(sprintf('Unknown option %s', $key));
        }

        $this->options[$key] = $value;

        return $this;
    }

    /**
     * Get a client option.
     *
     * @param $key
     * @return mixed
     * @throws \MerchantAPI\ClientException
     */
    public function getOption($key)
    {
        if (!isset($this->options[$key])) {
            throw new ClientException(sprintf('Unknown option %s', $key));
        }

        return $this->options[$key];
    }

    /**
     * Get the request signing key, base64 encoded.
     *
     * @return string
     */
    public function getSigningKey()
    {
        return $this->signingKey;
    }

    /**
     * Set the base64 encoded request signing key.
     *
     * @param string $signingKey
     * @return Client
     */
    public function setSigningKey($signingKey)
    {
        $this->signingKey = $signingKey;
        return $this;
    }

    /**
     * Send a RequestInterface and get back its assigned ResponseInterface.
     *
     * @param \MerchantAPI\RequestInterface $request
     * @return \MerchantAPI\ResponseInterface
     * @throws \MerchantAPI\ClientException
     */
    public function send(RequestInterface $request)
    {
        if ($request instanceof MultiCallRequest) {
            $data           = $request->toArray();
            $defaultStore   = $this->getOption('default_store_code');

            if (isset($data['Operations']) && is_array($data['Operations'])) {
                foreach ($data['Operations'] as &$operation) {
                    if (!isset($operation['Store_Code'])) {
                        $operation['Store_Code'] = $defaultStore;
                    }

                    if (isset($operation['Iterations']) && is_array($operation['Iterations'])) {
                        foreach ($operation['Iterations'] as &$iteration) {
                            if (!isset($iteration['Store_Code']) && $operation['Store_Code'] != $defaultStore) {
                                $iteration['Store_Code'] = $defaultStore;
                            }
                        }
                    }
                }
            }
        } else {
            $data = array_merge($request->toArray(), [
                'Function'   => $request->getFunction(),
                'Store_Code' => $request->getStoreCode() ?
                    $request->getStoreCode() : $this->getOption('default_store_code')
            ]);
        }

        if ($this->getOption('require_timestamp')) {
            $data['Miva_Request_Timestamp'] = time();
        }

        $httpResponse = $this->sendRequestLowLevel($data);

        $json = json_decode($httpResponse->getContent(), true);

        if (!is_array($json)) {
            throw new ClientException(sprintf('Error Decoding JSON: %s', json_last_error_msg()));
        }

        $response = $request->createResponse($httpResponse, $json);

        if (!$response instanceof ResponseInterface) {
            throw new ClientException(sprintf('Expected instance of ResponseInterface but got %s',
                is_object($response) ? get_class($response) : gettype($response)));
        }
        
        return $response;
    }

    /**
     * Low level API Request function.
     *
     * @param array
     * @param array
     * @param array
     * @return \MerchantAPI\Http\HttpResponse
     * @throws \MerchantAPI\ClientException
     */
    public function sendRequestLowLevel(array $data, array $query = [], array $headers = [])
    {
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
            throw new ClientException('Received an empty response');
        }

        return $response;
    }

    /**
     * Generates an authentication header for API request, including signature if required.
     *
     * @param $data
     * @return string
     * @throws \MerchantAPI\ClientException
     */
    public function generateAuthHeader($data)
    {
        if (!is_string($data)) {
            throw new ClientException(sprintf('Invalid signing data type. Expecting string but got %s',
                is_object($data) ? get_class($data) : gettype($data)));
        }

        $key    = $this->getSigningKey();
        $digest = strtolower(trim($this->getOption('signing_key_digest')));

        if (!in_array($digest, $this->digests)) {
            return sprintf('MIVA %s', $this->getApiToken());
        }

        if (!$key) {
            throw new ClientException('No signing key to sign request');
        }

        $signature = hash_hmac($digest, $data, base64_decode($key), true);

        if ($signature === false) {
            throw new ClientException('Error generating signature');
        }

        return sprintf('MIVA-HMAC-%s %s:%s', strtoupper($digest), $this->getApiToken(), base64_encode($signature));
    }

    /**
     * Create as new instance of request by name.
     *
     * @param $name
     * @param array $args
     * @return RequestInterface
     * @throws \InvalidArgumentException
     */
    public function createRequest($name, array $args = [])
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
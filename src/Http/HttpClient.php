<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Http;

/**
 * Class HttpClient. Handles HTTP Reqests.
 *
 * @package MerchantAPI\Http
 */
class HttpClient
{
    /** @var array  */
    protected $curlOptions = [];

    /**
     * HttpClient constructor.
     *
     * @param array $curlOptions
     */
    public function __construct(array $curlOptions = [])
    {
        $this->curlOptions  = array_replace($this->curlOptions, $curlOptions);
    }

    /**
     * Set a cURL option.
     *
     * @param $option
     * @param $value
     * @return $this
     */
    public function setCurlOption($option, $value)
    {
        $this->curlOptions[$option] = $value;
        return $this;
    }

    /**
     * Merge an array of cURL options.
     *
     * @param array $options
     * @return $this
     */
    public function setCurlOptions(array $options)
    {
        $this->curlOptions = array_replace($this->curlOptions, $options);
        return $this;
    }

    /**
     * Get the cURL options.
     *
     * @return array
     */
    public function getCurlOptions()
    {
        return $this->curlOptions;
    }

    /**
     * Send a GET Request.
     *
     * @param $url
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function get($url, array $query = [], array $headers = [])
    {
        return $this->send(new HttpRequest($url, null, HttpMessage::HTTP_METHOD_GET, $query, $headers));
    }

    /**
     * Send a POST request.
     *
     * @param $url
     * @param null $content
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function post($url, $content = null, array $query = [], array $headers = [])
    {
        return $this->send(new HttpRequest($url, $content, HttpMessage::HTTP_METHOD_POST, $query, $headers));
    }

    /**
     * Send a request.
     *
     * @param $url
     * @param string $content
     * @param string $method
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function request($url, $content = '', $method = HttpMessage::HTTP_METHOD_GET, array $query = [], array $headers = [])
    {
        return $this->send(new HttpRequest($url, $content, $method, $query, $headers));
    }

    /**
     * Send a HttpRequest Object.
     *
     * @param HttpRequest $request
     * @throws HttpClientException
     * @return HttpResponse
     */
    public function send(HttpRequest $request)
    {
        $qs     = $request->getQuery()->toQueryString();
        $url    = $request->getUrl();

        if ($qs) {
            $url = sprintf('%s?%s', $url, $qs);
        }

        $headers = [];

        foreach ($request->getHeaders()->all() as $k => $v) {
            $headers[] = sprintf('%s: %s', $k, $v);
        }

        $content = $request->getContent();
        $handle  = curl_init($url);

        if (!is_resource($handle)) {
            throw new HttpClientException('Curl Error: Unable to initialize');
        }

        if ($request->getMethod() == $request::HTTP_METHOD_POST) {
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $content);
        }

        $options    = $this->getCurlOptions();
        $response   = new HttpResponse($url, null, [], [], $request);

        $options[CURLOPT_HTTPHEADER]     = $headers;
        $options[CURLOPT_HEADERFUNCTION] = [ $response, 'receiveHeaderCallback' ];
        $options[CURLOPT_WRITEFUNCTION]  = [ $response, 'receiveContentCallback' ];

        if (curl_setopt_array($handle, $options) === false ) {
            $error   = curl_error($handle);
            $errorno = curl_errno($handle);
            curl_close($handle);
            throw new HttpClientException(sprintf('Error Setting Curl Options',
                $error, $errorno));
        }

        curl_exec($handle);

        if (curl_errno($handle) !== 0) {
            $error   = curl_error($handle);
            $errorno = curl_errno($handle);
            curl_close($handle);
            throw new HttpClientException(sprintf('HTTP Error: %s Code %d',
                $error, $errorno));
        }

        curl_close($handle);

        return $response;
    }
}
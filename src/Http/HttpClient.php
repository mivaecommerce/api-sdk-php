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
    protected array $curlOptions = [];

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
     * @param int $option
     * @param mixed $value
     * @return $this
     */
    public function setCurlOption(int $option, $value) : self
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
    public function setCurlOptions(array $options) : self
    {
        $this->curlOptions = array_replace($this->curlOptions, $options);
        return $this;
    }

    /**
     * Get the cURL options.
     *
     * @return array
     */
    public function getCurlOptions() : array
    {
        return $this->curlOptions;
    }

    /**
     * Send a GET Request.
     *
     * @param string $url
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function get(string $url, array $query = [], array $headers = []) : HttpResponse
    {
        return $this->send(new HttpRequest($url, null, HttpMessage::HTTP_METHOD_GET, $query, $headers));
    }

    /**
     * Send a POST request.
     *
     * @param string $url
     * @param string|array $content
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function post(string $url, $content = null, array $query = [], array $headers = []) : HttpResponse
    {
        return $this->send(new HttpRequest($url, $content, HttpMessage::HTTP_METHOD_POST, $query, $headers));
    }

    /**
     * Send a request.
     *
     * @param string $url
     * @param string|array $content
     * @param string $method
     * @param array $query
     * @param array $headers
     * @return HttpResponse
     * @throws HttpClientException
     */
    public function request(string $url, $content = null, string $method = HttpMessage::HTTP_METHOD_GET, array $query = [], array $headers = []) : HttpResponse
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
    public function send(HttpRequest $request) : HttpResponse
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

        if ($handle === false) {
            throw new HttpClientException('cURL Error: Unable to initialize');
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

        if (curl_setopt_array($handle, $options) === false) {
            $error   = curl_error($handle);
            $errorno = curl_errno($handle);
            curl_close($handle);
            unset($handle);
            throw new HttpClientException(sprintf('cURL Error: %s Code: %d',
                $error, $errorno));
        }

        curl_exec($handle);

        if (curl_errno($handle) !== 0) {
            $error   = curl_error($handle);
            $errorno = curl_errno($handle);
            curl_close($handle);
            unset($handle);
            throw new HttpClientException(sprintf('HTTP Error: %s Code %d',
                $error, $errorno));
        }

        curl_close($handle);
        unset($handle);

        return $response;
    }
}
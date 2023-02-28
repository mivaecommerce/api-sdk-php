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
 * Class HttpResponse.
 *
 * @package MerchantAPI\Http
 */
class HttpResponse extends HttpMessage
{
    /** @var HttpRequest|null */
    protected ?HttpRequest $request;

    /**
     * HttpResponse constructor.
     *
     * @param string $url
     * @param ?string $content
     * @param array $query
     * @param array $headers
     * @param HttpRequest|null $request
     */
    public function __construct(string $url, ?string $content = '', array $query = [], array $headers = [], ?HttpRequest $request = null)
    {
        parent::__construct($url, $content, '', $query, $headers);

        $this->request = $request;

        if ($request) {
            $this->setMethod($request->getMethod());
        }
    }

    /**
     * Get the sent request object.
     *
     * @return HttpRequest|null
     */
    public function getRequest() : ?HttpRequest
    {
        return $this->request;
    }

    /**
     * Set the request object or clear it.
     *
     * @param ?HttpRequest $request
     * @return $this
     */
    public function setRequest(?HttpRequest $request = null) : self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * cURL callback to write the header data to the response.
     *
     * @param resource $handle
     * @param string $header
     * @return int Bytes written
     */
    public function receiveHeaderCallback($handle, string $header) : int
    {
        $length = strlen($header);

        $normalized = str_replace("\r\n", '', $header);

        if (empty($normalized)) {
            return $length;
        } else if (preg_match('/^HTTP\/\d/', $header)) {
            $parts = explode(' ', $header);

            $this->setProtocol($parts[0]);
            $this->setStatus($parts[1]);

            return $length;
        }

        $key    = trim(substr($normalized, 0, strpos($normalized, ':')));
        $value  = trim(substr($normalized, strpos($normalized, ':')+1));

        $this->getHeaders()->add($key, $value);

        return $length;
    }

    /**
     * cURL callback to write the body data to the response.
     *
     * @param resource $handle
     * @param ?string $content
     * @return int Bytes written
     */
    public function receiveContentCallback($handle, ?string $content) : int
    {
        $this->appendContent($content);
        return strlen($content);
    }
}
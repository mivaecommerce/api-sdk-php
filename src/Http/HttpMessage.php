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
 * Class HttpMessage. Abstract HTTP Message.
 *
 * @package MerchantAPI\Http
 */
abstract class HttpMessage
{
    /** @var string */
    protected string $host;

    /** @var int */
    protected int $port;

    /** @var string */
    protected string $scheme;

    /** @var string */
    protected string $uri;

    /** @var int */
    protected int $status;

    /** @var HttpHeaders */
    protected HttpHeaders $headers;

    /** @var HttpQuery */
    protected HttpQuery $query;

    /** @var string|array */
    protected $content;

    /** @var string */
    protected string $method;

    /** @var string */
    protected string $protocol;

    /** @var string  */
    const HTTP_METHOD_GET       = 'GET';

    /** @var string  */
    const HTTP_METHOD_POST      = 'POST';

    /** @var string  */
    const HTTP_METHOD_PUT       = 'PUT';

    /** @var string  */
    const HTTP_METHOD_PATCH     = 'PATCH';

    /** @var string  */
    const HTTP_METHOD_DELETE    = 'DELETE';

    /** @var array */
    protected static array $httpMethods = [
        self::HTTP_METHOD_GET,
        self::HTTP_METHOD_POST,
        self::HTTP_METHOD_PUT,
        self::HTTP_METHOD_PATCH,
        self::HTTP_METHOD_DELETE
    ];

    /** @var array */
    protected static array $statusCodes = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    ];

    /**
     * HttpMessage constructor.
     *
     * @param string $url
     * @param string|array $content
     * @param string $method
     * @param array $query
     * @param array $headers
     */
    public function __construct(string $url, $content = '', string $method = self::HTTP_METHOD_GET, array $query = [], array $headers = [])
    {
        $this->query    = new HttpQuery($query);
        $this->headers  = new HttpHeaders($headers);
        $this->content  = $content;
        $this->method   = $method;

        $this->setUrl($url);
    }

    /**
     * Get the hostname.
     *
     * @return string
     */
    public function getHost() : string
    {
        return $this->host;
    }

    /**
     * Set the hostname.
     *
     * @param string $host
     * @return $this
     */
    public function setHost(string $host) : self
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Get the port.
     *
     * @return int
     */
    public function getPort() : int
    {
        return $this->port;
    }

    /**
     * Set the port.
     *
     * @param int $port
     * @return $this
     */
    public function setPort(int $port) : self
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Get the scheme. HTTP or HTTPS.
     *
     * @return string
     */
    public function getScheme() : string
    {
        return $this->scheme;
    }

    /**
     * Set the scheme. HTTP or HTTPS.
     *
     * @param string $scheme
     * @return $this
     */
    public function setScheme(string $scheme) : self
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * Get the URI.
     *
     * @return string
     */
    public function getUri() : string
    {
        return $this->uri;
    }

    /**
     * Set the URI.
     *
     * @param string $uri
     * @return $this
     */
    public function setUri(string $uri) : self
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Get the status code.
     *
     * @return int
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * Set the status code.
     *
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status) : self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the HTTP Headers.
     *
     * @return HttpHeaders
     */
    public function getHeaders() : HttpHeaders
    {
        return $this->headers;
    }

    /**
     * Set the HTTP Headers.
     *
     * @param array|HttpHeaders $headers
     * @return $this
     */
    public function setHeaders($headers) : self
    {
        if (is_array($headers)) {
            $this->headers = new HttpHeaders($headers);
        } else if ($headers instanceof HttpHeaders) {
            $this->headers = $headers;
        } else {
            throw new \InvalidArgumentException('Headers must be an array or instance of HttpHeaders');
        }

        return $this;
    }

    /**
     * @return HttpQuery
     */
    public function getQuery() : HttpQuery
    {
        return $this->query;
    }

    /**
     * @param HttpQuery|array $query
     * @return $this
     */
    public function setQuery($query) : self
    {
        if (is_array($query)) {
            $this->query = new HttpQuery($query);
        } else if ($query instanceof HttpQuery) {
            $this->query = $query;
        } else {
            throw new \InvalidArgumentException('Headers must be an array or instance of HttpQuery');
        }

        return $this;
    }

    /**
     * Get the request content.
     *
     * @return string|array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the request content.
     *
     * @param string|array $content
     * @return $this
     */
    public function setContent($content) : self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Append to the request content.
     *
     * @param string $content
     * @return $this
     */
    public function appendContent(string $content) : self
    {
        $this->content .= $content;
        return $this;
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * Set the request method.
     *
     * @param string $method
     * @return $this
     */
    public function setMethod(string $method) : self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get the protocol.
     *
     * @return string
     */
    public function getProtocol() : string
    {
        return $this->protocol;
    }

    /**
     * Set the protocol.
     *
     * @param string $protocol
     * @return HttpMessage
     */
    public function setProtocol(string $protocol) : self
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * Get the name for the set status code.
     *
     * @return string
     */
    public function getStatusName() : ?string
    {
        if ($this->getStatus() && isset(static::$statusCodes[$this->getStatus()])) {
            return static::$statusCodes[$this->getStatus()];
        }

        return null;
    }

    /**
     * Set the URL and parse its parts.
     *
     * @param string $url
     * @return HttpMessage
     * @throws \InvalidArgumentException
     */
    public function setUrl(string $url) : self
    {
        $urlinfo = parse_url($url);

        if (isset($urlinfo['query']) && $urlinfo['query']) {
            parse_str($urlinfo['query'], $urlquery);

            foreach($urlquery as $key => $value) {
                $this->getQuery()->add($key, $value);
            }
        }

        $this->host     = $urlinfo['host'] ?? null;
        $this->port     = $urlinfo['port'] ?? 0;
        $this->scheme   = isset($urlinfo['scheme']) ? strtolower($urlinfo['scheme']) : 'http';
        $this->uri      = $urlinfo['path'] ?? null;

        if (!in_array($this->scheme, ['http','https'])) {
            throw new \InvalidArgumentException('Invalid URL Scheme. Only HTTP(s) is supported.');
        }

        if (!$this->port) {
            if ($this->scheme == 'https') {
                $this->port = 443;
            } else {
                $this->port = 80;
            }
        }

        return $this;
    }

    /**
     * Get the URL.
     *
     * @return string
     */
    public function getUrl()
    {
        $url = sprintf('%s://%s', strtolower($this->getScheme()), $this->getHost());

        if ($this->getPort() && ($this->getPort() != 80 && $this->getScheme() == 'http') ||
            ($this->getPort() != 443 && $this->getScheme() == 'https')) {
            $url = sprintf('%s:%d', $url, $this->getPort());
        }

        if ($this->getUri()) {
            $url = sprintf('%s%s', $url, $this->getUri());
        }

        return $url;
    }
}
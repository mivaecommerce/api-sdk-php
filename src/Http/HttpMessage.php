<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: HttpMessage.php 71776 2018-12-04 18:48:03Z gidriss $
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
    protected $host;

    /** @var int */
    protected $port;

    /** @var string */
    protected $scheme;

    /** @var string */
    protected $uri;

    /** @var int */
    protected $status;

    /** @var HttpHeaders */
    protected $headers;

    /** @var HttpQuery */
    protected $query;

    /** @var mixed */
    protected $content;

    /** @var string */
    protected $method;

    /** @var string */
    protected $protocol;

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
    protected $httpMethods = [
        self::HTTP_METHOD_GET,
        self::HTTP_METHOD_POST,
        self::HTTP_METHOD_PUT,
        self::HTTP_METHOD_PATCH,
        self::HTTP_METHOD_DELETE
    ];

    /** @var array */
    protected static $statusCodes = [
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
     * @param $url
     * @param string $content
     * @param string $method
     * @param array $query
     * @param array $headers
     */
    public function __construct($url, $content = '', $method = self::HTTP_METHOD_GET, array $query = [], array $headers = [])
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
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the hostname.
     *
     * @param string
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Get the port.
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set the port.
     *
     * @param int
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Get the scheme. HTTP or HTTPS.
     *
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Set the scheme. HTTP or HTTPS.
     *
     * @param string $scheme
     * @return $this
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * Get the URI.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set the URI.
     *
     * @param string
     * @return $this
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * Get the status code.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status code.
     *
     * @param mixed $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = (int) $status;
        return $this;
    }

    /**
     * Get the HTTP Headers.
     *
     * @return HttpHeaders
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the HTTP Headers.
     *
     * @param array|HttpHeaders
     * @return $this
     */
    public function setHeaders($headers)
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
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param HttpQuery|array
     * @return $this
     */
    public function setQuery($query)
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
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the request content.
     *
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Append to the request content.
     *
     * @param mixed $content
     * @return $this
     */
    public function appendContent($content)
    {
        $this->content .= $content;
        return $this;
    }

    /**
     * Get the request method.
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the request method.
     *
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get the protocol.
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Set the protocol.
     *
     * @param string $protocol
     * @return HttpMessage
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * Get the name for the set status code.
     *
     * @return string
     */
    public function getStatusName()
    {
        if ($this->getStatus() && isset(static::$statusCodes[$this->getStatus()])) {
            return static::$statusCodes[$this->getStatus()];
        }

        return null;
    }

    /**
     * Set the URL and parse its parts.
     *
     * @param $url
     * @return HttpMessage
     * @throws \InvalidArgumentException
     */
    public function setUrl($url)
    {
        $urlinfo = parse_url($url);

        if (isset($urlinfo['query']) && $urlinfo['query']) {
            parse_str($urlinfo['query'], $urlquery);

            foreach($urlquery as $key => $value) {
                $this->getQuery()->add($key, $value);
            }
        }

        $this->host     = isset($urlinfo['host'])   ? $urlinfo['host']                  : null;
        $this->port     = isset($urlinfo['port'])   ? $urlinfo['port']                  : null;
        $this->scheme   = isset($urlinfo['scheme']) ? strtolower($urlinfo['scheme'])    : 'http';
        $this->uri      = isset($urlinfo['path'])   ? $urlinfo['path']                  : null;

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
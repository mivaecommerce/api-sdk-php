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
 * Class HttpQuery. Represents query string parameters.
 *
 * @package MerchantAPI\Http
 */
class HttpQuery
{
    /** @var array  */
    protected array $entries = [];

    /**
     * HttpQuery constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        foreach($parameters as $k => $v) {
            $this->add($k, $v);
        }
    }

    /**
     * Reduce the object to a http query string.
     *
     * @see HttpQuery::toQueryString
     * @return string
     */
    public function __toString() : string
    {
        return $this->toQueryString();
    }

    /**
     * Reduce the object to a http query string.
     *
     * @return string
     */
    public function toQueryString() : string
    {
        return http_build_query($this->all());
    }

    /**
     * Add a query parameter.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function add(string $key, $value) : self
    {
        $this->entries[$key] = $value;
        return $this;
    }

    /**
     * Get a defined parameter.
     *
     * @param string $key
     * @param mixed $defaultValue
     * @return ?mixed
     */
    public function get(string $key, $defaultValue = null)
    {
        if (isset($this->entries[$key])) {
            return $this->entries[$key];
        }

        return $defaultValue;
    }

    /**
     * Check if a parameter is defined.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key) : bool
    {
        return isset($this->entries[$key]);
    }

    /**
     * Remove a parameter by key.
     *
     * @param string $key
     * @return $this
     */
    public function remove(string $key) : self
    {
        unset($this->entries[$key]);
        return $this;
    }

    /**
     * Get all query string entries.
     *
     * @return array
     */
    public function all() : array
    {
        return $this->entries;
    }
}
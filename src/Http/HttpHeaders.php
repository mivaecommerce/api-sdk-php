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
 * Class HttpHeaders. Holds HTTP Headers.
 *
 * @package MerchantAPI\Http
 */
class HttpHeaders
{
    /** @var array  */
    protected array $entries = [];

    /**
     * HttpHeaders constructor.
     *
     * @param array $headers
     */
    public function __construct(array $headers = [])
    {
        foreach($headers as $k => $v) {
            $this->add($k, $v);
        }
    }

    /**
     * Add/replace a header value.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function add(string $key, $value) : self
    {
        foreach($this->entries as $k => &$v) {
            if (strcasecmp($key, $k) == 0) {
                $v = $value;
                return $this;
            }
        }

        $this->entries[$key] = $value;
        return $this;
    }

    /**
     * Get a header value.
     *
     * @param string $key
     * @param mixed $defaultValue
     * @return string
     */
    public function get(string $key, $defaultValue = null) : ?string
    {
        foreach($this->entries as $k => $v) {
            if (strcasecmp($key, $k) == 0) {
                return $v;
            }
        }

        return $defaultValue;
    }

    /**
     * Check if a header value is defined.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key) : bool
    {
        foreach($this->entries as $k => $v) {
            if (strcasecmp($key, $k) == 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Remove a header value by key.
     *
     * @param string $key
     * @return $this
     */
    public function remove(string $key) : self
    {
        foreach($this->entries as $k => $v) {
            if (strcasecmp($key, $k) == 0) {
                unset($this->entries[$k]);
                break;
            }
        }
        return $this;
    }

    /**
     * Get all defined header entries.
     *
     * @return array
     */
    public function all() : array
    {
        return $this->entries;
    }

    /**
     * Get the total count of defined header entries.
     *
     * @return int
     */
    public function count() : int
    {
        return count($this->entries);
    }
}
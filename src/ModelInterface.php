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

/**
 * All data model objects must implement this interface.
 *
 * @package MerchantAPI
 */
interface ModelInterface extends \JsonSerializable
{
    /**
     * Check if the data has a field by key.
     *
     * @param string $key
     * @return bool
     */
    public function hasField(string $key) : bool;

    /**
     * Set a a data value by key.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setField(string $key, $value) : self;

    /**
     * Get a data value by key.
     *
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getField(string $key, $defaultValue = null);

    /**
     * Remove a data value by key.
     *
     * @param string $key
     * @return $this
     */
    public function removeField(string $key) : self;

    /**
     * Get the data array.
     *
     * @return array
     */
    public function getData() : array;

    /**
     * Check if data array is populated with anything.
     *
     * @return bool
     */
    public function hasData() : bool;
}
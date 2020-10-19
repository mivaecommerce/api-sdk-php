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
interface ModelInterface
{
    /**
     * Check if the data has a field by key.
     *
     * @param string
     * @return bool
     */
    public function hasField($key);

    /**
     * Set a a data value by key.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setField($key, $value);

    /**
     * Get a data value by key.
     *
     * @param string
     * @param mixed
     * @return mixed
     */
    public function getField($key, $defaultValue = null);

    /**
     * Remove a data value by key.
     *
     * @param string
     * @return $this
     */
    public function removeField($key);

    /**
     * Get the data array.
     *
     * @return array
     */
    public function getData();

    /**
     * Check if data array is populated with anything.
     *
     * @return bool
     */
    public function hasData();
}
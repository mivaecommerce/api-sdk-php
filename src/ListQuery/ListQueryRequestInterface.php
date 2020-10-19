<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\ListQuery;

use MerchantAPI\RequestInterface;

/**
 * Interface ListQueryRequestInterface.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview
 */
interface ListQueryRequestInterface extends RequestInterface
{
    /** Sort Constants */
    const SORT_ASCENDING    = 'asc';
    const SORT_DESCENDING   = 'desc';

    /**
     * Get the sorting field.
     *
     * @return mixed
     */
    public function getSort();

    /**
     * Set the sorting field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function setSort($field, $direction = self::SORT_ASCENDING);

    /**
     * Get the available sorting fields for the request.
     *
     * @return array
     */
    public function getAvailableSortFields();

    /**
     * Get the record offset.
     *
     * @return mixed
     */
    public function getOffset();

    /**
     * Set the record offset.
     *
     * @param mixed $offset
     * @return $this
     */
    public function setOffset($offset);

    /**
     * Get the maximum records to request.
     *
     * @return mixed
     */
    public function getCount();

    /**
     * Set the maximum records to request.
     *
     * @param mixed $count
     * @return $this
     */
    public function setCount($count);

    /**
     * Get the available search fields for the request.
     *
     * @return array
     */
    public function getAvailableSearchFields();

    /**
     * Add an on demand column to the request.
     *
     * @param string|array
     * @return $this
     */
    public function addOnDemandColumn($column);

    /**
     * Remove an on demand column from the request.
     *
     * @param string|array
     * @return $this
     */
    public function removeOnDemandColumn($column);

    /**
     * Set the on demand columns to fetch.
     *
     * @param array
     * @return $this
     */
    public function setOnDemandColumns(array $columns);

    /**
     * Get the on demand columns to fetch.
     *
     * @return array
     */
    public function getOnDemandColumns();

    /**
     * Get the available on demand columns for the request.
     *
     * @return array
     */
    public function getAvailableOnDemandColumns();

    /**
     * Get the custom filters to apply.
     *
     * @return array
     */
    public function getCustomFilters();

    /**
     * Get the available custom filters for the request.
     *
     * @return array
     */
    public function getAvailableCustomFilters();

    /**
     * Set the search filters to apply to the request.
     *
     * @param array| \MerchantAPI\ListQuery\FilterExpression
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setFilters($filters);

    /**
     * Get the search filters to apply to the request.
     *
     * @return array|\MerchantAPI\ListQuery\FilterExpression
     */
    public function getFilters();

    /**
     * Set a custom filter supported by the request.
     *
     * @param string The custom filter name
     * @param mixed The custom filter value
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setCustomFilter($name, $value);

    /**
     * Remove a custom filter applied to the request.
     *
     * @param string
     * @return $this
     */
    public function removeCustomFilter($name);

    /**
     * Creates a new FilterExpression object in the context the request.
     *
     * @return \MerchantAPI\ListQuery\FilterExpression
     */
    public function filterExpression();
}
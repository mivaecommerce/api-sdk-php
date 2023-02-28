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
     * @return ?string
     */
    public function getSort() : string;

    /**
     * Set the sorting field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function setSort(string $field, string $direction = self::SORT_ASCENDING);

    /**
     * Get the available sorting fields for the request.
     *
     * @return array
     */
    public function getAvailableSortFields() : array;

    /**
     * Get the record offset.
     *
     * @return int
     */
    public function getOffset() : int;

    /**
     * Set the record offset.
     *
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset) : self;

    /**
     * Get the maximum records to request.
     *
     * @return int
     */
    public function getCount() : int;

    /**
     * Set the maximum records to request.
     *
     * @param int $count
     * @return $this
     */
    public function setCount(int $count) : self;

    /**
     * Get the available search fields for the request.
     *
     * @return array
     */
    public function getAvailableSearchFields() : array;

    /**
     * Add an on demand column to the request.
     *
     * @param string $column
     * @return $this
     */
    public function addOnDemandColumn(string $column) : self;

    /**
     * Remove an on demand column from the request.
     *
     * @param string $column
     * @return $this
     */
    public function removeOnDemandColumn(string $column) : self;

    /**
     * Set the on demand columns to fetch.
     *
     * @param array $columns
     * @return $this
     */
    public function setOnDemandColumns(array $columns) : self;

    /**
     * Get the on demand columns to fetch.
     *
     * @return array
     */
    public function getOnDemandColumns() : array;

    /**
     * Get the available on demand columns for the request.
     *
     * @return array
     */
    public function getAvailableOnDemandColumns() : array;

    /**
     * Get the custom filters to apply.
     *
     * @return array
     */
    public function getCustomFilters() : array;

    /**
     * Get the available custom filters for the request.
     *
     * @return array
     */
    public function getAvailableCustomFilters() : array;

    /**
     * Set the search filters to apply to the request.
     *
     * @param array|\MerchantAPI\ListQuery\FilterExpression $filters
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setFilters($filters) : self;

    /**
     * Get the search filters to apply to the request.
     *
     * @return array|\MerchantAPI\ListQuery\FilterExpression
     */
    public function getFilters();

    /**
     * Set a custom filter supported by the request.
     *
     * @param string $name The custom filter name
     * @param mixed $value The custom filter value
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setCustomFilter(string $name, $value) : self;

    /**
     * Remove a custom filter applied to the request.
     *
     * @param string $name
     * @return $this
     */
    public function removeCustomFilter(string $name) : self;

    /**
     * Creates a new FilterExpression object in the context the request.
     *
     * @return \MerchantAPI\ListQuery\FilterExpression
     */
    public function filterExpression() : FilterExpression;
}
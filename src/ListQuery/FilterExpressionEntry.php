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

/**
 * Represents a single filter expression.
 *
 *
 * @package MerchantAPI\ListQuery
 * @see MerchantAPI/ListQuery/FilterExpression
 */
class FilterExpressionEntry
{
    /** @var string left side search field */
    protected string $left;

    /** @var string one of self::OPERATOR_ constants */
    protected string $operator;

    /** @var string right side search value */
    protected string $right;

    /** @var int search type */
    protected int $search;

    /**
     * FilterExpressionEntry constructor.
     *
     * @param string $left
     * @param string $operator
     * @param string $right
     * @param int $search
     */
    public function __construct(string $left, string $operator, string $right, int $search = FilterExpression::FILTER_SEARCH)
    {
        $this->left     = $left;
        $this->operator = $operator;
        $this->right    = $right;
        $this->search   = $search;
    }

    /**
     * Get the left side of the expression.
     *
     * @return string
     */
    public function getLeft() : string
    {
        return $this->left;
    }

    /**
     * Set the left side of the comparison.
     *
     * @param string $left
     * @return FilterExpressionEntry
     */
    public function setLeft(string $left) : self
    {
        $this->left = $left;
        return $this;
    }

    /**
     * Get the expression operator.
     *
     * @return string
     */
    public function getOperator() : string
    {
        return $this->operator;
    }

    /**
     * Set the expression operator.
     *
     * @param string $operator
     * @return FilterExpressionEntry
     */
    public function setOperator(string $operator) : self
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * Get the right side of the expression.
     *
     * @return string
     */
    public function getRight() : string
    {
        return $this->right;
    }

    /**
     * Set the right side of the expression.
     *
     * @param string $right
     * @return FilterExpressionEntry
     */
    public function setRight(string $right) : self
    {
        $this->right = $right;
        return $this;
    }

    /**
     * Get the search type.
     *
     * @return int
     */
    public function getSearch() : int
    {
        return $this->search;
    }

    /**
     * Set the search type.
     *
     * @param int $search
     * @return FilterExpressionEntry
     */
    public function setSearch(int $search) : self
    {
        $this->search = $search;
        return $this;
    }
}
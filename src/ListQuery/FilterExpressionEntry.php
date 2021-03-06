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
    protected $left;

    /** @var string one of self::OPERATOR_ constants */
    protected $operator;

    /** @var string right side search value */
    protected $right;

    /** @var string search type */
    protected $search;

    /**
     * FilterExpressionEntry constructor.
     *
     * @param string
     * @param string
     * @param mixed
     * @param int
     */
    public function __construct($left, $operator, $right, $search = FilterExpression::FILTER_SEARCH)
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
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set the left side of the comparison.
     *
     * @param string $left
     * @return FilterExpressionEntry
     */
    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    /**
     * Get the expression operator.
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set the expression operator.
     *
     * @param string $operator
     * @return FilterExpressionEntry
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * Get the right side of the expression.
     *
     * @return string
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Set the right side of the expression.
     *
     * @param string $right
     * @return FilterExpressionEntry
     */
    public function setRight($right)
    {
        $this->right = $right;
        return $this;
    }

    /**
     * Get the search type.
     *
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set the search type.
     *
     * @param string $search
     * @return FilterExpressionEntry
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }
}
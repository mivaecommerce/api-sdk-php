<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: FilterExpression.php 71697 2018-11-28 19:10:49Z gidriss $
 */

namespace MerchantAPI\ListQuery;

/**
 * Search query expression builder for use with *List_Load_Query functions.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview#filter-list-parameters
 */
class FilterExpression
{
    /** @var \MerchantAPI\ListQuery\ListQueryRequestInterface|null  */
    protected $request;

    /** @var FilterExpression|null  */
    protected $parent = null;

    /** @var string Search */
    const FILTER_SEARCH        = 1;

    /** @var string Search And */
    const FILTER_SEARCH_AND    = 2;

    /** @var string Search Or */
    const FILTER_SEARCH_OR     = 3;

    /** @var array Available search filters */
    public static $searchFilters = [
        self::FILTER_SEARCH        => 'search',
        self::FILTER_SEARCH_AND    => 'search_AND',
        self::FILTER_SEARCH_OR     => 'search_OR'
    ];

    /** @var string Operator Equals */
    const OPERATOR_EQ 		= 'EQ';

    /** @var string Operator Greater Than */
    const OPERATOR_GT 		= 'GT';

    /** @var string Operator Greater Than or Equal */
    const OPERATOR_GE 		= 'GE';

    /** @var string Operator Less Than */
    const OPERATOR_LT 		= 'LT';

    /** @var string Operator Less Than or Equal */
    const OPERATOR_LE 		= 'LE';

    /** @var string Operator Contains */
    const OPERATOR_CO 		= 'CO';

    /** @var string Operator Does Not Contain */
    const OPERATOR_NC 		= 'NC';

    /** @var string Operator Like */
    const OPERATOR_LIKE 	= 'LIKE';

    /** @var string Operator Not Like */
    const OPERATOR_NOTLIKE 	= 'NOTLIKE';

    /** @var string Operator Not Equal */
    const OPERATOR_NE 		= 'NE';

    /** @var string Operator True */
    const OPERATOR_TRUE 	= 'TRUE';

    /** @var string Operator False */
    const OPERATOR_FALSE 	= 'FALSE';

    /** @var string Operator Is Null */
    const OPERATOR_NULL 	= 'NULL';

    /** @var string Operator In Set (comma separated list) */
    const OPERATOR_IN 		= 'IN';

    /** @var string Operator Not In Set (comma separated list) */
    const OPERATOR_NOT_IN 	= 'NOT_IN';

    /** @var string Operator SUBWHERE */
    const OPERATOR_SUBWHERE = 'SUBWHERE';

    /** @var array  */
    public static $operators = [
        self::OPERATOR_EQ,
        self::OPERATOR_GT,
        self::OPERATOR_GE,
        self::OPERATOR_LT,
        self::OPERATOR_LE,
        self::OPERATOR_CO,
        self::OPERATOR_NC,
        self::OPERATOR_LIKE,
        self::OPERATOR_NOTLIKE,
        self::OPERATOR_NE,
        self::OPERATOR_TRUE,
        self::OPERATOR_FALSE,
        self::OPERATOR_NULL,
        self::OPERATOR_IN,
        self::OPERATOR_NOT_IN,
        self::OPERATOR_SUBWHERE
    ];

    /** @var array */
    protected $expressions = [];

    /**
     * FilterExpression constructor.
     *
     * @param ListQueryRequestInterface|null $request
     */
    public function __construct(ListQueryRequestInterface $request = null)
    {
        $this->request = $request;
    }

    /**
     * Get the parent expression.
     *
     * @return FilterExpression|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set the parent expression.
     *
     * @param FilterExpression|null $parent
     * @return FilterExpression
     */
    public function setParent(FilterExpression $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Check if this expression is a child of another.
     *
     * @return bool
     */
    public function isChild()
    {
        return $this->parent !== null;
    }

    /**
     * Get the child depth.
     *
     * @return int
     */
    public function childDepth()
    {
        $i = 0;

        $parent = $this->getParent();

        while ($parent) {
            $parent = $parent->getParent();
            $i++;
        }

        return $i;
    }

    /**
     * Create a new expression instance.
     *
     * @return FilterExpression
     */
    public function expr()
    {
        return new FilterExpression($this->request);
    }

    /**
     * Add a search filter.
     *
     * @param string
     * @param string 
     * @param string
     * @param string
     * @return $this
     */
    public function add($field, $operator, $value, $type)
    {
        $operator = strtoupper($operator);

        if ($this->request) {
            if (!in_array($field, $this->request->getAvailableSearchFields())) {
                throw new \InvalidArgumentException(sprintf('Field %s is invalid. Available fields are: %s',
                    $field, implode(', ', $this->request->getAvailableSearchFields())));
            }
        }

        if (!in_array($operator, static::$operators)) {
            throw new \InvalidArgumentException(sprintf('Operator %s is invalid. Available operators are: %s',
                $field, implode(', ', static::$operators)));
        }

        if (!count($this->expressions)) {
            $type = self::FILTER_SEARCH;
        } elseif (count($this->expressions) && $type == self::FILTER_SEARCH) {
            $type = self::FILTER_SEARCH_OR;
        }

        if ($type == self::FILTER_SEARCH || $type == self::FILTER_SEARCH_AND || $type == self::FILTER_SEARCH_OR) {
            $this->expressions[] = [ 'type' => $type, 'entry' => new FilterExpressionEntry($field, $operator, $value, $type) ];
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid type %d', $type));
        }

        return $this;
    }

    /**
     * Add a AND expression.
     *
     * @param FilterExpression $expression
     * @return $this
     */
    public function andX(FilterExpression $expression)
    {
        $expression->setParent($this);

        $this->expressions[] = [ 'type' => static::FILTER_SEARCH_AND, 'entry' => $expression ];

        return $this;
    }

    /**
     * Add a OR expression.
     *
     * @param FilterExpression $expression
     * @return $this
     */
    public function orX(FilterExpression $expression)
    {
        $expression->setParent($this);

        $this->expressions[] = [ 'type' => static::FILTER_SEARCH_OR, 'entry' => $expression ];

        return $this;
    }

    /**
     * Add a equal (x EQ y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function equal($field, $value)
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a equal (AND x EQ y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a equal (OR x EQ y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a greater than (x GT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function greaterThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a greater than (AND x GT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andGreaterThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a greater than (OR x GT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orGreaterThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a greater than or equal (x GE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function greaterThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a greater than or equal (AND x GE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andGreaterThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a greater than or equal (OR x GE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orGreaterThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a less than (x LT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function lessThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a less than (AND x LT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andLessThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a less than (OR x LT y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orLessThan($field, $value)
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a less than or equal (x LE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function lessThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a less than or equal (AND x LE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andLessThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a less than or equal (OR x LE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orLessThanEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a contains (x CO y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function contains($field, $value)
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a contains (AND x CO y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andContains($field, $value)
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a contains (OR x CO y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orContains($field, $value)
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a does not contains (x NC y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function doesNotContain($field, $value)
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a does not contains (AND x NC y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andDoesNotContain($field, $value)
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a does not contains (OR x NC y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orDoesNotContain($field, $value)
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a like (x LIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function like($field, $value)
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a like (AND x LIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andLike($field, $value)
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a like (OR x LIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orLike($field, $value)
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not like (x NOTLIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function notLike($field, $value)
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a not like (AND x NOTLIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andNotLike($field, $value)
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not like (OR x NOTLIKE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orNotLike($field, $value)
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not equal (x NE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function notEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a not equal (AND x NE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function andNotEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not equal (OR x NE y) filter for specified field.
     *
     * @param string
     * @param string
     * @return $this
     */
    public function orNotEqual($field, $value)
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a true (x == true) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function true($field)
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH);
    }

    /**
     * Add a true (AND x == true) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function andTrue($field)
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a true (OR x == true) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function orTrue($field)
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a false (x == false) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function false($field)
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH);
    }

    /**
     * Add a false (AND x == false) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function andFalse($field)
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a false (OR x == false) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function orFalse($field)
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a is null (x == null) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function null($field)
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH);
    }

    /**
     * Add a is null (AND x == null) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function andNull($field)
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a is null (OR x == null) filter for specified field.
     *
     * @param string
     * @return $this
     */
    public function orNull($field)
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a in (x IN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string $values
     * @return $this
     */
    public function in($field, $values)
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH);
    }

    /**
     * Add a in (AND x IN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string
     * @return $this
     */
    public function andIn($field, $values)
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a in (OR x IN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string
     * @return $this
     */
    public function orIn($field, $values)
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not in (x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string
     * @return $this
     */
    public function notIn($field, $values)
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH);
    }

    /**
     * Add a not in (AND x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string
     * @return $this
     */
    public function andNotIn($field, $values)
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not in (OR x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string
     * @param array|string
     * @return $this
     */
    public function orNotIn($field, $values)
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH_OR);
    }

    /**
     * Reduce the built expression(s) to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $return = [];

        foreach ($this->expressions as $e) {
            if ($e['entry'] instanceof FilterExpression) {
                if ($this->isChild()) {
                    $entry = [
                        'field'     => static::$searchFilters[$e['type']],
                        'operator'  => 'SUBWHERE',
                        'value'     => $e['entry']->toArray()
                    ];
                } else {
                    $entry = [
                        'name'  => static::$searchFilters[$e['type']],
                        'value' => $e['entry']->toArray()
                    ];
                }
            } else {
                if ($this->isChild()) {
                    $entry = [
                        'field'     => $e['entry']->getLeft(),
                        'operator'  => $e['entry']->getOperator(),
                        'value'     => is_array($e['entry']->getRight()) ?
                                            implode(',', $e['entry']->getRight()) : $e['entry']->getRight()
                    ];
                } else {
                    $entry = [
                        'name' => static::$searchFilters[$e['type']],
                        'value' => [
                            [
                                'field'     => $e['entry']->getLeft(),
                                'operator'  => $e['entry']->getOperator(),
                                'value'     => is_array($e['entry']->getRight()) ?
                                                implode(',', $e['entry']->getRight()) : $e['entry']->getRight()
                            ]
                        ]
                    ];
                }
            }

            $return[] = $entry;
        }

        return $return;
    }
}
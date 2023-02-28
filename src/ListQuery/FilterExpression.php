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
 * Search query expression builder for use with *List_Load_Query functions.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview#filter-list-parameters
 */
class FilterExpression
{
    /** @var ?ListQueryRequestInterface  */
    protected ?ListQueryRequestInterface $request;

    /** @var ?FilterExpression  */
    protected ?FilterExpression $parent = null;

    /** @var int Search */
    const FILTER_SEARCH        = 1;

    /** @var int Search And */
    const FILTER_SEARCH_AND    = 2;

    /** @var int Search Or */
    const FILTER_SEARCH_OR     = 3;

    /** @var array Available search filters */
    public static array $searchFilters = [
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
    public static array $operators = [
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
    protected array $expressions = [];

    /**
     * FilterExpression constructor.
     *
     * @param ListQueryRequestInterface|null $request
     */
    public function __construct(?ListQueryRequestInterface $request = null)
    {
        $this->request = $request;
    }

    /**
     * Get the parent expression.
     *
     * @return FilterExpression|null
     */
    public function getParent() : ?FilterExpression
    {
        return $this->parent;
    }

    /**
     * Set the parent expression.
     *
     * @param FilterExpression|null $parent
     * @return FilterExpression
     */
    public function setParent(?FilterExpression $parent = null) : self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Check if this expression is a child of another.
     *
     * @return bool
     */
    public function isChild() : bool
    {
        return $this->parent !== null;
    }

    /**
     * Get the child depth.
     *
     * @return int
     */
    public function childDepth() : int
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
    public function expr() : FilterExpression
    {
        return new FilterExpression($this->request);
    }

    /**
     * Add a search filter.
     *
     * @param string $field
     * @param string $operator
     * @param mixed $value
     * @param int $type
     * @return $this
     */
    public function add(string $field, string $operator, $value, int $type) : self
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
     * Add an AND expression.
     *
     * @param FilterExpression $expression
     * @return $this
     */
    public function andX(FilterExpression $expression) : self
    {
        $expression->setParent($this);

        $this->expressions[] = [ 'type' => static::FILTER_SEARCH_AND, 'entry' => $expression ];

        return $this;
    }

    /**
     * Add an OR expression.
     *
     * @param FilterExpression $expression
     * @return $this
     */
    public function orX(FilterExpression $expression) : self
    {
        $expression->setParent($this);

        $this->expressions[] = [ 'type' => static::FILTER_SEARCH_OR, 'entry' => $expression ];

        return $this;
    }

    /**
     * Add an equal (x EQ y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function equal(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH);
    }

    /**
     * Add an equal (AND x EQ y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add an equal (OR x EQ y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_EQ, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a greater than (x GT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function greaterThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a greater than (AND x GT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andGreaterThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a greater than (OR x GT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orGreaterThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GT, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a greater than or equal (x GE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function greaterThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a greater than or equal (AND x GE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andGreaterThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a greater than or equal (OR x GE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orGreaterThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_GE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a less than (x LT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function lessThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a less than (AND x LT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andLessThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a less than (OR x LT y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orLessThan(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LT, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a less than or equal (x LE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function lessThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a less than or equal (AND x LE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andLessThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a less than or equal (OR x LE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orLessThanEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a contains (x CO y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function contains(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a contains (AND x CO y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andContains(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a contains (OR x CO y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orContains(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_CO, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a does not contain (x NC y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function doesNotContain(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a does not contain (AND x NC y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andDoesNotContain(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a does not contain (OR x NC y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orDoesNotContain(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NC, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a like (x LIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function like(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a like (AND x LIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andLike(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a like (OR x LIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orLike(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_LIKE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not like (x NOTLIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function notLike(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a not like (AND x NOTLIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andNotLike(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not like (OR x NOTLIKE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orNotLike(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NOTLIKE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not equal (x NE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function notEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH);
    }

    /**
     * Add a not equal (AND x NE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function andNotEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not equal (OR x NE y) filter for specified field.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function orNotEqual(string $field, $value) : self
    {
        return $this->add($field, static::OPERATOR_NE, $value, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a true (x == true) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function true(string $field) : self
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH);
    }

    /**
     * Add a true (AND x == true) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function andTrue(string $field) : self
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a true (OR x == true) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function orTrue(string $field) : self
    {
        return $this->add($field, static::OPERATOR_TRUE, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a false (x == false) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function false(string $field) : self
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH);
    }

    /**
     * Add a false (AND x == false) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function andFalse(string $field) : self
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a false (OR x == false) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function orFalse(string $field) : self
    {
        return $this->add($field, static::OPERATOR_FALSE, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a is null (x == null) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function null(string $field) : self
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH);
    }

    /**
     * Add an is null (AND x == null) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function andNull(string $field) : self
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH_AND);
    }

    /**
     * Add an is null (OR x == null) filter for specified field.
     *
     * @param string $field
     * @return $this
     */
    public function orNull(string $field) : self
    {
        return $this->add($field, static::OPERATOR_NULL, null, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a in (x IN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function in(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH);
    }

    /**
     * Add a in (AND x IN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function andIn(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a in (OR x IN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function orIn(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_IN, $values, static::FILTER_SEARCH_OR);
    }

    /**
     * Add a not in (x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function notIn(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH);
    }

    /**
     * Add a not in (AND x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function andNotIn(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH_AND);
    }

    /**
     * Add a not in (OR x NOTIN y,z,.. ) filter for specified field.
     *
     * @param string $field
     * @param array|string $values
     * @return $this
     */
    public function orNotIn(string $field, $values) : self
    {
        return $this->add($field, static::OPERATOR_NOT_IN, $values, static::FILTER_SEARCH_OR);
    }

    /**
     * Reduce the built expression(s) to an array.
     *
     * @return array
     */
    public function toArray() : array
    {
        $return = [];

        foreach ($this->expressions as $e) {
            if ($e['entry'] instanceof FilterExpression) {
                $entry = [
                    'name'  => static::$searchFilters[$e['type']],
                    'value' => $e['entry']->toArray(),
                ];
            } else {
                if ($this->isChild()) {
                    $entry = [
                        'field'     => static::$searchFilters[$e['type']],
                        'operator'  => 'SUBWHERE',
                        'value'     => [
                            [
                                'field' => $e['entry']->getLeft(),
                                'operator' => $e['entry']->getOperator(),
                                'value' => is_array($e['entry']->getRight()) ?
                                            implode(',', $e['entry']->getRight()) : $e['entry']->getRight()
                            ],
                        ]
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
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

use MerchantAPI\Request;
use MerchantAPI\BaseClient;

/**
 * Abstract request class for use with *List_Load_Query functions.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview
 */
abstract class ListQueryRequest extends Request implements ListQueryRequestInterface
{
    /** @var string  */
    protected $sort;

    /** @var array|\MerchantAPI\ListQuery\FilterExpression */
    protected $filters;

    /** @var array */
    protected $availableSearchFields    = [];

    /** @var array */
    protected $availableSortFields      = [];

    /** @var array */
    protected $availableOnDemandColumns = [];

    /** @var array */
    protected $onDemandColumns          = [];

    /** @var array */
    protected $availableCustomFilters   = [];

    /** @var array */
    protected $customFilters            = [];

    /** @var int */
    protected $offset = 0;

    /** @var int */
    protected $count = 0;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(BaseClient $client = null)
    {
        parent::__construct($client);

        $this->filters = new FilterExpression($this);
    }

    /**
     * @inheritDoc
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @inheritDoc
     */
    public function setSort($field, $direction = self::SORT_ASCENDING)
    {
        $direction = strtolower($direction);

        if (!in_array($field, $this->getAvailableSortFields())) {
            throw new \InvalidArgumentException(sprintf('Field %s is not sortable. Available fields are %s',
                $field, implode(', ', $this->getAvailableSortFields())));
        }

        if ($direction == self::SORT_DESCENDING && $field[0] != '-') {
            $field = '-' . $field;
        }

        $this->sort = $field;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAvailableSortFields()
    {
        return $this->availableSortFields;
    }

    /**
     * @inheritDoc
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @inheritDoc
     */
    public function setOffset($offset)
    {
        $this->offset = (int) $offset;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @inheritDoc
     */
    public function setCount($count)
    {
        $this->count = (int) $count;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAvailableSearchFields()
    {
        return $this->availableSearchFields;
    }

    /**
     * @inheritDoc
     * @throws \InvalidArgumentException
     */
    public function addOnDemandColumn($column)
    {
        if (stripos($column, ':') === false && !in_array($column, $this->getAvailableOnDemandColumns())) {
            throw new \InvalidArgumentException(sprintf('Column %s is not an on demand column. Available on demand columns are %s',
                $column, implode(', ', $this->getAvailableOnDemandColumns())));
        }

        if (!in_array($column, $this->onDemandColumns)) {
            $this->onDemandColumns[] = $column;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeOnDemandColumn($column)
    {
        foreach ($this->getOnDemandColumns() as $i => $col) {
            if ($column === $col) {
                unset($this->onDemandColumns[$i]);
                $this->onDemandColumns = array_values($this->onDemandColumns);
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @throws \InvalidArgumentException
     */
    public function setOnDemandColumns(array $columns)
    {
        $org = $this->onDemandColumns;

        try {
            foreach ($columns as $column) {
                $this->addOnDemandColumn($column);
            }
        } catch (\InvalidArgumentException $e) {
            $this->onDemandColumns = $org;
            throw $e;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOnDemandColumns()
    {
        return $this->onDemandColumns;
    }

    /**
     * @inheritDoc
     */
    public function getAvailableOnDemandColumns()
    {
        return $this->availableOnDemandColumns;
    }

    /**
     * @inheritDoc
     */
    public function getCustomFilters()
    {
        return $this->customFilters;
    }

    /**
     * @inheritDoc
     */
    public function getAvailableCustomFilters()
    {
        return array_keys($this->availableCustomFilters);
    }

    /**
     * @inheritDoc
     */
    public function setFilters($filters)
    {
        if (is_array($filters) || $filters instanceof FilterExpression) {
            $this->filters = $filters;
        } else {
            throw new \InvalidArgumentException(sprintf('Expecting an array or FilterExpression but got %s',
                is_object($filters) ? get_class($filters) : gettype($filters)));
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @inheritDoc
     */
    public function setCustomFilter($name, $value)
    {
        if (!isset($this->availableCustomFilters[$name])) {
            throw new \InvalidArgumentException(sprintf('Invalid custom filter %s. Available filters are %s',
                $name, implode(', ', $this->getAvailableCustomFilters())));
        }

        if (is_array($this->availableCustomFilters[$name])) {
            if (!in_array($value, $this->availableCustomFilters[$name])) {
                throw new \InvalidArgumentException(sprintf('Invalid custom filter choice for %s. Available choices are %s',
                    $name, implode(', ', $this->availableCustomFilters[$name])));
            }
        }

        $this->customFilters[$name] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function removeCustomFilter($name)
    {
        if (isset($this->customFilters[$name])) {
            unset($this->customFilters[$name]);
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function filterExpression()
    {
        return new FilterExpression($this);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $return = array_merge(parent::toArray(), [
            'Sort'      => $this->getSort(),
            'Offset'    => $this->getOffset(),
            'Count'     => $this->getCount(),
            'Filter'    => []
        ]);

        $filters = $this->getFilters();

        if ($filters instanceof FilterExpression) {
            $result = $filters->toArray();

            if (!is_array($result)) {
                throw new \InvalidArgumentException(sprintf('Expected filter expression to return an array but got %s',
                    gettype($result)));
            }

            if (count($result)) {
                $return['Filter'] = $result;
            }
        } else if (is_array($filters) && count($filters)) {
            $return['Filter'] = $filters;
        }

        if (count($this->getOnDemandColumns())) {
            $return['Filter'][] = [
                'name'  => 'ondemandcolumns',
                'value' => $this->getOnDemandColumns()
            ];
        }

        if (count($this->getCustomFilters())) {
            foreach ($this->getCustomFilters() as $field => $value) {
                $return['Filter'][] = [
                    'name'  => $field,
                    'value' => $value
                ];
            }
        }

        return $return;
    }
}
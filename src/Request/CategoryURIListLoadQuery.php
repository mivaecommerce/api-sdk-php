<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CategoryURIList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categoryurilist_load_query
 */
class CategoryURIListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CategoryURIList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'canonical',
        'status',
        'uri',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'uri',
    ];

    /** @var ?int */
    protected ?int $categoryId = null;

    /** @var ?string */
    protected ?string $editCategory = null;

    /** @var ?string */
    protected ?string $categoryCode = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Category $category
     */
    public function __construct(?BaseClient $client = null, ?Category $category = null)
    {
        parent::__construct($client);
        if ($category) {
            if ($category->getId()) {
                $this->setCategoryId($category->getId());
            } else if ($category->getCode()) {
                $this->setEditCategory($category->getCode());
            } else if ($category->getCode()) {
                $this->setCategoryCode($category->getCode());
            }

            $this->setCategoryCode($category->getCode());
        }
    }

    /**
     * Get Category_ID.
     *
     * @return int
     */
    public function getCategoryId() : ?int
    {
        return $this->categoryId;
    }

    /**
     * Get Edit_Category.
     *
     * @return string
     */
    public function getEditCategory() : ?string
    {
        return $this->editCategory;
    }

    /**
     * Get Category_Code.
     *
     * @return string
     */
    public function getCategoryCode() : ?string
    {
        return $this->categoryCode;
    }

    /**
     * Set Category_ID.
     *
     * @param ?int $categoryId
     * @return $this
     */
    public function setCategoryId(?int $categoryId) : self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Set Edit_Category.
     *
     * @param ?string $editCategory
     * @return $this
     */
    public function setEditCategory(?string $editCategory) : self
    {
        $this->editCategory = $editCategory;

        return $this;
    }

    /**
     * Set Category_Code.
     *
     * @param ?string $categoryCode
     * @return $this
     */
    public function setCategoryCode(?string $categoryCode) : self
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getCategoryId()) {
            $data['Category_ID'] = $this->getCategoryId();
        } else if ($this->getEditCategory()) {
            $data['Edit_Category'] = $this->getEditCategory();
        } else if ($this->getCategoryCode()) {
            $data['Category_Code'] = $this->getCategoryCode();
        }

        $data['Category_Code'] = $this->getCategoryCode();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CategoryURIListLoadQuery($this, $httpResponse, $data);
    }
}
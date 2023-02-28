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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;
use MerchantAPI\Model\CategoryProduct;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CategoryProductList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categoryproductlist_load_query
 */
class CategoryProductListLoadQuery extends ProductListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CategoryProductList_Load_Query';

    /** @var ?int */
    protected ?int $categoryId = null;

    /** @var ?string */
    protected ?string $categoryCode = null;

    /** @var ?string */
    protected ?string $editCategory = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

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
            }
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
     * Get Category_Code.
     *
     * @return string
     */
    public function getCategoryCode() : ?string
    {
        return $this->categoryCode;
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
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned() : ?bool
    {
        return $this->unassigned;
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
     * Set Assigned.
     *
     * @param ?bool $assigned
     * @return $this
     */
    public function setAssigned(?bool $assigned) : self
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Set Unassigned.
     *
     * @param ?bool $unassigned
     * @return $this
     */
    public function setUnassigned(?bool $unassigned) : self
    {
        $this->unassigned = $unassigned;

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

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        if (!is_null($this->getUnassigned())) {
            $data['Unassigned'] = $this->getUnassigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CategoryProductListLoadQuery($this, $httpResponse, $data);
    }
}
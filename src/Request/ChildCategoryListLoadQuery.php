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
use MerchantAPI\Model\ChildCategory;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ChildCategoryList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/childcategorylist_load_query
 */
class ChildCategoryListLoadQuery extends CategoryListLoadQuery
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ChildCategoryList_Load_Query';

    /** @var ?int */
    protected ?int $parentCategoryId = null;

    /** @var ?string */
    protected ?string $parentCategoryCode = null;

    /** @var ?string */
    protected ?string $editParentCategory = null;

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
                $this->setParentCategoryId($category->getId());
            } else if ($category->getCode()) {
                $this->setEditParentCategory($category->getCode());
            } else if ($category->getCode()) {
                $this->setParentCategoryCode($category->getCode());
            }
        }
    }

    /**
     * Get ParentCategory_ID.
     *
     * @return int
     */
    public function getParentCategoryId() : ?int
    {
        return $this->parentCategoryId;
    }

    /**
     * Get ParentCategory_Code.
     *
     * @return string
     */
    public function getParentCategoryCode() : ?string
    {
        return $this->parentCategoryCode;
    }

    /**
     * Get Edit_ParentCategory.
     *
     * @return string
     */
    public function getEditParentCategory() : ?string
    {
        return $this->editParentCategory;
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
     * Set ParentCategory_ID.
     *
     * @param ?int $parentCategoryId
     * @return $this
     */
    public function setParentCategoryId(?int $parentCategoryId) : self
    {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    /**
     * Set ParentCategory_Code.
     *
     * @param ?string $parentCategoryCode
     * @return $this
     */
    public function setParentCategoryCode(?string $parentCategoryCode) : self
    {
        $this->parentCategoryCode = $parentCategoryCode;

        return $this;
    }

    /**
     * Set Edit_ParentCategory.
     *
     * @param ?string $editParentCategory
     * @return $this
     */
    public function setEditParentCategory(?string $editParentCategory) : self
    {
        $this->editParentCategory = $editParentCategory;

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

        if ($this->getParentCategoryId()) {
            $data['ParentCategory_ID'] = $this->getParentCategoryId();
        } else if ($this->getParentCategoryCode()) {
            $data['ParentCategory_Code'] = $this->getParentCategoryCode();
        } else if ($this->getEditParentCategory()) {
            $data['Edit_ParentCategory'] = $this->getEditParentCategory();
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
        return new \MerchantAPI\Response\ChildCategoryListLoadQuery($this, $httpResponse, $data);
    }
}
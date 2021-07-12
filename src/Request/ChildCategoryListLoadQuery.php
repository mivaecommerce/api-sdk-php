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
use MerchantAPI\BaseClient;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ChildCategoryList_Load_Query';

    /** @var int */
    protected $parentCategoryId;

    /** @var string */
    protected $parentCategoryCode;

    /** @var string */
    protected $editParentCategory;

    /** @var bool */
    protected $assigned;

    /** @var bool */
    protected $unassigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Category
     */
    public function __construct(BaseClient $client = null, Category $category = null)
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
    public function getParentCategoryId()
    {
        return $this->parentCategoryId;
    }

    /**
     * Get ParentCategory_Code.
     *
     * @return string
     */
    public function getParentCategoryCode()
    {
        return $this->parentCategoryCode;
    }

    /**
     * Get Edit_ParentCategory.
     *
     * @return string
     */
    public function getEditParentCategory()
    {
        return $this->editParentCategory;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned()
    {
        return $this->unassigned;
    }

    /**
     * Set ParentCategory_ID.
     *
     * @param int
     * @return $this
     */
    public function setParentCategoryId($parentCategoryId)
    {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    /**
     * Set ParentCategory_Code.
     *
     * @param string
     * @return $this
     */
    public function setParentCategoryCode($parentCategoryCode)
    {
        $this->parentCategoryCode = $parentCategoryCode;

        return $this;
    }

    /**
     * Set Edit_ParentCategory.
     *
     * @param string
     * @return $this
     */
    public function setEditParentCategory($editParentCategory)
    {
        $this->editParentCategory = $editParentCategory;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param bool
     * @return $this
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * Set Unassigned.
     *
     * @param bool
     * @return $this
     */
    public function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ChildCategoryListLoadQuery($this, $httpResponse, $data);
    }
}
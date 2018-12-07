<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;

/**
 * Handles API Request Category_Delete.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/category_delete
 */
class CategoryDelete extends Request
{
    /** @var string The API function name */
    protected $function = 'Category_Delete';

    /** @var int */
    protected $categoryId;

    /** @var string */
    protected $editCategory;

    /** @var string */
    protected $categoryCode;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Category
     */
    public function __construct(Category $category = null)
    {
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
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Get Edit_Category.
     *
     * @return string
     */
    public function getEditCategory()
    {
        return $this->editCategory;
    }

    /**
     * Get Category_Code.
     *
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }

    /**
     * Set Category_ID.
     *
     * @param int
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Set Edit_Category.
     *
     * @param string
     * @return $this
     */
    public function setEditCategory($editCategory)
    {
        $this->editCategory = $editCategory;

        return $this;
    }

    /**
     * Set Category_Code.
     *
     * @param string
     * @return $this
     */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        if ($this->getCategoryId()) {
            $data['Category_ID'] = $this->getCategoryId();
        } else if ($this->getEditCategory()) {
            $data['Edit_Category'] = $this->getEditCategory();
        } else if ($this->getCategoryCode()) {
            $data['Category_Code'] = $this->getCategoryCode();
        }

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryDelete($this, $httpResponse, $data);
    }
}
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

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CategoryURI_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categoryuri_insert
 */
class CategoryURIInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CategoryURI_Insert';

    /** @var string */
    protected $uRI;

    /** @var int */
    protected $status;

    /** @var bool */
    protected $canonical;

    /** @var int */
    protected $categoryId;

    /** @var string */
    protected $categoryCode;

    /** @var string */
    protected $editCategory;

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
                $this->setCategoryId($category->getId());
            } else if ($category->getCode()) {
                $this->setCategoryCode($category->getCode());
            }
        }
    }

    /**
     * Get URI.
     *
     * @return string
     */
    public function getURI()
    {
        return $this->uRI;
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get Canonical.
     *
     * @return bool
     */
    public function getCanonical()
    {
        return $this->canonical;
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
     * Get Category_Code.
     *
     * @return string
     */
    public function getCategoryCode()
    {
        return $this->categoryCode;
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
     * Set URI.
     *
     * @param string
     * @return $this
     */
    public function setURI($uRI)
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * Set Status.
     *
     * @param int
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set Canonical.
     *
     * @param bool
     * @return $this
     */
    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;

        return $this;
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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getCategoryId()) {
            $data['Category_ID'] = $this->getCategoryId();
        } else if ($this->getCategoryCode()) {
            $data['Category_Code'] = $this->getCategoryCode();
        } else if ($this->getEditCategory()) {
            $data['Edit_Category'] = $this->getEditCategory();
        }

        if (!is_null($this->getURI())) {
            $data['URI'] = $this->getURI();
        }

        if (!is_null($this->getStatus())) {
            $data['Status'] = $this->getStatus();
        }

        if (!is_null($this->getCanonical())) {
            $data['Canonical'] = $this->getCanonical();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryURIInsert($this, $httpResponse, $data);
    }
}
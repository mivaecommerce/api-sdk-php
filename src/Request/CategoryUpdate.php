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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Category;
use MerchantAPI\BaseClient;

/**
 * Handles API Request Category_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/category_update
 */
class CategoryUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Category_Update';

    /** @var int */
    protected $categoryId;

    /** @var string */
    protected $categoryCode;

    /** @var string */
    protected $editCategory;

    /** @var string */
    protected $categoryName;

    /** @var string */
    protected $categoryPageTitle;

    /** @var bool */
    protected $categoryActive;

    /** @var string */
    protected $categoryParentCategory;

    /** @var string */
    protected $categoryAlternateDisplayPage;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Category
     */
    public function __construct(BaseClient $client = null, Category $category = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($category) {
            if ($category->getId()) {
                $this->setCategoryId($category->getId());
            } else if ($category->getCode()) {
                $this->setEditCategory($category->getCode());
            }

            $this->setCategoryCode($category->getCode());
            $this->setCategoryName($category->getName());
            $this->setCategoryPageTitle($category->getPageTitle());
            $this->setCategoryActive($category->getActive());
            $this->setCategoryParentCategory($category->getParentCategory());
            $this->setCategoryAlternateDisplayPage($category->getPageCode());

            if ($category->getCustomFieldValues()) {
                $this->setCustomFieldValues(clone $category->getCustomFieldValues());
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
     * Get Category_Name.
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Get Category_Page_Title.
     *
     * @return string
     */
    public function getCategoryPageTitle()
    {
        return $this->categoryPageTitle;
    }

    /**
     * Get Category_Active.
     *
     * @return bool
     */
    public function getCategoryActive()
    {
        return $this->categoryActive;
    }

    /**
     * Get Category_Parent_Category.
     *
     * @return string
     */
    public function getCategoryParentCategory()
    {
        return $this->categoryParentCategory;
    }

    /**
     * Get Category_Alternate_Display_Page.
     *
     * @return string
     */
    public function getCategoryAlternateDisplayPage()
    {
        return $this->categoryAlternateDisplayPage;
    }

    /**
     * Get CustomField_Values.
     *
     * @return CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->customFieldValues;
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
     * Set Category_Name.
     *
     * @param string
     * @return $this
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Set Category_Page_Title.
     *
     * @param string
     * @return $this
     */
    public function setCategoryPageTitle($categoryPageTitle)
    {
        $this->categoryPageTitle = $categoryPageTitle;

        return $this;
    }

    /**
     * Set Category_Active.
     *
     * @param bool
     * @return $this
     */
    public function setCategoryActive($categoryActive)
    {
        $this->categoryActive = $categoryActive;

        return $this;
    }

    /**
     * Set Category_Parent_Category.
     *
     * @param string
     * @return $this
     */
    public function setCategoryParentCategory($categoryParentCategory)
    {
        $this->categoryParentCategory = $categoryParentCategory;

        return $this;
    }

    /**
     * Set Category_Alternate_Display_Page.
     *
     * @param string
     * @return $this
     */
    public function setCategoryAlternateDisplayPage($categoryAlternateDisplayPage)
    {
        $this->categoryAlternateDisplayPage = $categoryAlternateDisplayPage;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|null
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues)
    {
        if (is_array($customFieldValues)) {
            $customFieldValues = new CustomFieldValues($customFieldValues);
        } else if (!$customFieldValues instanceof CustomFieldValues) {
            throw new \InvalidArgumentException(sprintf('Expected instance of CustomFieldValues or an array but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }

        $this->customFieldValues = $customFieldValues;

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
        } else if ($this->getEditCategory()) {
            $data['Edit_Category'] = $this->getEditCategory();
        }

        if (!is_null($this->getCategoryCode())) {
            $data['Category_Code'] = $this->getCategoryCode();
        }

        if (!is_null($this->getCategoryName())) {
            $data['Category_Name'] = $this->getCategoryName();
        }

        if (!is_null($this->getCategoryPageTitle())) {
            $data['Category_Page_Title'] = $this->getCategoryPageTitle();
        }

        if (!is_null($this->getCategoryActive())) {
            $data['Category_Active'] = $this->getCategoryActive();
        }

        if (!is_null($this->getCategoryParentCategory())) {
            $data['Category_Parent_Category'] = $this->getCategoryParentCategory();
        }

        if (!is_null($this->getCategoryAlternateDisplayPage())) {
            $data['Category_Alternate_Display_Page'] = $this->getCategoryAlternateDisplayPage();
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryUpdate($this, $httpResponse, $data);
    }
}
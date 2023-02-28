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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Category_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/category_insert
 */
class CategoryInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Category_Insert';

    /** @var ?string */
    protected ?string $categoryCode = null;

    /** @var ?string */
    protected ?string $categoryName = null;

    /** @var ?bool */
    protected ?bool $categoryActive = null;

    /** @var ?string */
    protected ?string $categoryPageTitle = null;

    /** @var ?string */
    protected ?string $categoryParentCategory = null;

    /** @var ?string */
    protected ?string $categoryAlternateDisplayPage = null;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Category $category
     */
    public function __construct(?BaseClient $client = null, ?Category $category = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($category) {
            $this->setCategoryCode($category->getCode());
            $this->setCategoryName($category->getName());
            $this->setCategoryActive($category->getActive());
            $this->setCategoryPageTitle($category->getPageTitle());
            $this->setCategoryParentCategory($category->getParentCategory());
            $this->setCategoryAlternateDisplayPage($category->getPageCode());

            if ($category->getCustomFieldValues()) {
                $this->setCustomFieldValues(clone $category->getCustomFieldValues());
            }
        }
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
     * Get Category_Name.
     *
     * @return string
     */
    public function getCategoryName() : ?string
    {
        return $this->categoryName;
    }

    /**
     * Get Category_Active.
     *
     * @return bool
     */
    public function getCategoryActive() : ?bool
    {
        return $this->categoryActive;
    }

    /**
     * Get Category_Page_Title.
     *
     * @return string
     */
    public function getCategoryPageTitle() : ?string
    {
        return $this->categoryPageTitle;
    }

    /**
     * Get Category_Parent_Category.
     *
     * @return string
     */
    public function getCategoryParentCategory() : ?string
    {
        return $this->categoryParentCategory;
    }

    /**
     * Get Category_Alternate_Display_Page.
     *
     * @return string
     */
    public function getCategoryAlternateDisplayPage() : ?string
    {
        return $this->categoryAlternateDisplayPage;
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->customFieldValues;
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
     * Set Category_Name.
     *
     * @param ?string $categoryName
     * @return $this
     */
    public function setCategoryName(?string $categoryName) : self
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Set Category_Active.
     *
     * @param ?bool $categoryActive
     * @return $this
     */
    public function setCategoryActive(?bool $categoryActive) : self
    {
        $this->categoryActive = $categoryActive;

        return $this;
    }

    /**
     * Set Category_Page_Title.
     *
     * @param ?string $categoryPageTitle
     * @return $this
     */
    public function setCategoryPageTitle(?string $categoryPageTitle) : self
    {
        $this->categoryPageTitle = $categoryPageTitle;

        return $this;
    }

    /**
     * Set Category_Parent_Category.
     *
     * @param ?string $categoryParentCategory
     * @return $this
     */
    public function setCategoryParentCategory(?string $categoryParentCategory) : self
    {
        $this->categoryParentCategory = $categoryParentCategory;

        return $this;
    }

    /**
     * Set Category_Alternate_Display_Page.
     *
     * @param ?string $categoryAlternateDisplayPage
     * @return $this
     */
    public function setCategoryAlternateDisplayPage(?string $categoryAlternateDisplayPage) : self
    {
        $this->categoryAlternateDisplayPage = $categoryAlternateDisplayPage;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|array $customFieldValues
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues) : self
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
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Category_Code'] = $this->getCategoryCode();

        $data['Category_Name'] = $this->getCategoryName();

        if (!is_null($this->getCategoryActive())) {
            $data['Category_Active'] = $this->getCategoryActive();
        }

        if (!is_null($this->getCategoryPageTitle())) {
            $data['Category_Page_Title'] = $this->getCategoryPageTitle();
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CategoryInsert($this, $httpResponse, $data);
    }
}
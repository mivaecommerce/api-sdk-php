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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PriceGroupExcludedCategory_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupexcludedcategory_update_assigned
 */
class PriceGroupExcludedCategoryUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroupExcludedCategory_Update_Assigned';

    /** @var ?int */
    protected ?int $categoryId = null;

    /** @var ?string */
    protected ?string $editCategory = null;

    /** @var ?string */
    protected ?string $categoryCode = null;

    /** @var ?int */
    protected ?int $priceGroupId = null;

    /** @var ?string */
    protected ?string $editPriceGroup = null;

    /** @var ?string */
    protected ?string $priceGroupName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PriceGroup $priceGroup
     */
    public function __construct(?BaseClient $client = null, ?PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setCategoryId($priceGroup->getId());
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
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId() : ?int
    {
        return $this->priceGroupId;
    }

    /**
     * Get Edit_PriceGroup.
     *
     * @return string
     */
    public function getEditPriceGroup() : ?string
    {
        return $this->editPriceGroup;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName() : ?string
    {
        return $this->priceGroupName;
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
     * Set PriceGroup_ID.
     *
     * @param ?int $priceGroupId
     * @return $this
     */
    public function setPriceGroupId(?int $priceGroupId) : self
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set Edit_PriceGroup.
     *
     * @param ?string $editPriceGroup
     * @return $this
     */
    public function setEditPriceGroup(?string $editPriceGroup) : self
    {
        $this->editPriceGroup = $editPriceGroup;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param ?string $priceGroupName
     * @return $this
     */
    public function setPriceGroupName(?string $priceGroupName) : self
    {
        $this->priceGroupName = $priceGroupName;

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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getEditPriceGroup()) {
            $data['Edit_PriceGroup'] = $this->getEditPriceGroup();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        if ($this->getCategoryId()) {
            $data['Category_ID'] = $this->getCategoryId();
        } else if ($this->getEditCategory()) {
            $data['Edit_Category'] = $this->getEditCategory();
        } else if ($this->getCategoryCode()) {
            $data['Category_Code'] = $this->getCategoryCode();
        }

        $data['PriceGroup_Name'] = $this->getPriceGroupName();

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PriceGroupExcludedCategoryUpdateAssigned($this, $httpResponse, $data);
    }
}
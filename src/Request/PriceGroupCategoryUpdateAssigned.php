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

/**
 * Handles API Request PriceGroupCategory_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupcategory_update_assigned
 */
class PriceGroupCategoryUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PriceGroupCategory_Update_Assigned';

    /** @var int */
    protected $categoryId;

    /** @var string */
    protected $editCategory;

    /** @var string */
    protected $categoryCode;

    /** @var int */
    protected $priceGroupId;

    /** @var string */
    protected $editPriceGroup;

    /** @var string */
    protected $priceGroupName;

    /** @var bool */
    protected $assigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\PriceGroup
     */
    public function __construct(BaseClient $client = null, PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setPriceGroupId($priceGroup->getId());
            } else if ($priceGroup->getName()) {
                $this->setEditPriceGroup($priceGroup->getName());
            } else if ($priceGroup->getName()) {
                $this->setPriceGroupName($priceGroup->getName());
            }

            $this->setPriceGroupName($priceGroup->getName());
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
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId()
    {
        return $this->priceGroupId;
    }

    /**
     * Get Edit_PriceGroup.
     *
     * @return string
     */
    public function getEditPriceGroup()
    {
        return $this->editPriceGroup;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName()
    {
        return $this->priceGroupName;
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
     * Set PriceGroup_ID.
     *
     * @param int
     * @return $this
     */
    public function setPriceGroupId($priceGroupId)
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set Edit_PriceGroup.
     *
     * @param string
     * @return $this
     */
    public function setEditPriceGroup($editPriceGroup)
    {
        $this->editPriceGroup = $editPriceGroup;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param string
     * @return $this
     */
    public function setPriceGroupName($priceGroupName)
    {
        $this->priceGroupName = $priceGroupName;

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
     * @inheritDoc
     */
    public function toArray()
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

        $data['Assigned'] = $this->getAssigned();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PriceGroupCategoryUpdateAssigned($this, $httpResponse, $data);
    }
}
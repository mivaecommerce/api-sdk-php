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
use MerchantAPI\BaseClient;

/**
 * Handles API Request PriceGroup_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroup_insert
 */
class PriceGroupInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PriceGroup_Insert';

    /** @var string */
    protected $name;

    /** @var string */
    protected $customerScope;

    /** @var string */
    protected $rate;

    /** @var float */
    protected $discount;

    /** @var float */
    protected $markup;

    /** @var int */
    protected $moduleId;

    /** @var string */
    protected $editModule;

    /** @var string */
    protected $moduleCode;

    /** @var bool */
    protected $exclusion;

    /** @var string */
    protected $description;

    /** @var bool */
    protected $display;

    /** @var int */
    protected $dateTimeStart;

    /** @var int */
    protected $dateTimeEnd;

    /** @var float */
    protected $qualifyingMinSubtotal;

    /** @var float */
    protected $qualifyingMaxSubtotal;

    /** @var int */
    protected $qualifyingMinQuantity;

    /** @var int */
    protected $qualifyingMaxQuantity;

    /** @var float */
    protected $qualifyingMinWeight;

    /** @var float */
    protected $qualifyingMaxWeight;

    /** @var float */
    protected $basketMinSubtotal;

    /** @var float */
    protected $basketMaxSubtotal;

    /** @var int */
    protected $basketMinQuantity;

    /** @var int */
    protected $basketMaxQuantity;

    /** @var float */
    protected $basketMinWeight;

    /** @var float */
    protected $basketMaxWeight;

    /** @var int */
    protected $priority;

    /** @var array */
    protected $moduleFields = [];

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get CustomerScope.
     *
     * @return string
     */
    public function getCustomerScope()
    {
        return $this->customerScope;
    }

    /**
     * Get Rate.
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get Discount.
     *
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Get Markup.
     *
     * @return float
     */
    public function getMarkup()
    {
        return $this->markup;
    }

    /**
     * Get Module_ID.
     *
     * @return int
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * Get Edit_Module.
     *
     * @return string
     */
    public function getEditModule()
    {
        return $this->editModule;
    }

    /**
     * Get Module_Code.
     *
     * @return string
     */
    public function getModuleCode()
    {
        return $this->moduleCode;
    }

    /**
     * Get Exclusion.
     *
     * @return bool
     */
    public function getExclusion()
    {
        return $this->exclusion;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get Display.
     *
     * @return bool
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Get DateTime_Start.
     *
     * @return int
     */
    public function getDateTimeStart()
    {
        return $this->dateTimeStart;
    }

    /**
     * Get DateTime_End.
     *
     * @return int
     */
    public function getDateTimeEnd()
    {
        return $this->dateTimeEnd;
    }

    /**
     * Get Qualifying_Min_Subtotal.
     *
     * @return float
     */
    public function getQualifyingMinSubtotal()
    {
        return $this->qualifyingMinSubtotal;
    }

    /**
     * Get Qualifying_Max_Subtotal.
     *
     * @return float
     */
    public function getQualifyingMaxSubtotal()
    {
        return $this->qualifyingMaxSubtotal;
    }

    /**
     * Get Qualifying_Min_Quantity.
     *
     * @return int
     */
    public function getQualifyingMinQuantity()
    {
        return $this->qualifyingMinQuantity;
    }

    /**
     * Get Qualifying_Max_Quantity.
     *
     * @return int
     */
    public function getQualifyingMaxQuantity()
    {
        return $this->qualifyingMaxQuantity;
    }

    /**
     * Get Qualifying_Min_Weight.
     *
     * @return float
     */
    public function getQualifyingMinWeight()
    {
        return $this->qualifyingMinWeight;
    }

    /**
     * Get Qualifying_Max_Weight.
     *
     * @return float
     */
    public function getQualifyingMaxWeight()
    {
        return $this->qualifyingMaxWeight;
    }

    /**
     * Get Basket_Min_Subtotal.
     *
     * @return float
     */
    public function getBasketMinSubtotal()
    {
        return $this->basketMinSubtotal;
    }

    /**
     * Get Basket_Max_Subtotal.
     *
     * @return float
     */
    public function getBasketMaxSubtotal()
    {
        return $this->basketMaxSubtotal;
    }

    /**
     * Get Basket_Min_Quantity.
     *
     * @return int
     */
    public function getBasketMinQuantity()
    {
        return $this->basketMinQuantity;
    }

    /**
     * Get Basket_Max_Quantity.
     *
     * @return int
     */
    public function getBasketMaxQuantity()
    {
        return $this->basketMaxQuantity;
    }

    /**
     * Get Basket_Min_Weight.
     *
     * @return float
     */
    public function getBasketMinWeight()
    {
        return $this->basketMinWeight;
    }

    /**
     * Get Basket_Max_Weight.
     *
     * @return float
     */
    public function getBasketMaxWeight()
    {
        return $this->basketMaxWeight;
    }

    /**
     * Get Priority.
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields()
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     *
     * @param string
     * @param mixed
     */
    public function getModuleField($field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
    }

    /**
     * Set Name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set CustomerScope.
     *
     * @param string
     * @return $this
     */
    public function setCustomerScope($customerScope)
    {
        $this->customerScope = $customerScope;

        return $this;
    }

    /**
     * Set Rate.
     *
     * @param string
     * @return $this
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Set Discount.
     *
     * @param float
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Set Markup.
     *
     * @param float
     * @return $this
     */
    public function setMarkup($markup)
    {
        $this->markup = $markup;

        return $this;
    }

    /**
     * Set Module_ID.
     *
     * @param int
     * @return $this
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Set Edit_Module.
     *
     * @param string
     * @return $this
     */
    public function setEditModule($editModule)
    {
        $this->editModule = $editModule;

        return $this;
    }

    /**
     * Set Module_Code.
     *
     * @param string
     * @return $this
     */
    public function setModuleCode($moduleCode)
    {
        $this->moduleCode = $moduleCode;

        return $this;
    }

    /**
     * Set Exclusion.
     *
     * @param bool
     * @return $this
     */
    public function setExclusion($exclusion)
    {
        $this->exclusion = $exclusion;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set Display.
     *
     * @param bool
     * @return $this
     */
    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * Set DateTime_Start.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeStart($dateTimeStart)
    {
        if ($dateTimeStart instanceof \DateTime) {
            $this->dateTimeStart = $dateTimeStart->getTimestamp();
        } else {
            $this->dateTimeStart = $dateTimeStart;
        }

        return $this;
    }

    /**
     * Set DateTime_End.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeEnd($dateTimeEnd)
    {
        if ($dateTimeEnd instanceof \DateTime) {
            $this->dateTimeEnd = $dateTimeEnd->getTimestamp();
        } else {
            $this->dateTimeEnd = $dateTimeEnd;
        }

        return $this;
    }

    /**
     * Set Qualifying_Min_Subtotal.
     *
     * @param float
     * @return $this
     */
    public function setQualifyingMinSubtotal($qualifyingMinSubtotal)
    {
        $this->qualifyingMinSubtotal = $qualifyingMinSubtotal;

        return $this;
    }

    /**
     * Set Qualifying_Max_Subtotal.
     *
     * @param float
     * @return $this
     */
    public function setQualifyingMaxSubtotal($qualifyingMaxSubtotal)
    {
        $this->qualifyingMaxSubtotal = $qualifyingMaxSubtotal;

        return $this;
    }

    /**
     * Set Qualifying_Min_Quantity.
     *
     * @param int
     * @return $this
     */
    public function setQualifyingMinQuantity($qualifyingMinQuantity)
    {
        $this->qualifyingMinQuantity = $qualifyingMinQuantity;

        return $this;
    }

    /**
     * Set Qualifying_Max_Quantity.
     *
     * @param int
     * @return $this
     */
    public function setQualifyingMaxQuantity($qualifyingMaxQuantity)
    {
        $this->qualifyingMaxQuantity = $qualifyingMaxQuantity;

        return $this;
    }

    /**
     * Set Qualifying_Min_Weight.
     *
     * @param float
     * @return $this
     */
    public function setQualifyingMinWeight($qualifyingMinWeight)
    {
        $this->qualifyingMinWeight = $qualifyingMinWeight;

        return $this;
    }

    /**
     * Set Qualifying_Max_Weight.
     *
     * @param float
     * @return $this
     */
    public function setQualifyingMaxWeight($qualifyingMaxWeight)
    {
        $this->qualifyingMaxWeight = $qualifyingMaxWeight;

        return $this;
    }

    /**
     * Set Basket_Min_Subtotal.
     *
     * @param float
     * @return $this
     */
    public function setBasketMinSubtotal($basketMinSubtotal)
    {
        $this->basketMinSubtotal = $basketMinSubtotal;

        return $this;
    }

    /**
     * Set Basket_Max_Subtotal.
     *
     * @param float
     * @return $this
     */
    public function setBasketMaxSubtotal($basketMaxSubtotal)
    {
        $this->basketMaxSubtotal = $basketMaxSubtotal;

        return $this;
    }

    /**
     * Set Basket_Min_Quantity.
     *
     * @param int
     * @return $this
     */
    public function setBasketMinQuantity($basketMinQuantity)
    {
        $this->basketMinQuantity = $basketMinQuantity;

        return $this;
    }

    /**
     * Set Basket_Max_Quantity.
     *
     * @param int
     * @return $this
     */
    public function setBasketMaxQuantity($basketMaxQuantity)
    {
        $this->basketMaxQuantity = $basketMaxQuantity;

        return $this;
    }

    /**
     * Set Basket_Min_Weight.
     *
     * @param float
     * @return $this
     */
    public function setBasketMinWeight($basketMinWeight)
    {
        $this->basketMinWeight = $basketMinWeight;

        return $this;
    }

    /**
     * Set Basket_Max_Weight.
     *
     * @param float
     * @return $this
     */
    public function setBasketMaxWeight($basketMaxWeight)
    {
        $this->basketMaxWeight = $basketMaxWeight;

        return $this;
    }

    /**
     * Set Priority.
     *
     * @param int
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array
     * @return $this
     */
    public function setModuleFields(array $moduleFields)
    {
        $this->moduleFields = $moduleFields;

        return $this;
    }

    /**
     * Add custom data to the request.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setModuleField($field, $value)
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = array_merge(parent::toArray(), $this->getModuleFields());

        if ($this->getModuleId()) {
            $data['Module_ID'] = $this->getModuleId();
        } else if ($this->getEditModule()) {
            $data['Edit_Module'] = $this->getEditModule();
        } else if ($this->getModuleCode()) {
            $data['Module_Code'] = $this->getModuleCode();
        }

        if (!is_null($this->getName())) {
            $data['Name'] = $this->getName();
        }

        if (!is_null($this->getCustomerScope())) {
            $data['CustomerScope'] = $this->getCustomerScope();
        }

        if (!is_null($this->getRate())) {
            $data['Rate'] = $this->getRate();
        }

        if (!is_null($this->getDiscount())) {
            $data['Discount'] = $this->getDiscount();
        }

        if (!is_null($this->getMarkup())) {
            $data['Markup'] = $this->getMarkup();
        }

        if (!is_null($this->getExclusion())) {
            $data['Exclusion'] = $this->getExclusion();
        }

        if (!is_null($this->getDescription())) {
            $data['Description'] = $this->getDescription();
        }

        if (!is_null($this->getDisplay())) {
            $data['Display'] = $this->getDisplay();
        }

        if (!is_null($this->getDateTimeStart())) {
            $data['DateTime_Start'] = $this->getDateTimeStart();
        }

        if (!is_null($this->getDateTimeEnd())) {
            $data['DateTime_End'] = $this->getDateTimeEnd();
        }

        if (!is_null($this->getQualifyingMinSubtotal())) {
            $data['Qualifying_Min_Subtotal'] = $this->getQualifyingMinSubtotal();
        }

        if (!is_null($this->getQualifyingMaxSubtotal())) {
            $data['Qualifying_Max_Subtotal'] = $this->getQualifyingMaxSubtotal();
        }

        if (!is_null($this->getQualifyingMinQuantity())) {
            $data['Qualifying_Min_Quantity'] = $this->getQualifyingMinQuantity();
        }

        if (!is_null($this->getQualifyingMaxQuantity())) {
            $data['Qualifying_Max_Quantity'] = $this->getQualifyingMaxQuantity();
        }

        if (!is_null($this->getQualifyingMinWeight())) {
            $data['Qualifying_Min_Weight'] = $this->getQualifyingMinWeight();
        }

        if (!is_null($this->getQualifyingMaxWeight())) {
            $data['Qualifying_Max_Weight'] = $this->getQualifyingMaxWeight();
        }

        if (!is_null($this->getBasketMinSubtotal())) {
            $data['Basket_Min_Subtotal'] = $this->getBasketMinSubtotal();
        }

        if (!is_null($this->getBasketMaxSubtotal())) {
            $data['Basket_Max_Subtotal'] = $this->getBasketMaxSubtotal();
        }

        if (!is_null($this->getBasketMinQuantity())) {
            $data['Basket_Min_Quantity'] = $this->getBasketMinQuantity();
        }

        if (!is_null($this->getBasketMaxQuantity())) {
            $data['Basket_Max_Quantity'] = $this->getBasketMaxQuantity();
        }

        if (!is_null($this->getBasketMinWeight())) {
            $data['Basket_Min_Weight'] = $this->getBasketMinWeight();
        }

        if (!is_null($this->getBasketMaxWeight())) {
            $data['Basket_Max_Weight'] = $this->getBasketMaxWeight();
        }

        if (!is_null($this->getPriority())) {
            $data['Priority'] = $this->getPriority();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PriceGroupInsert($this, $httpResponse, $data);
    }
}
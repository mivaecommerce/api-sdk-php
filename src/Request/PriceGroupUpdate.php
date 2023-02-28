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
use MerchantAPI\Model\PriceGroupExclusion;
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request PriceGroup_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroup_update
 */
class PriceGroupUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroup_Update';

    /** @var ?int */
    protected ?int $priceGroupId = null;

    /** @var ?string */
    protected ?string $editPriceGroup = null;

    /** @var ?string */
    protected ?string $priceGroupName = null;

    /** @var ?string */
    protected ?string $name = null;

    /** @var ?string */
    protected ?string $customerScope = null;

    /** @var ?string */
    protected ?string $rate = null;

    /** @var ?float */
    protected ?float $discount = null;

    /** @var ?float */
    protected ?float $markup = null;

    /** @var ?int */
    protected ?int $moduleId = null;

    /** @var ?bool */
    protected ?bool $exclusion = null;

    /** @var ?string */
    protected ?string $description = null;

    /** @var ?bool */
    protected ?bool $display = null;

    /** @var int|\DateTime|null */
    protected $dateTimeStart = null;

    /** @var int|\DateTime|null */
    protected $dateTimeEnd = null;

    /** @var ?float */
    protected ?float $qualifyingMinSubtotal = null;

    /** @var ?float */
    protected ?float $qualifyingMaxSubtotal = null;

    /** @var ?int */
    protected ?int $qualifyingMinQuantity = null;

    /** @var ?int */
    protected ?int $qualifyingMaxQuantity = null;

    /** @var ?float */
    protected ?float $qualifyingMinWeight = null;

    /** @var ?float */
    protected ?float $qualifyingMaxWeight = null;

    /** @var ?float */
    protected ?float $basketMinSubtotal = null;

    /** @var ?float */
    protected ?float $basketMaxSubtotal = null;

    /** @var ?int */
    protected ?int $basketMinQuantity = null;

    /** @var ?int */
    protected ?int $basketMaxQuantity = null;

    /** @var ?float */
    protected ?float $basketMinWeight = null;

    /** @var ?float */
    protected ?float $basketMaxWeight = null;

    /** @var ?int */
    protected ?int $priority = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $exclusions;

    /** @var array */
    protected array $moduleFields = [];

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PriceGroup $priceGroup
     */
    public function __construct(?BaseClient $client = null, ?PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        $this->exclusions = new Collection();

        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setPriceGroupId($priceGroup->getId());
            }

            $this->setPriceGroupName($priceGroup->getName());
            $this->setName($priceGroup->getName());
            $this->setCustomerScope($priceGroup->getCustomerScope());
            $this->setRate($priceGroup->getRate());
            $this->setDiscount($priceGroup->getDiscount());
            $this->setMarkup($priceGroup->getMarkup());
            $this->setExclusion($priceGroup->getExclusion());
            $this->setDescription($priceGroup->getDescription());
            $this->setDisplay($priceGroup->getDisplay());
            $this->setDateTimeStart($priceGroup->getDateTimeStart());
            $this->setDateTimeEnd($priceGroup->getDateTimeEnd());
            $this->setQualifyingMinSubtotal($priceGroup->getMinimumSubtotal());
            $this->setQualifyingMaxSubtotal($priceGroup->getMaximumSubtotal());
            $this->setQualifyingMinQuantity($priceGroup->getMinimumQuantity());
            $this->setQualifyingMaxQuantity($priceGroup->getMaximumQuantity());
            $this->setQualifyingMinWeight($priceGroup->getMinimumWeight());
            $this->setQualifyingMaxWeight($priceGroup->getMaximumWeight());
            $this->setBasketMinSubtotal($priceGroup->getBasketMinimumSubtotal());
            $this->setBasketMaxSubtotal($priceGroup->getBasketMaximumSubtotal());
            $this->setBasketMinQuantity($priceGroup->getBasketMinimumQuantity());
            $this->setBasketMaxQuantity($priceGroup->getBasketMaximumQuantity());
            $this->setBasketMinWeight($priceGroup->getBasketMinimumWeight());
            $this->setBasketMaxWeight($priceGroup->getBasketMaximumWeight());
            $this->setPriority($priceGroup->getPriority());
        }
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
     * Get Name.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Get CustomerScope.
     *
     * @return string
     */
    public function getCustomerScope() : ?string
    {
        return $this->customerScope;
    }

    /**
     * Get Rate.
     *
     * @return string
     */
    public function getRate() : ?string
    {
        return $this->rate;
    }

    /**
     * Get Discount.
     *
     * @return float
     */
    public function getDiscount() : ?float
    {
        return $this->discount;
    }

    /**
     * Get Markup.
     *
     * @return float
     */
    public function getMarkup() : ?float
    {
        return $this->markup;
    }

    /**
     * Get Module_ID.
     *
     * @return int
     */
    public function getModuleId() : ?int
    {
        return $this->moduleId;
    }

    /**
     * Get Exclusion.
     *
     * @return bool
     */
    public function getExclusion() : ?bool
    {
        return $this->exclusion;
    }

    /**
     * Get Description.
     *
     * @return string
     */
    public function getDescription() : ?string
    {
        return $this->description;
    }

    /**
     * Get Display.
     *
     * @return bool
     */
    public function getDisplay() : ?bool
    {
        return $this->display;
    }

    /**
     * Get DateTime_Start.
     *
     * @return int
     */
    public function getDateTimeStart() : ?int
    {
        return $this->dateTimeStart;
    }

    /**
     * Get DateTime_End.
     *
     * @return int
     */
    public function getDateTimeEnd() : ?int
    {
        return $this->dateTimeEnd;
    }

    /**
     * Get Qualifying_Min_Subtotal.
     *
     * @return float
     */
    public function getQualifyingMinSubtotal() : ?float
    {
        return $this->qualifyingMinSubtotal;
    }

    /**
     * Get Qualifying_Max_Subtotal.
     *
     * @return float
     */
    public function getQualifyingMaxSubtotal() : ?float
    {
        return $this->qualifyingMaxSubtotal;
    }

    /**
     * Get Qualifying_Min_Quantity.
     *
     * @return int
     */
    public function getQualifyingMinQuantity() : ?int
    {
        return $this->qualifyingMinQuantity;
    }

    /**
     * Get Qualifying_Max_Quantity.
     *
     * @return int
     */
    public function getQualifyingMaxQuantity() : ?int
    {
        return $this->qualifyingMaxQuantity;
    }

    /**
     * Get Qualifying_Min_Weight.
     *
     * @return float
     */
    public function getQualifyingMinWeight() : ?float
    {
        return $this->qualifyingMinWeight;
    }

    /**
     * Get Qualifying_Max_Weight.
     *
     * @return float
     */
    public function getQualifyingMaxWeight() : ?float
    {
        return $this->qualifyingMaxWeight;
    }

    /**
     * Get Basket_Min_Subtotal.
     *
     * @return float
     */
    public function getBasketMinSubtotal() : ?float
    {
        return $this->basketMinSubtotal;
    }

    /**
     * Get Basket_Max_Subtotal.
     *
     * @return float
     */
    public function getBasketMaxSubtotal() : ?float
    {
        return $this->basketMaxSubtotal;
    }

    /**
     * Get Basket_Min_Quantity.
     *
     * @return int
     */
    public function getBasketMinQuantity() : ?int
    {
        return $this->basketMinQuantity;
    }

    /**
     * Get Basket_Max_Quantity.
     *
     * @return int
     */
    public function getBasketMaxQuantity() : ?int
    {
        return $this->basketMaxQuantity;
    }

    /**
     * Get Basket_Min_Weight.
     *
     * @return float
     */
    public function getBasketMinWeight() : ?float
    {
        return $this->basketMinWeight;
    }

    /**
     * Get Basket_Max_Weight.
     *
     * @return float
     */
    public function getBasketMaxWeight() : ?float
    {
        return $this->basketMaxWeight;
    }

    /**
     * Get Priority.
     *
     * @return int
     */
    public function getPriority() : ?int
    {
        return $this->priority;
    }

    /**
     * Get Exclusions.
     *
     * @return \MerchantAPI\Collection
     */
    public function getExclusions() : ?Collection
    {
        return $this->exclusions;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields() : ?array
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     *
     * @param string
     * @param mixed
     */
    public function getModuleField(string $field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
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
     * Set Name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set CustomerScope.
     *
     * @param ?string $customerScope
     * @return $this
     */
    public function setCustomerScope(?string $customerScope) : self
    {
        $this->customerScope = $customerScope;

        return $this;
    }

    /**
     * Set Rate.
     *
     * @param ?string $rate
     * @return $this
     */
    public function setRate(?string $rate) : self
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Set Discount.
     *
     * @param ?float $discount
     * @return $this
     */
    public function setDiscount(?float $discount) : self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Set Markup.
     *
     * @param ?float $markup
     * @return $this
     */
    public function setMarkup(?float $markup) : self
    {
        $this->markup = $markup;

        return $this;
    }

    /**
     * Set Module_ID.
     *
     * @param ?int $moduleId
     * @return $this
     */
    public function setModuleId(?int $moduleId) : self
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Set Exclusion.
     *
     * @param ?bool $exclusion
     * @return $this
     */
    public function setExclusion(?bool $exclusion) : self
    {
        $this->exclusion = $exclusion;

        return $this;
    }

    /**
     * Set Description.
     *
     * @param ?string $description
     * @return $this
     */
    public function setDescription(?string $description) : self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set Display.
     *
     * @param ?bool $display
     * @return $this
     */
    public function setDisplay(?bool $display) : self
    {
        $this->display = $display;

        return $this;
    }

    /**
     * Set DateTime_Start.
     *
     * @param ?int|?\DateTime $dateTimeStart
     * @return $this
     */
    public function setDateTimeStart($dateTimeStart) : self
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
     * @param ?int|?\DateTime $dateTimeEnd
     * @return $this
     */
    public function setDateTimeEnd($dateTimeEnd) : self
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
     * @param ?float $qualifyingMinSubtotal
     * @return $this
     */
    public function setQualifyingMinSubtotal(?float $qualifyingMinSubtotal) : self
    {
        $this->qualifyingMinSubtotal = $qualifyingMinSubtotal;

        return $this;
    }

    /**
     * Set Qualifying_Max_Subtotal.
     *
     * @param ?float $qualifyingMaxSubtotal
     * @return $this
     */
    public function setQualifyingMaxSubtotal(?float $qualifyingMaxSubtotal) : self
    {
        $this->qualifyingMaxSubtotal = $qualifyingMaxSubtotal;

        return $this;
    }

    /**
     * Set Qualifying_Min_Quantity.
     *
     * @param ?int $qualifyingMinQuantity
     * @return $this
     */
    public function setQualifyingMinQuantity(?int $qualifyingMinQuantity) : self
    {
        $this->qualifyingMinQuantity = $qualifyingMinQuantity;

        return $this;
    }

    /**
     * Set Qualifying_Max_Quantity.
     *
     * @param ?int $qualifyingMaxQuantity
     * @return $this
     */
    public function setQualifyingMaxQuantity(?int $qualifyingMaxQuantity) : self
    {
        $this->qualifyingMaxQuantity = $qualifyingMaxQuantity;

        return $this;
    }

    /**
     * Set Qualifying_Min_Weight.
     *
     * @param ?float $qualifyingMinWeight
     * @return $this
     */
    public function setQualifyingMinWeight(?float $qualifyingMinWeight) : self
    {
        $this->qualifyingMinWeight = $qualifyingMinWeight;

        return $this;
    }

    /**
     * Set Qualifying_Max_Weight.
     *
     * @param ?float $qualifyingMaxWeight
     * @return $this
     */
    public function setQualifyingMaxWeight(?float $qualifyingMaxWeight) : self
    {
        $this->qualifyingMaxWeight = $qualifyingMaxWeight;

        return $this;
    }

    /**
     * Set Basket_Min_Subtotal.
     *
     * @param ?float $basketMinSubtotal
     * @return $this
     */
    public function setBasketMinSubtotal(?float $basketMinSubtotal) : self
    {
        $this->basketMinSubtotal = $basketMinSubtotal;

        return $this;
    }

    /**
     * Set Basket_Max_Subtotal.
     *
     * @param ?float $basketMaxSubtotal
     * @return $this
     */
    public function setBasketMaxSubtotal(?float $basketMaxSubtotal) : self
    {
        $this->basketMaxSubtotal = $basketMaxSubtotal;

        return $this;
    }

    /**
     * Set Basket_Min_Quantity.
     *
     * @param ?int $basketMinQuantity
     * @return $this
     */
    public function setBasketMinQuantity(?int $basketMinQuantity) : self
    {
        $this->basketMinQuantity = $basketMinQuantity;

        return $this;
    }

    /**
     * Set Basket_Max_Quantity.
     *
     * @param ?int $basketMaxQuantity
     * @return $this
     */
    public function setBasketMaxQuantity(?int $basketMaxQuantity) : self
    {
        $this->basketMaxQuantity = $basketMaxQuantity;

        return $this;
    }

    /**
     * Set Basket_Min_Weight.
     *
     * @param ?float $basketMinWeight
     * @return $this
     */
    public function setBasketMinWeight(?float $basketMinWeight) : self
    {
        $this->basketMinWeight = $basketMinWeight;

        return $this;
    }

    /**
     * Set Basket_Max_Weight.
     *
     * @param ?float $basketMaxWeight
     * @return $this
     */
    public function setBasketMaxWeight(?float $basketMaxWeight) : self
    {
        $this->basketMaxWeight = $basketMaxWeight;

        return $this;
    }

    /**
     * Set Priority.
     *
     * @param ?int $priority
     * @return $this
     */
    public function setPriority(?int $priority) : self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Set Exclusions.
     *
     * @param \MerchantAPI\Collection|array $exclusions
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setExclusions($exclusions) : self
    {
        if (!is_array($exclusions) && !$exclusions instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($exclusions) ? get_class($exclusions) : gettype($exclusions)));
        }

        foreach ($exclusions as &$model) {
            if (is_array($model)) {
                $model = new PriceGroupExclusion($model);
            } else if (!$model instanceof PriceGroupExclusion) {
                throw new \InvalidArgumentException(sprintf('Expected array of PriceGroupExclusion or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->exclusions = new Collection($exclusions);

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array $moduleFields
     * @return $this
     */
    public function setModuleFields(array $moduleFields) : self
    {
        $this->moduleFields = $moduleFields;

        return $this;
    }

    /**
     * Add Exclusions.
     *
     * @param \MerchantAPI\Model\PriceGroupExclusion
     * @return $this
     */
    public function addPriceGroupExclusion(PriceGroupExclusion $model) : self
    {
        $this->exclusions[] = $model;
        return $this;
    }

    /**
     * Add many PriceGroupExclusion.
     *
     * @param (\MerchantAPI\Model\PriceGroupExclusion|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addExclusions(array $exclusions) : self
    {
        foreach ($exclusions as $e) {
            if (is_array($e)) {
                $this->exclusions[] = new PriceGroupExclusion($e);
            } else if ($e instanceof PriceGroupExclusion) {
                $this->exclusions[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of PriceGroupExclusion or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add custom data to the request.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setModuleField(string $field, $value) : self
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = array_merge(parent::toArray(), $this->getModuleFields());

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getEditPriceGroup()) {
            $data['Edit_PriceGroup'] = $this->getEditPriceGroup();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        $data['PriceGroup_Name'] = $this->getPriceGroupName();

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

        if (!is_null($this->getModuleId())) {
            $data['Module_ID'] = $this->getModuleId();
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

        if (count($this->getExclusions())) {
            $data['Exclusions'] = [];

            foreach ($this->getExclusions() as $i => $priceGroupExclusion) {
                if ($priceGroupExclusion->hasData()) {
                    $data['Exclusions'][] = $priceGroupExclusion->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PriceGroupUpdate($this, $httpResponse, $data);
    }
}
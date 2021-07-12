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
use MerchantAPI\Model\AttributeTemplateOption;
use MerchantAPI\BaseClient;

/**
 * Handles API Request AttributeTemplateOption_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateoption_update
 */
class AttributeTemplateOptionUpdate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AttributeTemplateOption_Update';

    /** @var int */
    protected $attributeTemplateId;

    /** @var string */
    protected $attributeTemplateCode;

    /** @var string */
    protected $editAttributeTemplate;

    /** @var int */
    protected $attributeTemplateAttributeId;

    /** @var string */
    protected $attributeTemplateAttributeCode;

    /** @var string */
    protected $editAttributeTemplateAttribute;

    /** @var int */
    protected $attributeTemplateOptionId;

    /** @var string */
    protected $attributeTemplateOptionCode;

    /** @var string */
    protected $editAttributeTemplateOption;

    /** @var string */
    protected $code;

    /** @var string */
    protected $prompt;

    /** @var string */
    protected $image;

    /** @var float */
    protected $price;

    /** @var float */
    protected $cost;

    /** @var float */
    protected $weight;

    /** @var bool */
    protected $default;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\AttributeTemplateOption
     */
    public function __construct(BaseClient $client = null, AttributeTemplateOption $attributeTemplateOption = null)
    {
        parent::__construct($client);
        if ($attributeTemplateOption) {
            if ($attributeTemplateOption->getId()) {
                $this->setAttributeTemplateOptionId($attributeTemplateOption->getId());
            }
        }
    }

    /**
     * Get AttributeTemplate_ID.
     *
     * @return int
     */
    public function getAttributeTemplateId()
    {
        return $this->attributeTemplateId;
    }

    /**
     * Get AttributeTemplate_Code.
     *
     * @return string
     */
    public function getAttributeTemplateCode()
    {
        return $this->attributeTemplateCode;
    }

    /**
     * Get Edit_AttributeTemplate.
     *
     * @return string
     */
    public function getEditAttributeTemplate()
    {
        return $this->editAttributeTemplate;
    }

    /**
     * Get AttributeTemplateAttribute_ID.
     *
     * @return int
     */
    public function getAttributeTemplateAttributeId()
    {
        return $this->attributeTemplateAttributeId;
    }

    /**
     * Get AttributeTemplateAttribute_Code.
     *
     * @return string
     */
    public function getAttributeTemplateAttributeCode()
    {
        return $this->attributeTemplateAttributeCode;
    }

    /**
     * Get Edit_AttributeTemplateAttribute.
     *
     * @return string
     */
    public function getEditAttributeTemplateAttribute()
    {
        return $this->editAttributeTemplateAttribute;
    }

    /**
     * Get AttributeTemplateOption_ID.
     *
     * @return int
     */
    public function getAttributeTemplateOptionId()
    {
        return $this->attributeTemplateOptionId;
    }

    /**
     * Get AttributeTemplateOption_Code.
     *
     * @return string
     */
    public function getAttributeTemplateOptionCode()
    {
        return $this->attributeTemplateOptionCode;
    }

    /**
     * Get Edit_AttributeTemplateOption.
     *
     * @return string
     */
    public function getEditAttributeTemplateOption()
    {
        return $this->editAttributeTemplateOption;
    }

    /**
     * Get Code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get Prompt.
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * Get Image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Get Default.
     *
     * @return bool
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set AttributeTemplate_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateId($attributeTemplateId)
    {
        $this->attributeTemplateId = $attributeTemplateId;

        return $this;
    }

    /**
     * Set AttributeTemplate_Code.
     *
     * @param string
     * @return $this
     */
    public function setAttributeTemplateCode($attributeTemplateCode)
    {
        $this->attributeTemplateCode = $attributeTemplateCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplate.
     *
     * @param string
     * @return $this
     */
    public function setEditAttributeTemplate($editAttributeTemplate)
    {
        $this->editAttributeTemplate = $editAttributeTemplate;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateAttributeId($attributeTemplateAttributeId)
    {
        $this->attributeTemplateAttributeId = $attributeTemplateAttributeId;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_Code.
     *
     * @param string
     * @return $this
     */
    public function setAttributeTemplateAttributeCode($attributeTemplateAttributeCode)
    {
        $this->attributeTemplateAttributeCode = $attributeTemplateAttributeCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplateAttribute.
     *
     * @param string
     * @return $this
     */
    public function setEditAttributeTemplateAttribute($editAttributeTemplateAttribute)
    {
        $this->editAttributeTemplateAttribute = $editAttributeTemplateAttribute;

        return $this;
    }

    /**
     * Set AttributeTemplateOption_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeTemplateOptionId($attributeTemplateOptionId)
    {
        $this->attributeTemplateOptionId = $attributeTemplateOptionId;

        return $this;
    }

    /**
     * Set AttributeTemplateOption_Code.
     *
     * @param string
     * @return $this
     */
    public function setAttributeTemplateOptionCode($attributeTemplateOptionCode)
    {
        $this->attributeTemplateOptionCode = $attributeTemplateOptionCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplateOption.
     *
     * @param string
     * @return $this
     */
    public function setEditAttributeTemplateOption($editAttributeTemplateOption)
    {
        $this->editAttributeTemplateOption = $editAttributeTemplateOption;

        return $this;
    }

    /**
     * Set Code.
     *
     * @param string
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Prompt.
     *
     * @param string
     * @return $this
     */
    public function setPrompt($prompt)
    {
        $this->prompt = $prompt;

        return $this;
    }

    /**
     * Set Image.
     *
     * @param string
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param float
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param float
     * @return $this
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param float
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Set Default.
     *
     * @param bool
     * @return $this
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getAttributeTemplateId()) {
            $data['AttributeTemplate_ID'] = $this->getAttributeTemplateId();
        } else if ($this->getAttributeTemplateCode()) {
            $data['AttributeTemplate_Code'] = $this->getAttributeTemplateCode();
        } else if ($this->getEditAttributeTemplate()) {
            $data['Edit_AttributeTemplate'] = $this->getEditAttributeTemplate();
        }

        if ($this->getAttributeTemplateAttributeId()) {
            $data['AttributeTemplateAttribute_ID'] = $this->getAttributeTemplateAttributeId();
        } else if ($this->getAttributeTemplateAttributeCode()) {
            $data['AttributeTemplateAttribute_Code'] = $this->getAttributeTemplateAttributeCode();
        } else if ($this->getEditAttributeTemplateAttribute()) {
            $data['Edit_AttributeTemplateAttribute'] = $this->getEditAttributeTemplateAttribute();
        }

        if ($this->getAttributeTemplateOptionId()) {
            $data['AttributeTemplateOption_ID'] = $this->getAttributeTemplateOptionId();
        } else if ($this->getAttributeTemplateOptionCode()) {
            $data['AttributeTemplateOption_Code'] = $this->getAttributeTemplateOptionCode();
        } else if ($this->getEditAttributeTemplateOption()) {
            $data['Edit_AttributeTemplateOption'] = $this->getEditAttributeTemplateOption();
        }

        $data['Code'] = $this->getCode();

        $data['Prompt'] = $this->getPrompt();

        if (!is_null($this->getImage())) {
            $data['Image'] = $this->getImage();
        }

        if (!is_null($this->getPrice())) {
            $data['Price'] = $this->getPrice();
        }

        if (!is_null($this->getCost())) {
            $data['Cost'] = $this->getCost();
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = $this->getWeight();
        }

        if (!is_null($this->getDefault())) {
            $data['Default'] = $this->getDefault();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\AttributeTemplateOptionUpdate($this, $httpResponse, $data);
    }
}
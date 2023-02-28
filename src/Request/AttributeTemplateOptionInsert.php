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
use MerchantAPI\Model\AttributeTemplateAttribute;
use MerchantAPI\Model\AttributeTemplateOption;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AttributeTemplateOption_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateoption_insert
 */
class AttributeTemplateOptionInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AttributeTemplateOption_Insert';

    /** @var ?int */
    protected ?int $attributeTemplateId = null;

    /** @var ?string */
    protected ?string $attributeTemplateCode = null;

    /** @var ?string */
    protected ?string $editAttributeTemplate = null;

    /** @var ?int */
    protected ?int $attributeTemplateAttributeId = null;

    /** @var ?string */
    protected ?string $attributeTemplateAttributeCode = null;

    /** @var ?string */
    protected ?string $editAttributeTemplateAttribute = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $prompt = null;

    /** @var ?string */
    protected ?string $image = null;

    /** @var ?float */
    protected ?float $price = null;

    /** @var ?float */
    protected ?float $cost = null;

    /** @var ?float */
    protected ?float $weight = null;

    /** @var ?bool */
    protected ?bool $default = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\AttributeTemplateAttribute $attributeTemplateAttribute
     */
    public function __construct(?BaseClient $client = null, ?AttributeTemplateAttribute $attributeTemplateAttribute = null)
    {
        parent::__construct($client);
        if ($attributeTemplateAttribute) {
            if ($attributeTemplateAttribute->getId()) {
                $this->setAttributeTemplateAttributeId($attributeTemplateAttribute->getId());
            }
        }
    }

    /**
     * Get AttributeTemplate_ID.
     *
     * @return int
     */
    public function getAttributeTemplateId() : ?int
    {
        return $this->attributeTemplateId;
    }

    /**
     * Get AttributeTemplate_Code.
     *
     * @return string
     */
    public function getAttributeTemplateCode() : ?string
    {
        return $this->attributeTemplateCode;
    }

    /**
     * Get Edit_AttributeTemplate.
     *
     * @return string
     */
    public function getEditAttributeTemplate() : ?string
    {
        return $this->editAttributeTemplate;
    }

    /**
     * Get AttributeTemplateAttribute_ID.
     *
     * @return int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->attributeTemplateAttributeId;
    }

    /**
     * Get AttributeTemplateAttribute_Code.
     *
     * @return string
     */
    public function getAttributeTemplateAttributeCode() : ?string
    {
        return $this->attributeTemplateAttributeCode;
    }

    /**
     * Get Edit_AttributeTemplateAttribute.
     *
     * @return string
     */
    public function getEditAttributeTemplateAttribute() : ?string
    {
        return $this->editAttributeTemplateAttribute;
    }

    /**
     * Get Code.
     *
     * @return string
     */
    public function getCode() : ?string
    {
        return $this->code;
    }

    /**
     * Get Prompt.
     *
     * @return string
     */
    public function getPrompt() : ?string
    {
        return $this->prompt;
    }

    /**
     * Get Image.
     *
     * @return string
     */
    public function getImage() : ?string
    {
        return $this->image;
    }

    /**
     * Get Price.
     *
     * @return float
     */
    public function getPrice() : ?float
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float
     */
    public function getCost() : ?float
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight() : ?float
    {
        return $this->weight;
    }

    /**
     * Get Default.
     *
     * @return bool
     */
    public function getDefault() : ?bool
    {
        return $this->default;
    }

    /**
     * Set AttributeTemplate_ID.
     *
     * @param ?int $attributeTemplateId
     * @return $this
     */
    public function setAttributeTemplateId(?int $attributeTemplateId) : self
    {
        $this->attributeTemplateId = $attributeTemplateId;

        return $this;
    }

    /**
     * Set AttributeTemplate_Code.
     *
     * @param ?string $attributeTemplateCode
     * @return $this
     */
    public function setAttributeTemplateCode(?string $attributeTemplateCode) : self
    {
        $this->attributeTemplateCode = $attributeTemplateCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplate.
     *
     * @param ?string $editAttributeTemplate
     * @return $this
     */
    public function setEditAttributeTemplate(?string $editAttributeTemplate) : self
    {
        $this->editAttributeTemplate = $editAttributeTemplate;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_ID.
     *
     * @param ?int $attributeTemplateAttributeId
     * @return $this
     */
    public function setAttributeTemplateAttributeId(?int $attributeTemplateAttributeId) : self
    {
        $this->attributeTemplateAttributeId = $attributeTemplateAttributeId;

        return $this;
    }

    /**
     * Set AttributeTemplateAttribute_Code.
     *
     * @param ?string $attributeTemplateAttributeCode
     * @return $this
     */
    public function setAttributeTemplateAttributeCode(?string $attributeTemplateAttributeCode) : self
    {
        $this->attributeTemplateAttributeCode = $attributeTemplateAttributeCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplateAttribute.
     *
     * @param ?string $editAttributeTemplateAttribute
     * @return $this
     */
    public function setEditAttributeTemplateAttribute(?string $editAttributeTemplateAttribute) : self
    {
        $this->editAttributeTemplateAttribute = $editAttributeTemplateAttribute;

        return $this;
    }

    /**
     * Set Code.
     *
     * @param ?string $code
     * @return $this
     */
    public function setCode(?string $code) : self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set Prompt.
     *
     * @param ?string $prompt
     * @return $this
     */
    public function setPrompt(?string $prompt) : self
    {
        $this->prompt = $prompt;

        return $this;
    }

    /**
     * Set Image.
     *
     * @param ?string $image
     * @return $this
     */
    public function setImage(?string $image) : self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set Price.
     *
     * @param ?float $price
     * @return $this
     */
    public function setPrice(?float $price) : self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param ?float $cost
     * @return $this
     */
    public function setCost(?float $cost) : self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?float $weight
     * @return $this
     */
    public function setWeight(?float $weight) : self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Set Default.
     *
     * @param ?bool $default
     * @return $this
     */
    public function setDefault(?bool $default) : self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeTemplateOptionInsert($this, $httpResponse, $data);
    }
}
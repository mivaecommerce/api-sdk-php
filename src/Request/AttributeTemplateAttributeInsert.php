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
use MerchantAPI\Model\AttributeTemplate;
use MerchantAPI\Model\AttributeTemplateAttribute;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\DecimalHelper;

/**
 * Handles API Request AttributeTemplateAttribute_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateattribute_insert
 */
class AttributeTemplateAttributeInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AttributeTemplateAttribute_Insert';

    /** @var ?int */
    protected ?int $attributeTemplateId = null;

    /** @var ?string */
    protected ?string $attributeTemplateCode = null;

    /** @var ?string */
    protected ?string $editAttributeTemplate = null;

    /** @var ?string */
    protected ?string $code = null;

    /** @var ?string */
    protected ?string $prompt = null;

    /** @var ?string */
    protected ?string $type = null;

    /** @var ?string */
    protected ?string $image = null;

    /** @var ?(float|Decimal) */
    protected $price = null;

    /** @var ?(float|Decimal) */
    protected $cost = null;

    /** @var ?(float|Decimal) */
    protected $weight = null;

    /** @var ?bool */
    protected ?bool $copy = null;

    /** @var ?bool */
    protected ?bool $required = null;

    /** @var ?bool */
    protected ?bool $inventory = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\AttributeTemplate $attributeTemplate
     */
    public function __construct(?BaseClient $client = null, ?AttributeTemplate $attributeTemplate = null)
    {
        parent::__construct($client);
        if ($attributeTemplate) {
            if ($attributeTemplate->getId()) {
                $this->setAttributeTemplateId($attributeTemplate->getId());
            } else if ($attributeTemplate->getCode()) {
                $this->setAttributeTemplateCode($attributeTemplate->getCode());
            } else if ($attributeTemplate->getCode()) {
                $this->setEditAttributeTemplate($attributeTemplate->getCode());
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
     * Get Type.
     *
     * @return string
     */
    public function getType() : ?string
    {
        return $this->type;
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
     * @return float|Decimal
     */
    public function getPrice() 
    {
        return $this->price;
    }

    /**
     * Get Cost.
     *
     * @return float|Decimal
     */
    public function getCost() 
    {
        return $this->cost;
    }

    /**
     * Get Weight.
     *
     * @return float|Decimal
     */
    public function getWeight() 
    {
        return $this->weight;
    }

    /**
     * Get Copy.
     *
     * @return bool
     */
    public function getCopy() : ?bool
    {
        return $this->copy;
    }

    /**
     * Get Required.
     *
     * @return bool
     */
    public function getRequired() : ?bool
    {
        return $this->required;
    }

    /**
     * Get Inventory.
     *
     * @return bool
     */
    public function getInventory() : ?bool
    {
        return $this->inventory;
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
     * Set Code.
     *
     * @param string $code
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
     * Set Type.
     *
     * @param string $type
     * @return $this
     */
    public function setType(?string $type) : self
    {
        $this->type = $type;

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
     * @param ?(float|string|int|Decimal) $price
     * @return $this
     */
    public function setPrice($price) : self
    {
        $this->price = DecimalHelper::create($price, 16);

        return $this;
    }

    /**
     * Set Cost.
     *
     * @param ?(float|string|int|Decimal) $cost
     * @return $this
     */
    public function setCost($cost) : self
    {
        $this->cost = DecimalHelper::create($cost, 16);

        return $this;
    }

    /**
     * Set Weight.
     *
     * @param ?(float|string|int|Decimal) $weight
     * @return $this
     */
    public function setWeight($weight) : self
    {
        $this->weight = DecimalHelper::create($weight, 16);

        return $this;
    }

    /**
     * Set Copy.
     *
     * @param ?bool $copy
     * @return $this
     */
    public function setCopy(?bool $copy) : self
    {
        $this->copy = $copy;

        return $this;
    }

    /**
     * Set Required.
     *
     * @param ?bool $required
     * @return $this
     */
    public function setRequired(?bool $required) : self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set Inventory.
     *
     * @param ?bool $inventory
     * @return $this
     */
    public function setInventory(?bool $inventory) : self
    {
        $this->inventory = $inventory;

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

        $data['Code'] = $this->getCode();

        if (!is_null($this->getPrompt())) {
            $data['Prompt'] = $this->getPrompt();
        }

        $data['Type'] = $this->getType();

        if (!is_null($this->getImage())) {
            $data['Image'] = $this->getImage();
        }

        if (!is_null($this->getPrice())) {
            $data['Price'] = DecimalHelper::serialize($this->getPrice(), 8);
        }

        if (!is_null($this->getCost())) {
            $data['Cost'] = DecimalHelper::serialize($this->getCost(), 8);
        }

        if (!is_null($this->getWeight())) {
            $data['Weight'] = DecimalHelper::serialize($this->getWeight(), 8);
        }

        if (!is_null($this->getCopy())) {
            $data['Copy'] = $this->getCopy();
        }

        if (!is_null($this->getRequired())) {
            $data['Required'] = $this->getRequired();
        }

        if (!is_null($this->getInventory())) {
            $data['Inventory'] = $this->getInventory();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeTemplateAttributeInsert($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AttributeTemplateOption_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateoption_delete
 */
class AttributeTemplateOptionDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AttributeTemplateOption_Delete';

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

    /** @var ?int */
    protected ?int $attributeTemplateOptionId = null;

    /** @var ?string */
    protected ?string $attributeTemplateOptionCode = null;

    /** @var ?string */
    protected ?string $editAttributeTemplateOption = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\AttributeTemplateOption $attributeTemplateOption
     */
    public function __construct(?BaseClient $client = null, ?AttributeTemplateOption $attributeTemplateOption = null)
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
     * Get AttributeTemplateOption_ID.
     *
     * @return int
     */
    public function getAttributeTemplateOptionId() : ?int
    {
        return $this->attributeTemplateOptionId;
    }

    /**
     * Get AttributeTemplateOption_Code.
     *
     * @return string
     */
    public function getAttributeTemplateOptionCode() : ?string
    {
        return $this->attributeTemplateOptionCode;
    }

    /**
     * Get Edit_AttributeTemplateOption.
     *
     * @return string
     */
    public function getEditAttributeTemplateOption() : ?string
    {
        return $this->editAttributeTemplateOption;
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
     * Set AttributeTemplateOption_ID.
     *
     * @param ?int $attributeTemplateOptionId
     * @return $this
     */
    public function setAttributeTemplateOptionId(?int $attributeTemplateOptionId) : self
    {
        $this->attributeTemplateOptionId = $attributeTemplateOptionId;

        return $this;
    }

    /**
     * Set AttributeTemplateOption_Code.
     *
     * @param ?string $attributeTemplateOptionCode
     * @return $this
     */
    public function setAttributeTemplateOptionCode(?string $attributeTemplateOptionCode) : self
    {
        $this->attributeTemplateOptionCode = $attributeTemplateOptionCode;

        return $this;
    }

    /**
     * Set Edit_AttributeTemplateOption.
     *
     * @param ?string $editAttributeTemplateOption
     * @return $this
     */
    public function setEditAttributeTemplateOption(?string $editAttributeTemplateOption) : self
    {
        $this->editAttributeTemplateOption = $editAttributeTemplateOption;

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

        if ($this->getAttributeTemplateOptionId()) {
            $data['AttributeTemplateOption_ID'] = $this->getAttributeTemplateOptionId();
        } else if ($this->getAttributeTemplateOptionCode()) {
            $data['AttributeTemplateOption_Code'] = $this->getAttributeTemplateOptionCode();
        } else if ($this->getEditAttributeTemplateOption()) {
            $data['Edit_AttributeTemplateOption'] = $this->getEditAttributeTemplateOption();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeTemplateOptionDelete($this, $httpResponse, $data);
    }
}
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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\AttributeTemplate;
use MerchantAPI\Model\AttributeTemplateAttribute;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request AttributeTemplateAttributeList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateattributelist_load_query
 */
class AttributeTemplateAttributeListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'AttributeTemplateAttributeList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'attr_code',
        'attr_prompt',
        'attr_price',
        'attr_cost',
        'attr_weight',
        'attr_image',
        'opt_code',
        'opt_prompt',
        'opt_price',
        'opt_cost',
        'opt_weight',
        'opt_image',
        'code',
        'prompt',
        'price',
        'cost',
        'weight',
        'image',
        'required',
        'inventory',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'code',
        'type',
        'prompt',
        'price',
        'cost',
        'weight',
        'image',
        'required',
        'inventory',
        'attr_code',
        'attr_prompt',
        'attr_price',
        'attr_cost',
        'attr_weight',
        'attr_image',
        'opt_code',
        'opt_prompt',
        'opt_price',
        'opt_cost',
        'opt_weight',
        'opt_image',
    ];

    /** @var ?int */
    protected ?int $attributeTemplateId = null;

    /** @var ?string */
    protected ?string $attributeTemplateCode = null;

    /** @var ?string */
    protected ?string $editAttributeTemplate = null;

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\AttributeTemplateAttributeListLoadQuery($this, $httpResponse, $data);
    }
}
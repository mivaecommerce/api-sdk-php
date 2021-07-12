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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\AttributeTemplate;
use MerchantAPI\Model\AttributeTemplateProduct;
use MerchantAPI\BaseClient;

/**
 * Handles API Request AttributeTemplateProductList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/attributetemplateproductlist_load_query
 */
class AttributeTemplateProductListLoadQuery extends ProductListLoadQuery
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'AttributeTemplateProductList_Load_Query';

    /** @var int */
    protected $attributeTemplateId;

    /** @var string */
    protected $attributeTemplateCode;

    /** @var string */
    protected $editAttributeTemplate;

    /** @var bool */
    protected $assigned;

    /** @var bool */
    protected $unassigned;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\AttributeTemplate
     */
    public function __construct(BaseClient $client = null, AttributeTemplate $attributeTemplate = null)
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
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned()
    {
        return $this->unassigned;
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
     * Set Unassigned.
     *
     * @param bool
     * @return $this
     */
    public function setUnassigned($unassigned)
    {
        $this->unassigned = $unassigned;

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

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        if (!is_null($this->getUnassigned())) {
            $data['Unassigned'] = $this->getUnassigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\AttributeTemplateProductListLoadQuery($this, $httpResponse, $data);
    }
}
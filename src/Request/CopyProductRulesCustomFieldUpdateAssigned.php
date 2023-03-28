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
use MerchantAPI\Model\CopyProductRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyProductRulesCustomField_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copyproductrulescustomfield_update_assigned
 */
class CopyProductRulesCustomFieldUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyProductRulesCustomField_Update_Assigned';

    /** @var ?int */
    protected ?int $copyProductRulesId = null;

    /** @var ?string */
    protected ?string $copyProductRulesName = null;

    /** @var ?string */
    protected ?string $moduleCode = null;

    /** @var ?string */
    protected ?string $fieldCode = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CopyProductRule $copyProductRule
     */
    public function __construct(?BaseClient $client = null, ?CopyProductRule $copyProductRule = null)
    {
        parent::__construct($client);
        if ($copyProductRule) {
            if ($copyProductRule->getId()) {
                $this->setCopyProductRulesId($copyProductRule->getId());
            } else if ($copyProductRule->getName()) {
                $this->setCopyProductRulesName($copyProductRule->getName());
            }
        }
    }

    /**
     * Get CopyProductRules_ID.
     *
     * @return int
     */
    public function getCopyProductRulesId() : ?int
    {
        return $this->copyProductRulesId;
    }

    /**
     * Get CopyProductRules_Name.
     *
     * @return string
     */
    public function getCopyProductRulesName() : ?string
    {
        return $this->copyProductRulesName;
    }

    /**
     * Get Module_Code.
     *
     * @return string
     */
    public function getModuleCode() : ?string
    {
        return $this->moduleCode;
    }

    /**
     * Get Field_Code.
     *
     * @return string
     */
    public function getFieldCode() : ?string
    {
        return $this->fieldCode;
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
     * Set CopyProductRules_ID.
     *
     * @param ?int $copyProductRulesId
     * @return $this
     */
    public function setCopyProductRulesId(?int $copyProductRulesId) : self
    {
        $this->copyProductRulesId = $copyProductRulesId;

        return $this;
    }

    /**
     * Set CopyProductRules_Name.
     *
     * @param ?string $copyProductRulesName
     * @return $this
     */
    public function setCopyProductRulesName(?string $copyProductRulesName) : self
    {
        $this->copyProductRulesName = $copyProductRulesName;

        return $this;
    }

    /**
     * Set Module_Code.
     *
     * @param ?string $moduleCode
     * @return $this
     */
    public function setModuleCode(?string $moduleCode) : self
    {
        $this->moduleCode = $moduleCode;

        return $this;
    }

    /**
     * Set Field_Code.
     *
     * @param ?string $fieldCode
     * @return $this
     */
    public function setFieldCode(?string $fieldCode) : self
    {
        $this->fieldCode = $fieldCode;

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

        if ($this->getCopyProductRulesId()) {
            $data['CopyProductRules_ID'] = $this->getCopyProductRulesId();
        } else if ($this->getCopyProductRulesName()) {
            $data['CopyProductRules_Name'] = $this->getCopyProductRulesName();
        }

        $data['Module_Code'] = $this->getModuleCode();

        $data['Field_Code'] = $this->getFieldCode();

        $data['Assigned'] = $this->getAssigned();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyProductRulesCustomFieldUpdateAssigned($this, $httpResponse, $data);
    }
}
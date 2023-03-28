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
use MerchantAPI\Model\CopyProductRule;
use MerchantAPI\Model\CopyProductRulesModule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyProductRulesModuleList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copyproductrulesmodulelist_load_query
 */
class CopyProductRulesModuleListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyProductRulesModuleList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'module_name',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'module_name',
    ];

    /** @var ?int */
    protected ?int $copyProductRulesId = null;

    /** @var ?string */
    protected ?string $copyProductRulesName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

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
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
    }

    /**
     * Get Unassigned.
     *
     * @return bool
     */
    public function getUnassigned() : ?bool
    {
        return $this->unassigned;
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
     * Set Unassigned.
     *
     * @param ?bool $unassigned
     * @return $this
     */
    public function setUnassigned(?bool $unassigned) : self
    {
        $this->unassigned = $unassigned;

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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyProductRulesModuleListLoadQuery($this, $httpResponse, $data);
    }
}
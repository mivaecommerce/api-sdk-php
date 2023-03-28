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
use MerchantAPI\Model\CopyPageRulesSettings;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyPageRulesSettingsList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copypagerulessettingslist_load_query
 */
class CopyPageRulesSettingsListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyPageRulesSettingsList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'code',
        'module_name',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'code',
        'module_name',
    ];

    /** @var ?int */
    protected ?int $copyPageRulesId = null;

    /** @var ?string */
    protected ?string $copyPageRulesName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /** @var ?bool */
    protected ?bool $unassigned = null;

    /**
     * Get CopyPageRules_ID.
     *
     * @return int
     */
    public function getCopyPageRulesId() : ?int
    {
        return $this->copyPageRulesId;
    }

    /**
     * Get CopyPageRules_Name.
     *
     * @return string
     */
    public function getCopyPageRulesName() : ?string
    {
        return $this->copyPageRulesName;
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
     * Set CopyPageRules_ID.
     *
     * @param ?int $copyPageRulesId
     * @return $this
     */
    public function setCopyPageRulesId(?int $copyPageRulesId) : self
    {
        $this->copyPageRulesId = $copyPageRulesId;

        return $this;
    }

    /**
     * Set CopyPageRules_Name.
     *
     * @param ?string $copyPageRulesName
     * @return $this
     */
    public function setCopyPageRulesName(?string $copyPageRulesName) : self
    {
        $this->copyPageRulesName = $copyPageRulesName;

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

        if ($this->getCopyPageRulesId()) {
            $data['CopyPageRules_ID'] = $this->getCopyPageRulesId();
        } else if ($this->getCopyPageRulesName()) {
            $data['CopyPageRules_Name'] = $this->getCopyPageRulesName();
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
        return new \MerchantAPI\Response\CopyPageRulesSettingsListLoadQuery($this, $httpResponse, $data);
    }
}
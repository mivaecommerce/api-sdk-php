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
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyPageRulesSettings_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copypagerulessettings_update_assigned
 */
class CopyPageRulesSettingsUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyPageRulesSettings_Update_Assigned';

    /** @var ?int */
    protected ?int $copyPageRulesId = null;

    /** @var ?string */
    protected ?string $copyPageRulesName = null;

    /** @var ?string */
    protected ?string $itemCode = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CopyPageRule $copyPageRule
     */
    public function __construct(?BaseClient $client = null, ?CopyPageRule $copyPageRule = null)
    {
        parent::__construct($client);
        if ($copyPageRule) {
            if ($copyPageRule->getId()) {
                $this->setCopyPageRulesId($copyPageRule->getId());
            } else if ($copyPageRule->getName()) {
                $this->setCopyPageRulesName($copyPageRule->getName());
            }
        }
    }

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
     * Get Item_Code.
     *
     * @return string
     */
    public function getItemCode() : ?string
    {
        return $this->itemCode;
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
     * Set Item_Code.
     *
     * @param ?string $itemCode
     * @return $this
     */
    public function setItemCode(?string $itemCode) : self
    {
        $this->itemCode = $itemCode;

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

        if ($this->getCopyPageRulesId()) {
            $data['CopyPageRules_ID'] = $this->getCopyPageRulesId();
        } else if ($this->getCopyPageRulesName()) {
            $data['CopyPageRules_Name'] = $this->getCopyPageRulesName();
        }

        $data['Item_Code'] = $this->getItemCode();

        $data['Assigned'] = $this->getAssigned();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyPageRulesSettingsUpdateAssigned($this, $httpResponse, $data);
    }
}
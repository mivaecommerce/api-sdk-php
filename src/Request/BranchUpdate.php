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
use MerchantAPI\Model\Branch;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Branch_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branch_update
 */
class BranchUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Branch_Update';

    /** @var ?int */
    protected ?int $branchId = null;

    /** @var ?string */
    protected ?string $editBranch = null;

    /** @var ?string */
    protected ?string $branchName = null;

    /** @var ?string */
    protected ?string $branchColor = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Branch $branch
     */
    public function __construct(?BaseClient $client = null, ?Branch $branch = null)
    {
        parent::__construct($client);
        if ($branch) {
            if ($branch->getId()) {
                $this->setBranchId($branch->getId());
            } else if ($branch->getName()) {
                $this->setEditBranch($branch->getName());
            }
        }
    }

    /**
     * Get Branch_ID.
     *
     * @return int
     */
    public function getBranchId() : ?int
    {
        return $this->branchId;
    }

    /**
     * Get Edit_Branch.
     *
     * @return string
     */
    public function getEditBranch() : ?string
    {
        return $this->editBranch;
    }

    /**
     * Get Branch_Name.
     *
     * @return string
     */
    public function getBranchName() : ?string
    {
        return $this->branchName;
    }

    /**
     * Get Branch_Color.
     *
     * @return string
     */
    public function getBranchColor() : ?string
    {
        return $this->branchColor;
    }

    /**
     * Set Branch_ID.
     *
     * @param ?int $branchId
     * @return $this
     */
    public function setBranchId(?int $branchId) : self
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Set Edit_Branch.
     *
     * @param ?string $editBranch
     * @return $this
     */
    public function setEditBranch(?string $editBranch) : self
    {
        $this->editBranch = $editBranch;

        return $this;
    }

    /**
     * Set Branch_Name.
     *
     * @param ?string $branchName
     * @return $this
     */
    public function setBranchName(?string $branchName) : self
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * Set Branch_Color.
     *
     * @param ?string $branchColor
     * @return $this
     */
    public function setBranchColor(?string $branchColor) : self
    {
        $this->branchColor = $branchColor;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getBranchId()) {
            $data['Branch_ID'] = $this->getBranchId();
        } else if ($this->getEditBranch()) {
            $data['Edit_Branch'] = $this->getEditBranch();
        }

        if (!is_null($this->getBranchName())) {
            $data['Branch_Name'] = $this->getBranchName();
        }

        if (!is_null($this->getBranchColor())) {
            $data['Branch_Color'] = $this->getBranchColor();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BranchUpdate($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\Branch;
use MerchantAPI\Model\BranchJavaScriptResourceVersion;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request BranchJavaScriptResourceVersionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branchjavascriptresourceversionlist_load_query
 */
class BranchJavaScriptResourceVersionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'BranchJavaScriptResourceVersionList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'res_id',
        'code',
        'type',
        'is_global',
        'active',
        'file',
        'templ_id',
        'user_id',
        'user_name',
        'source_user_id',
        'source_user_name',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'res_id',
        'code',
        'type',
        'is_global',
        'active',
        'file',
        'templ_id',
        'user_id',
        'user_name',
        'source_user_id',
        'source_user_name',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'source',
        'linkedpages',
        'linkedresources',
        'source_notes',
    ];

    /** @var ?int */
    protected ?int $branchId = null;

    /** @var ?string */
    protected ?string $branchName = null;

    /** @var ?string */
    protected ?string $editBranch = null;

    /** @var ?int */
    protected ?int $changesetId = null;

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
            }

            $this->setBranchName($branch->getName());
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
     * Get Branch_Name.
     *
     * @return string
     */
    public function getBranchName() : ?string
    {
        return $this->branchName;
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
     * Get Changeset_ID.
     *
     * @return int
     */
    public function getChangesetId() : ?int
    {
        return $this->changesetId;
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
     * Set Changeset_ID.
     *
     * @param ?int $changesetId
     * @return $this
     */
    public function setChangesetId(?int $changesetId) : self
    {
        $this->changesetId = $changesetId;

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
        } else if ($this->getBranchName()) {
            $data['Branch_Name'] = $this->getBranchName();
        } else if ($this->getEditBranch()) {
            $data['Edit_Branch'] = $this->getEditBranch();
        }

        if (!is_null($this->getBranchName())) {
            $data['Branch_Name'] = $this->getBranchName();
        }

        if (!is_null($this->getChangesetId())) {
            $data['Changeset_ID'] = $this->getChangesetId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BranchJavaScriptResourceVersionListLoadQuery($this, $httpResponse, $data);
    }
}
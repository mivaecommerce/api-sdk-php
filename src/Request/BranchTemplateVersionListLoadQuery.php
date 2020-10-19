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
use MerchantAPI\Model\BranchTemplateVersion;
use MerchantAPI\BaseClient;

/**
 * Handles API Request BranchTemplateVersionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branchtemplateversionlist_load_query
 */
class BranchTemplateVersionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BranchTemplateVersionList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'templ_id',
        'parent_id',
        'item_id',
        'prop_id',
        'sync',
        'filename',
        'dtstamp',
        'user_id',
        'user_name',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'templ_id',
        'parent_id',
        'item_id',
        'prop_id',
        'sync',
        'filename',
        'dtstamp',
        'user_id',
        'user_name',
    ];

    /** @var array Requests available on demand columns */
    protected $availableOnDemandColumns = [
        'notes',
        'source',
        'settings',
    ];

    /** @var int */
    protected $branchId;

    /** @var string */
    protected $branchName;

    /** @var string */
    protected $editBranch;

    /** @var int */
    protected $changesetId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Branch
     */
    public function __construct(BaseClient $client = null, Branch $branch = null)
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
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Get Branch_Name.
     *
     * @return string
     */
    public function getBranchName()
    {
        return $this->branchName;
    }

    /**
     * Get Edit_Branch.
     *
     * @return string
     */
    public function getEditBranch()
    {
        return $this->editBranch;
    }

    /**
     * Get Changeset_ID.
     *
     * @return int
     */
    public function getChangesetId()
    {
        return $this->changesetId;
    }

    /**
     * Set Branch_ID.
     *
     * @param int
     * @return $this
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Set Branch_Name.
     *
     * @param string
     * @return $this
     */
    public function setBranchName($branchName)
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * Set Edit_Branch.
     *
     * @param string
     * @return $this
     */
    public function setEditBranch($editBranch)
    {
        $this->editBranch = $editBranch;

        return $this;
    }

    /**
     * Set Changeset_ID.
     *
     * @param int
     * @return $this
     */
    public function setChangesetId($changesetId)
    {
        $this->changesetId = $changesetId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BranchTemplateVersionListLoadQuery($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\Changeset;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ChangesetList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changesetlist_load_query
 */
class ChangesetListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ChangesetList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'branch_id',
        'user_id',
        'user_name',
        'dtstamp',
        'notes',
        'user_name',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'branch_id',
        'user_id',
        'user_name',
        'dtstamp',
        'notes',
        'user_name',
    ];

    /** @var int */
    protected $branchId;

    /** @var string */
    protected $branchName;

    /** @var string */
    protected $editBranch;

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ChangesetListLoadQuery($this, $httpResponse, $data);
    }
}
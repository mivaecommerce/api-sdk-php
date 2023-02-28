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
use MerchantAPI\Model\Page;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PageList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pagelist_load_query
 */
class PageListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PageList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'code',
        'name',
        'secure',
        'title',
        'cache',
        'admin',
        'layout',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'code',
        'name',
        'secure',
        'title',
        'cache',
        'admin',
        'layout',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'notes',
        'source',
        'settings',
        'url',
        'uris',
    ];

    /** @var ?int */
    protected ?int $branchId = null;

    /** @var ?string */
    protected ?string $editBranch = null;

    /** @var ?string */
    protected ?string $branchName = null;

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
            if ($branch->get()) {
                $this->setBranchId($branch->get());
            } else if ($branch->get()) {
                $this->setEditBranch($branch->get());
            } else if ($branch->get()) {
                $this->setBranchName($branch->get());
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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getBranchId()) {
            $data['Branch_ID'] = $this->getBranchId();
        } else if ($this->getEditBranch()) {
            $data['Edit_Branch'] = $this->getEditBranch();
        } else if ($this->getBranchName()) {
            $data['Branch_Name'] = $this->getBranchName();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageListLoadQuery($this, $httpResponse, $data);
    }
}
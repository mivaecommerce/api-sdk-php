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
use MerchantAPI\Model\Changeset;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Branch_Copy.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branch_copy
 */
class BranchCopy extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Branch_Copy';

    /** @var ?int */
    protected ?int $sourceBranchId = null;

    /** @var ?int */
    protected ?int $sourceChangesetId = null;

    /** @var ?int */
    protected ?int $destinationBranchId = null;

    /** @var ?string */
    protected ?string $branchCopySessionId = null;

    /** @var ?string */
    protected ?string $notes = null;

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
                $this->setSourceBranchId($branch->getId());
            }
        }
    }

    /**
     * Get Source_Branch_ID.
     *
     * @return int
     */
    public function getSourceBranchId() : ?int
    {
        return $this->sourceBranchId;
    }

    /**
     * Get Source_Changeset_ID.
     *
     * @return int
     */
    public function getSourceChangesetId() : ?int
    {
        return $this->sourceChangesetId;
    }

    /**
     * Get Destination_Branch_ID.
     *
     * @return int
     */
    public function getDestinationBranchId() : ?int
    {
        return $this->destinationBranchId;
    }

    /**
     * Get Branch_Copy_Session_ID.
     *
     * @return string
     */
    public function getBranchCopySessionId() : ?string
    {
        return $this->branchCopySessionId;
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes() : ?string
    {
        return $this->notes;
    }

    /**
     * Set Source_Branch_ID.
     *
     * @param ?int $sourceBranchId
     * @return $this
     */
    public function setSourceBranchId(?int $sourceBranchId) : self
    {
        $this->sourceBranchId = $sourceBranchId;

        return $this;
    }

    /**
     * Set Source_Changeset_ID.
     *
     * @param ?int $sourceChangesetId
     * @return $this
     */
    public function setSourceChangesetId(?int $sourceChangesetId) : self
    {
        $this->sourceChangesetId = $sourceChangesetId;

        return $this;
    }

    /**
     * Set Destination_Branch_ID.
     *
     * @param ?int $destinationBranchId
     * @return $this
     */
    public function setDestinationBranchId(?int $destinationBranchId) : self
    {
        $this->destinationBranchId = $destinationBranchId;

        return $this;
    }

    /**
     * Set Branch_Copy_Session_ID.
     *
     * @param ?string $branchCopySessionId
     * @return $this
     */
    public function setBranchCopySessionId(?string $branchCopySessionId) : self
    {
        $this->branchCopySessionId = $branchCopySessionId;

        return $this;
    }

    /**
     * Set Notes.
     *
     * @param ?string $notes
     * @return $this
     */
    public function setNotes(?string $notes) : self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getSourceBranchId()) {
            $data['Source_Branch_ID'] = $this->getSourceBranchId();
        }

        if ($this->getDestinationBranchId()) {
            $data['Destination_Branch_ID'] = $this->getDestinationBranchId();
        }

        if (!is_null($this->getSourceChangesetId())) {
            $data['Source_Changeset_ID'] = $this->getSourceChangesetId();
        }

        if (!is_null($this->getBranchCopySessionId())) {
            $data['Branch_Copy_Session_ID'] = $this->getBranchCopySessionId();
        }

        if (!is_null($this->getNotes())) {
            $data['Notes'] = $this->getNotes();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BranchCopy($this, $httpResponse, $data);
    }
}
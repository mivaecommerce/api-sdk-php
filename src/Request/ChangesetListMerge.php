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
use MerchantAPI\Model\Changeset;
use MerchantAPI\Model\Branch;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ChangesetList_Merge.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changesetlist_merge
 */
class ChangesetListMerge extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ChangesetList_Merge';

    /** @var int[] */
    protected array $sourceChangesetIds = [];

    /** @var ?int */
    protected ?int $destinationBranchId = null;

    /** @var ?string */
    protected ?string $changesetListMergeSessionId = null;

    /** @var ?string */
    protected ?string $notes = null;

    /** @var ?string */
    protected ?string $tags = null;

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
                $this->setDestinationBranchId($branch->getId());
            }
        }
    }

    /**
     * Get Source_Changeset_IDs.
     *
     * @return array
     */
    public function getSourceChangesetIds() : array
    {
        return $this->sourceChangesetIds;
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
     * Get ChangesetList_Merge_Session_ID.
     *
     * @return string
     */
    public function getChangesetListMergeSessionId() : ?string
    {
        return $this->changesetListMergeSessionId;
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
     * Get Tags.
     *
     * @return string
     */
    public function getTags() : ?string
    {
        return $this->tags;
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
     * Set ChangesetList_Merge_Session_ID.
     *
     * @param ?string $changesetListMergeSessionId
     * @return $this
     */
    public function setChangesetListMergeSessionId(?string $changesetListMergeSessionId) : self
    {
        $this->changesetListMergeSessionId = $changesetListMergeSessionId;

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
     * Set Tags.
     *
     * @param ?string $tags
     * @return $this
     */
    public function setTags(?string $tags) : self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Add Source_Changeset_IDs.
     *
     * @param int $sourceChangesetId
     * @return $this
     */
    public function addSourceChangesetID(int $sourceChangesetId) : self
    {
        $this->sourceChangesetIds[] = $sourceChangesetId;
        return $this;
    }

    /**
     * Add Changeset model.
     *
     * @param \MerchantAPI\Model\Changeset $changeset
     * @return $this
     */
    public function addChangeset(Changeset $changeset) : self
    {
        if ($changeset->getId()) {
            $this->sourceChangesetIds[] = $changeset->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getDestinationBranchId()) {
            $data['Destination_Branch_ID'] = $this->getDestinationBranchId();
        }

        $data['Source_Changeset_IDs'] = $this->getSourceChangesetIds();

        if (!is_null($this->getChangesetListMergeSessionId())) {
            $data['ChangesetList_Merge_Session_ID'] = $this->getChangesetListMergeSessionId();
        }

        if (!is_null($this->getNotes())) {
            $data['Notes'] = $this->getNotes();
        }

        if (!is_null($this->getTags())) {
            $data['Tags'] = $this->getTags();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ChangesetListMerge($this, $httpResponse, $data);
    }
}
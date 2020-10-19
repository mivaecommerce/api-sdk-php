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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Branch_Copy';

    /** @var int */
    protected $sourceBranchId;

    /** @var int */
    protected $destinationBranchId;

    /** @var string */
    protected $notes;

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
                $this->setSourceBranchId($branch->getId());
            }
        }
    }

    /**
     * Get Source_Branch_ID.
     *
     * @return int
     */
    public function getSourceBranchId()
    {
        return $this->sourceBranchId;
    }

    /**
     * Get Destination_Branch_ID.
     *
     * @return int
     */
    public function getDestinationBranchId()
    {
        return $this->destinationBranchId;
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set Source_Branch_ID.
     *
     * @param int
     * @return $this
     */
    public function setSourceBranchId($sourceBranchId)
    {
        $this->sourceBranchId = $sourceBranchId;

        return $this;
    }

    /**
     * Set Destination_Branch_ID.
     *
     * @param int
     * @return $this
     */
    public function setDestinationBranchId($destinationBranchId)
    {
        $this->destinationBranchId = $destinationBranchId;

        return $this;
    }

    /**
     * Set Notes.
     *
     * @param string
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getSourceBranchId()) {
            $data['Source_Branch_ID'] = $this->getSourceBranchId();
        }

        if ($this->getDestinationBranchId()) {
            $data['Destination_Branch_ID'] = $this->getDestinationBranchId();
        }

        if (!is_null($this->getNotes())) {
            $data['Notes'] = $this->getNotes();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BranchCopy($this, $httpResponse, $data);
    }
}
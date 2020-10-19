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

/**
 * Handles API Request Branch_Create.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branch_create
 */
class BranchCreate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Branch_Create';

    /** @var int */
    protected $parentBranchId;

    /** @var string */
    protected $name;

    /** @var string */
    protected $color;

    /** @var int */
    protected $changesetId;

    /** @var string */
    protected $tags;

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
                $this->setParentBranchId($branch->getId());
            }
        }
    }

    /**
     * Get Parent_Branch_ID.
     *
     * @return int
     */
    public function getParentBranchId()
    {
        return $this->parentBranchId;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Color.
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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
     * Get Tags.
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set Parent_Branch_ID.
     *
     * @param int
     * @return $this
     */
    public function setParentBranchId($parentBranchId)
    {
        $this->parentBranchId = $parentBranchId;

        return $this;
    }

    /**
     * Set Name.
     *
     * @param string
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set Color.
     *
     * @param string
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

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
     * Set Tags.
     *
     * @param string
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getParentBranchId()) {
            $data['Parent_Branch_ID'] = $this->getParentBranchId();
        }

        if (!is_null($this->getName())) {
            $data['Name'] = $this->getName();
        }

        if (!is_null($this->getColor())) {
            $data['Color'] = $this->getColor();
        }

        if (!is_null($this->getChangesetId())) {
            $data['Changeset_ID'] = $this->getChangesetId();
        }

        if (!is_null($this->getTags())) {
            $data['Tags'] = $this->getTags();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BranchCreate($this, $httpResponse, $data);
    }
}
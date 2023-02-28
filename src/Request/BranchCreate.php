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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Branch_Create';

    /** @var ?int */
    protected ?int $parentBranchId = null;

    /** @var ?string */
    protected ?string $name = null;

    /** @var ?string */
    protected ?string $color = null;

    /** @var ?int */
    protected ?int $changesetId = null;

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
                $this->setParentBranchId($branch->getId());
            }
        }
    }

    /**
     * Get Parent_Branch_ID.
     *
     * @return int
     */
    public function getParentBranchId() : ?int
    {
        return $this->parentBranchId;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Get Color.
     *
     * @return string
     */
    public function getColor() : ?string
    {
        return $this->color;
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
     * Get Tags.
     *
     * @return string
     */
    public function getTags() : ?string
    {
        return $this->tags;
    }

    /**
     * Set Parent_Branch_ID.
     *
     * @param ?int $parentBranchId
     * @return $this
     */
    public function setParentBranchId(?int $parentBranchId) : self
    {
        $this->parentBranchId = $parentBranchId;

        return $this;
    }

    /**
     * Set Name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set Color.
     *
     * @param ?string $color
     * @return $this
     */
    public function setColor(?string $color) : self
    {
        $this->color = $color;

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
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\BranchCreate($this, $httpResponse, $data);
    }
}
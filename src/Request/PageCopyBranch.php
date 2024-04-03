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
use MerchantAPI\Model\Page;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Page_Copy_Branch.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/page_copy_branch
 */
class PageCopyBranch extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Page_Copy_Branch';

    /** @var ?int */
    protected ?int $sourcePageId = null;

    /** @var ?string */
    protected ?string $sourceEditPage = null;

    /** @var ?string */
    protected ?string $sourcePageCode = null;

    /** @var ?int */
    protected ?int $destinationBranchId = null;

    /** @var ?string */
    protected ?string $destinationEditBranch = null;

    /** @var ?string */
    protected ?string $destinationBranchName = null;

    /** @var ?int */
    protected ?int $copyPageRulesId = null;

    /** @var ?string */
    protected ?string $copyPageRulesName = null;

    /** @var ?string */
    protected ?string $changesetNotes = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Page $page
     */
    public function __construct(?BaseClient $client = null, ?Page $page = null)
    {
        parent::__construct($client);
        if ($page) {
            if ($page->getId()) {
                $this->setSourcePageId($page->getId());
            } else if ($page->getCode()) {
                $this->setSourceEditPage($page->getCode());
            }
        }
    }

    /**
     * Get Source_Page_ID.
     *
     * @return int
     */
    public function getSourcePageId() : ?int
    {
        return $this->sourcePageId;
    }

    /**
     * Get Source_Edit_Page.
     *
     * @return string
     */
    public function getSourceEditPage() : ?string
    {
        return $this->sourceEditPage;
    }

    /**
     * Get Source_Page_Code.
     *
     * @return string
     */
    public function getSourcePageCode() : ?string
    {
        return $this->sourcePageCode;
    }

    /**
     * Get destination_branch_id.
     *
     * @return int
     */
    public function getDestinationBranchId() : ?int
    {
        return $this->destinationBranchId;
    }

    /**
     * Get destination_edit_branch.
     *
     * @return string
     */
    public function getDestinationEditBranch() : ?string
    {
        return $this->destinationEditBranch;
    }

    /**
     * Get destination_branch_name.
     *
     * @return string
     */
    public function getDestinationBranchName() : ?string
    {
        return $this->destinationBranchName;
    }

    /**
     * Get CopyPageRules_ID.
     *
     * @return int
     */
    public function getCopyPageRulesId() : ?int
    {
        return $this->copyPageRulesId;
    }

    /**
     * Get CopyPageRules_Name.
     *
     * @return string
     */
    public function getCopyPageRulesName() : ?string
    {
        return $this->copyPageRulesName;
    }

    /**
     * Get Changeset_Notes.
     *
     * @return string
     */
    public function getChangesetNotes() : ?string
    {
        return $this->changesetNotes;
    }

    /**
     * Set Source_Page_ID.
     *
     * @param ?int $sourcePageId
     * @return $this
     */
    public function setSourcePageId(?int $sourcePageId) : self
    {
        $this->sourcePageId = $sourcePageId;

        return $this;
    }

    /**
     * Set Source_Edit_Page.
     *
     * @param ?string $sourceEditPage
     * @return $this
     */
    public function setSourceEditPage(?string $sourceEditPage) : self
    {
        $this->sourceEditPage = $sourceEditPage;

        return $this;
    }

    /**
     * Set Source_Page_Code.
     *
     * @param ?string $sourcePageCode
     * @return $this
     */
    public function setSourcePageCode(?string $sourcePageCode) : self
    {
        $this->sourcePageCode = $sourcePageCode;

        return $this;
    }

    /**
     * Set destination_branch_id.
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
     * Set destination_edit_branch.
     *
     * @param ?string $destinationEditBranch
     * @return $this
     */
    public function setDestinationEditBranch(?string $destinationEditBranch) : self
    {
        $this->destinationEditBranch = $destinationEditBranch;

        return $this;
    }

    /**
     * Set destination_branch_name.
     *
     * @param ?string $destinationBranchName
     * @return $this
     */
    public function setDestinationBranchName(?string $destinationBranchName) : self
    {
        $this->destinationBranchName = $destinationBranchName;

        return $this;
    }

    /**
     * Set CopyPageRules_ID.
     *
     * @param ?int $copyPageRulesId
     * @return $this
     */
    public function setCopyPageRulesId(?int $copyPageRulesId) : self
    {
        $this->copyPageRulesId = $copyPageRulesId;

        return $this;
    }

    /**
     * Set CopyPageRules_Name.
     *
     * @param ?string $copyPageRulesName
     * @return $this
     */
    public function setCopyPageRulesName(?string $copyPageRulesName) : self
    {
        $this->copyPageRulesName = $copyPageRulesName;

        return $this;
    }

    /**
     * Set Changeset_Notes.
     *
     * @param ?string $changesetNotes
     * @return $this
     */
    public function setChangesetNotes(?string $changesetNotes) : self
    {
        $this->changesetNotes = $changesetNotes;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getSourcePageId()) {
            $data['Source_Page_ID'] = $this->getSourcePageId();
        } else if ($this->getSourceEditPage()) {
            $data['Source_Edit_Page'] = $this->getSourceEditPage();
        } else if ($this->getSourcePageCode()) {
            $data['Source_Page_Code'] = $this->getSourcePageCode();
        }

        if ($this->getDestinationBranchId()) {
            $data['Dest_Branch_ID'] = $this->getDestinationBranchId();
        } else if ($this->getDestinationEditBranch()) {
            $data['Dest_Edit_Branch'] = $this->getDestinationEditBranch();
        } else if ($this->getDestinationBranchName()) {
            $data['Dest_Branch_Name'] = $this->getDestinationBranchName();
        }

        if ($this->getCopyPageRulesId()) {
            $data['CopyPageRules_ID'] = $this->getCopyPageRulesId();
        } else if ($this->getCopyPageRulesName()) {
            $data['CopyPageRules_Name'] = $this->getCopyPageRulesName();
        }

        if (!is_null($this->getChangesetNotes())) {
            $data['Changeset_Notes'] = $this->getChangesetNotes();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageCopyBranch($this, $httpResponse, $data);
    }
}
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
 * Handles API Request Page_Copy.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/page_copy
 */
class PageCopy extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Page_Copy';

    /** @var ?int */
    protected ?int $sourcePageId = null;

    /** @var ?string */
    protected ?string $sourceEditPage = null;

    /** @var ?string */
    protected ?string $sourcePageCode = null;

    /** @var ?int */
    protected ?int $copyPageRulesId = null;

    /** @var ?string */
    protected ?string $copyPageRulesName = null;

    /** @var ?int */
    protected ?int $destinationPageId = null;

    /** @var ?string */
    protected ?string $destinationEditPage = null;

    /** @var ?string */
    protected ?string $destinationPageCode = null;

    /** @var ?bool */
    protected ?bool $destinationPageCreate = null;

    /** @var ?string */
    protected ?string $changesetNotes = null;

    /** @var ?string */
    protected ?string $destinationPageName = null;

    /** @var ?bool */
    protected ?bool $destinationPageLayout = null;

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
            } else if ($page->getCode()) {
                $this->setSourcePageCode($page->getCode());
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
     * Get destination_page_id.
     *
     * @return int
     */
    public function getDestinationPageId() : ?int
    {
        return $this->destinationPageId;
    }

    /**
     * Get destination_edit_page.
     *
     * @return string
     */
    public function getDestinationEditPage() : ?string
    {
        return $this->destinationEditPage;
    }

    /**
     * Get destination_page_code.
     *
     * @return string
     */
    public function getDestinationPageCode() : ?string
    {
        return $this->destinationPageCode;
    }

    /**
     * Get destination_page_create.
     *
     * @return bool
     */
    public function getDestinationPageCreate() : ?bool
    {
        return $this->destinationPageCreate;
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
     * Get destination_page_name.
     *
     * @return string
     */
    public function getDestinationPageName() : ?string
    {
        return $this->destinationPageName;
    }

    /**
     * Get destination_page_layout.
     *
     * @return bool
     */
    public function getDestinationPageLayout() : ?bool
    {
        return $this->destinationPageLayout;
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
     * Set destination_page_id.
     *
     * @param ?int $destinationPageId
     * @return $this
     */
    public function setDestinationPageId(?int $destinationPageId) : self
    {
        $this->destinationPageId = $destinationPageId;

        return $this;
    }

    /**
     * Set destination_edit_page.
     *
     * @param ?string $destinationEditPage
     * @return $this
     */
    public function setDestinationEditPage(?string $destinationEditPage) : self
    {
        $this->destinationEditPage = $destinationEditPage;

        return $this;
    }

    /**
     * Set destination_page_code.
     *
     * @param ?string $destinationPageCode
     * @return $this
     */
    public function setDestinationPageCode(?string $destinationPageCode) : self
    {
        $this->destinationPageCode = $destinationPageCode;

        return $this;
    }

    /**
     * Set destination_page_create.
     *
     * @param ?bool $destinationPageCreate
     * @return $this
     */
    public function setDestinationPageCreate(?bool $destinationPageCreate) : self
    {
        $this->destinationPageCreate = $destinationPageCreate;

        return $this;
    }

    /**
     * Set destination_page_name.
     *
     * @param ?string $destinationPageName
     * @return $this
     */
    public function setDestinationPageName(?string $destinationPageName) : self
    {
        $this->destinationPageName = $destinationPageName;

        return $this;
    }

    /**
     * Set destination_page_layout.
     *
     * @param ?bool $destinationPageLayout
     * @return $this
     */
    public function setDestinationPageLayout(?bool $destinationPageLayout) : self
    {
        $this->destinationPageLayout = $destinationPageLayout;

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

        if ($this->getDestinationPageId()) {
            $data['Dest_Page_ID'] = $this->getDestinationPageId();
        } else if ($this->getDestinationEditPage()) {
            $data['Dest_Edit_Page'] = $this->getDestinationEditPage();
        }

        if ($this->getCopyPageRulesId()) {
            $data['CopyPageRules_ID'] = $this->getCopyPageRulesId();
        } else if ($this->getCopyPageRulesName()) {
            $data['CopyPageRules_Name'] = $this->getCopyPageRulesName();
        }

        $data['Dest_Page_Code'] = $this->getDestinationPageCode();

        if (!is_null($this->getDestinationPageCreate())) {
            $data['Dest_Page_Create'] = $this->getDestinationPageCreate();
        }

        if (!is_null($this->getChangesetNotes())) {
            $data['Changeset_Notes'] = $this->getChangesetNotes();
        }

        $data['Dest_Page_Name'] = $this->getDestinationPageName();

        if (!is_null($this->getDestinationPageLayout())) {
            $data['Dest_Page_Layout'] = $this->getDestinationPageLayout();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageCopy($this, $httpResponse, $data);
    }
}
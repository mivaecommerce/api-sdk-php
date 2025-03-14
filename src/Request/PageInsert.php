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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Page;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Page_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/page_insert
 */
class PageInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Page_Insert';

    /** @var ?string */
    protected ?string $pageCode = null;

    /** @var ?string */
    protected ?string $pageName = null;

    /** @var ?string */
    protected ?string $pageTitle = null;

    /** @var ?string */
    protected ?string $pageTemplate = null;

    /** @var ?bool */
    protected ?bool $pageLayout = null;

    /** @var ?bool */
    protected ?bool $pageFragment = null;

    /** @var ?bool */
    protected ?bool $pagePublic = null;

    /** @var ?bool */
    protected ?bool $pageSecure = null;

    /** @var ?string */
    protected ?string $pageCache = null;

    /** @var ?string */
    protected ?string $changesetNotes = null;

    /** @var ?string */
    protected ?string $pageURI = null;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

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
     */
    public function __construct(?BaseClient $client = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();
    }

    /**
     * Get Page_Code.
     *
     * @return string
     */
    public function getPageCode() : ?string
    {
        return $this->pageCode;
    }

    /**
     * Get Page_Name.
     *
     * @return string
     */
    public function getPageName() : ?string
    {
        return $this->pageName;
    }

    /**
     * Get Page_Title.
     *
     * @return string
     */
    public function getPageTitle() : ?string
    {
        return $this->pageTitle;
    }

    /**
     * Get Page_Template.
     *
     * @return string
     */
    public function getPageTemplate() : ?string
    {
        return $this->pageTemplate;
    }

    /**
     * Get Page_Layout.
     *
     * @return bool
     */
    public function getPageLayout() : ?bool
    {
        return $this->pageLayout;
    }

    /**
     * Get Page_Fragment.
     *
     * @return bool
     */
    public function getPageFragment() : ?bool
    {
        return $this->pageFragment;
    }

    /**
     * Get Page_Public.
     *
     * @return bool
     */
    public function getPagePublic() : ?bool
    {
        return $this->pagePublic;
    }

    /**
     * Get Page_Secure.
     *
     * @return bool
     */
    public function getPageSecure() : ?bool
    {
        return $this->pageSecure;
    }

    /**
     * Get Page_Cache.
     *
     * @return string
     */
    public function getPageCache() : ?string
    {
        return $this->pageCache;
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
     * Get Page_URI.
     *
     * @return string
     */
    public function getPageURI() : ?string
    {
        return $this->pageURI;
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->customFieldValues;
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
     * Set Page_Code.
     *
     * @param ?string $pageCode
     * @return $this
     */
    public function setPageCode(?string $pageCode) : self
    {
        $this->pageCode = $pageCode;

        return $this;
    }

    /**
     * Set Page_Name.
     *
     * @param ?string $pageName
     * @return $this
     */
    public function setPageName(?string $pageName) : self
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * Set Page_Title.
     *
     * @param ?string $pageTitle
     * @return $this
     */
    public function setPageTitle(?string $pageTitle) : self
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    /**
     * Set Page_Template.
     *
     * @param ?string $pageTemplate
     * @return $this
     */
    public function setPageTemplate(?string $pageTemplate) : self
    {
        $this->pageTemplate = $pageTemplate;

        return $this;
    }

    /**
     * Set Page_Layout.
     *
     * @param ?bool $pageLayout
     * @return $this
     */
    public function setPageLayout(?bool $pageLayout) : self
    {
        $this->pageLayout = $pageLayout;

        return $this;
    }

    /**
     * Set Page_Fragment.
     *
     * @param ?bool $pageFragment
     * @return $this
     */
    public function setPageFragment(?bool $pageFragment) : self
    {
        $this->pageFragment = $pageFragment;

        return $this;
    }

    /**
     * Set Page_Public.
     *
     * @param ?bool $pagePublic
     * @return $this
     */
    public function setPagePublic(?bool $pagePublic) : self
    {
        $this->pagePublic = $pagePublic;

        return $this;
    }

    /**
     * Set Page_Secure.
     *
     * @param ?bool $pageSecure
     * @return $this
     */
    public function setPageSecure(?bool $pageSecure) : self
    {
        $this->pageSecure = $pageSecure;

        return $this;
    }

    /**
     * Set Page_Cache.
     *
     * @param ?string $pageCache
     * @return $this
     */
    public function setPageCache(?string $pageCache) : self
    {
        $this->pageCache = $pageCache;

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
     * Set Page_URI.
     *
     * @param ?string $pageURI
     * @return $this
     */
    public function setPageURI(?string $pageURI) : self
    {
        $this->pageURI = $pageURI;

        return $this;
    }

    /**
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|array $customFieldValues
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues) : self
    {
        if (is_array($customFieldValues)) {
            $customFieldValues = new CustomFieldValues($customFieldValues);
        } else if (!$customFieldValues instanceof CustomFieldValues) {
            throw new \InvalidArgumentException(sprintf('Expected instance of CustomFieldValues or an array but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }

        $this->customFieldValues = $customFieldValues;

        return $this;
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

        $data['Page_Code'] = $this->getPageCode();

        $data['Page_Name'] = $this->getPageName();

        if (!is_null($this->getPageTitle())) {
            $data['Page_Title'] = $this->getPageTitle();
        }

        if (!is_null($this->getPageTemplate())) {
            $data['Page_Template'] = $this->getPageTemplate();
        }

        if (!is_null($this->getPageLayout())) {
            $data['Page_Layout'] = $this->getPageLayout();
        }

        if (!is_null($this->getPageFragment())) {
            $data['Page_Fragment'] = $this->getPageFragment();
        }

        if (!is_null($this->getPagePublic())) {
            $data['Page_Public'] = $this->getPagePublic();
        }

        if (!is_null($this->getPageSecure())) {
            $data['Page_Secure'] = $this->getPageSecure();
        }

        if (!is_null($this->getPageCache())) {
            $data['Page_Cache'] = $this->getPageCache();
        }

        if (!is_null($this->getChangesetNotes())) {
            $data['Changeset_Notes'] = $this->getChangesetNotes();
        }

        if (!is_null($this->getPageURI())) {
            $data['Page_URI'] = $this->getPageURI();
        }

        if ($this->getCustomFieldValues() && $this->getCustomFieldValues()->hasData()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageInsert($this, $httpResponse, $data);
    }
}
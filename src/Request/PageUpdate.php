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
 * Handles API Request Page_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/page_update
 */
class PageUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Page_Update';

    /** @var ?int */
    protected ?int $pageId = null;

    /** @var ?string */
    protected ?string $editPage = null;

    /** @var ?string */
    protected ?string $pageCode = null;

    /** @var ?string */
    protected ?string $pageName = null;

    /** @var ?string */
    protected ?string $pageTitle = null;

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

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Page $page
     */
    public function __construct(?BaseClient $client = null, ?Page $page = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

        if ($page) {
            if ($page->getId()) {
                $this->setPageId($page->getId());
            } else if ($page->getCode()) {
                $this->setEditPage($page->getCode());
            }

            $this->setPageCode($page->getCode());

            if ($page->getCustomFieldValues()) {
                $this->setCustomFieldValues(clone $page->getCustomFieldValues());
            }
        }
    }

    /**
     * Get Page_ID.
     *
     * @return int
     */
    public function getPageId() : ?int
    {
        return $this->pageId;
    }

    /**
     * Get Edit_Page.
     *
     * @return string
     */
    public function getEditPage() : ?string
    {
        return $this->editPage;
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
     * Set Page_ID.
     *
     * @param ?int $pageId
     * @return $this
     */
    public function setPageId(?int $pageId) : self
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Set Edit_Page.
     *
     * @param ?string $editPage
     * @return $this
     */
    public function setEditPage(?string $editPage) : self
    {
        $this->editPage = $editPage;

        return $this;
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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPageId()) {
            $data['Page_ID'] = $this->getPageId();
        } else if ($this->getEditPage()) {
            $data['Edit_Page'] = $this->getEditPage();
        } else if ($this->getPageCode()) {
            $data['Page_Code'] = $this->getPageCode();
        }

        if (!is_null($this->getPageCode())) {
            $data['Page_Code'] = $this->getPageCode();
        }

        $data['Page_Name'] = $this->getPageName();

        if (!is_null($this->getPageTitle())) {
            $data['Page_Title'] = $this->getPageTitle();
        }

        if (!is_null($this->getPageSecure())) {
            $data['Page_Secure'] = $this->getPageSecure();
        }

        $data['Page_Cache'] = $this->getPageCache();

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
        return new \MerchantAPI\Response\PageUpdate($this, $httpResponse, $data);
    }
}
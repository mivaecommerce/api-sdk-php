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
 * Handles API Request Page_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/page_delete
 */
class PageDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Page_Delete';

    /** @var ?int */
    protected ?int $pageId = null;

    /** @var ?string */
    protected ?string $editPage = null;

    /** @var ?string */
    protected ?string $pageCode = null;

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
     * @param ?\MerchantAPI\Model\Page $page
     */
    public function __construct(?BaseClient $client = null, ?Page $page = null)
    {
        parent::__construct($client);
        if ($page) {
            if ($page->getId()) {
                $this->setPageId($page->getId());
            } else if ($page->getCode()) {
                $this->setEditPage($page->getCode());
            } else if ($page->getCode()) {
                $this->setPageCode($page->getCode());
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

        if ($this->getPageId()) {
            $data['Page_ID'] = $this->getPageId();
        } else if ($this->getEditPage()) {
            $data['Edit_Page'] = $this->getEditPage();
        } else if ($this->getPageCode()) {
            $data['Page_Code'] = $this->getPageCode();
        }

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
        return new \MerchantAPI\Response\PageDelete($this, $httpResponse, $data);
    }
}
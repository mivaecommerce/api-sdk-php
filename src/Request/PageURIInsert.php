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
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PageURI_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pageuri_insert
 */
class PageURIInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PageURI_Insert';

    /** @var ?string */
    protected ?string $uRI = null;

    /** @var ?int */
    protected ?int $status = null;

    /** @var ?bool */
    protected ?bool $canonical = null;

    /** @var ?int */
    protected ?int $pageId = null;

    /** @var ?string */
    protected ?string $pageCode = null;

    /** @var ?string */
    protected ?string $editPage = null;

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
                $this->setPageCode($page->getCode());
            }
        }
    }

    /**
     * Get URI.
     *
     * @return string
     */
    public function getURI() : ?string
    {
        return $this->uRI;
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus() : ?int
    {
        return $this->status;
    }

    /**
     * Get Canonical.
     *
     * @return bool
     */
    public function getCanonical() : ?bool
    {
        return $this->canonical;
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
     * Get Page_Code.
     *
     * @return string
     */
    public function getPageCode() : ?string
    {
        return $this->pageCode;
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
     * Set URI.
     *
     * @param ?string $uRI
     * @return $this
     */
    public function setURI(?string $uRI) : self
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * Set Status.
     *
     * @param ?int $status
     * @return $this
     */
    public function setStatus(?int $status) : self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set Canonical.
     *
     * @param ?bool $canonical
     * @return $this
     */
    public function setCanonical(?bool $canonical) : self
    {
        $this->canonical = $canonical;

        return $this;
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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPageId()) {
            $data['Page_ID'] = $this->getPageId();
        } else if ($this->getPageCode()) {
            $data['Page_Code'] = $this->getPageCode();
        } else if ($this->getEditPage()) {
            $data['Edit_Page'] = $this->getEditPage();
        }

        if (!is_null($this->getURI())) {
            $data['URI'] = $this->getURI();
        }

        if (!is_null($this->getStatus())) {
            $data['Status'] = $this->getStatus();
        }

        if (!is_null($this->getCanonical())) {
            $data['Canonical'] = $this->getCanonical();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageURIInsert($this, $httpResponse, $data);
    }
}
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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PageURI_Insert';

    /** @var string */
    protected $uRI;

    /** @var int */
    protected $status;

    /** @var bool */
    protected $canonical;

    /** @var int */
    protected $pageId;

    /** @var string */
    protected $pageCode;

    /** @var string */
    protected $editPage;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Page
     */
    public function __construct(BaseClient $client = null, Page $page = null)
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
    public function getURI()
    {
        return $this->uRI;
    }

    /**
     * Get Status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get Canonical.
     *
     * @return bool
     */
    public function getCanonical()
    {
        return $this->canonical;
    }

    /**
     * Get Page_ID.
     *
     * @return int
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Get Page_Code.
     *
     * @return string
     */
    public function getPageCode()
    {
        return $this->pageCode;
    }

    /**
     * Get Edit_Page.
     *
     * @return string
     */
    public function getEditPage()
    {
        return $this->editPage;
    }

    /**
     * Set URI.
     *
     * @param string
     * @return $this
     */
    public function setURI($uRI)
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * Set Status.
     *
     * @param int
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set Canonical.
     *
     * @param bool
     * @return $this
     */
    public function setCanonical($canonical)
    {
        $this->canonical = $canonical;

        return $this;
    }

    /**
     * Set Page_ID.
     *
     * @param int
     * @return $this
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Set Page_Code.
     *
     * @param string
     * @return $this
     */
    public function setPageCode($pageCode)
    {
        $this->pageCode = $pageCode;

        return $this;
    }

    /**
     * Set Edit_Page.
     *
     * @param string
     * @return $this
     */
    public function setEditPage($editPage)
    {
        $this->editPage = $editPage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PageURIInsert($this, $httpResponse, $data);
    }
}
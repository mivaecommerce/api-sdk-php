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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Uri;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PageURIList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pageurilist_load_query
 */
class PageURIListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PageURIList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'canonical',
        'status',
        'uri',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'uri',
    ];

    /** @var ?int */
    protected ?int $pageId = null;

    /** @var ?string */
    protected ?string $editPage = null;

    /** @var ?string */
    protected ?string $pageCode = null;

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

        $data['Page_Code'] = $this->getPageCode();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PageURIListLoadQuery($this, $httpResponse, $data);
    }
}
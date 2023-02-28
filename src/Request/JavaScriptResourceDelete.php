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
use MerchantAPI\Model\JavaScriptResource;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request JavaScriptResource_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/javascriptresource_delete
 */
class JavaScriptResourceDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'JavaScriptResource_Delete';

    /** @var ?int */
    protected ?int $javaScriptResourceId = null;

    /** @var ?string */
    protected ?string $editJavaScriptResource = null;

    /** @var ?string */
    protected ?string $javaScriptResourceCode = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\JavaScriptResource $javaScriptResource
     */
    public function __construct(?BaseClient $client = null, ?JavaScriptResource $javaScriptResource = null)
    {
        parent::__construct($client);
        if ($javaScriptResource) {
            if ($javaScriptResource->getId()) {
                $this->setJavaScriptResourceId($javaScriptResource->getId());
            } else if ($javaScriptResource->getCode()) {
                $this->setEditJavaScriptResource($javaScriptResource->getCode());
            } else if ($javaScriptResource->getCode()) {
                $this->setJavaScriptResourceCode($javaScriptResource->getCode());
            }

            $this->setJavaScriptResourceCode($javaScriptResource->getCode());
        }
    }

    /**
     * Get JavaScriptResource_ID.
     *
     * @return int
     */
    public function getJavaScriptResourceId() : ?int
    {
        return $this->javaScriptResourceId;
    }

    /**
     * Get Edit_JavaScriptResource.
     *
     * @return string
     */
    public function getEditJavaScriptResource() : ?string
    {
        return $this->editJavaScriptResource;
    }

    /**
     * Get JavaScriptResource_Code.
     *
     * @return string
     */
    public function getJavaScriptResourceCode() : ?string
    {
        return $this->javaScriptResourceCode;
    }

    /**
     * Set JavaScriptResource_ID.
     *
     * @param ?int $javaScriptResourceId
     * @return $this
     */
    public function setJavaScriptResourceId(?int $javaScriptResourceId) : self
    {
        $this->javaScriptResourceId = $javaScriptResourceId;

        return $this;
    }

    /**
     * Set Edit_JavaScriptResource.
     *
     * @param ?string $editJavaScriptResource
     * @return $this
     */
    public function setEditJavaScriptResource(?string $editJavaScriptResource) : self
    {
        $this->editJavaScriptResource = $editJavaScriptResource;

        return $this;
    }

    /**
     * Set JavaScriptResource_Code.
     *
     * @param ?string $javaScriptResourceCode
     * @return $this
     */
    public function setJavaScriptResourceCode(?string $javaScriptResourceCode) : self
    {
        $this->javaScriptResourceCode = $javaScriptResourceCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getJavaScriptResourceId()) {
            $data['JavaScriptResource_ID'] = $this->getJavaScriptResourceId();
        } else if ($this->getEditJavaScriptResource()) {
            $data['Edit_JavaScriptResource'] = $this->getEditJavaScriptResource();
        } else if ($this->getJavaScriptResourceCode()) {
            $data['JavaScriptResource_Code'] = $this->getJavaScriptResourceCode();
        }

        if (!is_null($this->getJavaScriptResourceCode())) {
            $data['JavaScriptResource_Code'] = $this->getJavaScriptResourceCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\JavaScriptResourceDelete($this, $httpResponse, $data);
    }
}
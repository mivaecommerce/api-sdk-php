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
use MerchantAPI\Model\CSSResource;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CSSResource_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/cssresource_delete
 */
class CSSResourceDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CSSResource_Delete';

    /** @var ?int */
    protected ?int $CSSResourceId = null;

    /** @var ?string */
    protected ?string $editCSSResource = null;

    /** @var ?string */
    protected ?string $CSSResourceCode = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\CSSResource $CSSResource
     */
    public function __construct(?BaseClient $client = null, ?CSSResource $CSSResource = null)
    {
        parent::__construct($client);
        if ($CSSResource) {
            if ($CSSResource->getId()) {
                $this->setCSSResourceId($CSSResource->getId());
            } else if ($CSSResource->getCode()) {
                $this->setEditCSSResource($CSSResource->getCode());
            } else if ($CSSResource->getCode()) {
                $this->setCSSResourceCode($CSSResource->getCode());
            }

            $this->setCSSResourceCode($CSSResource->getCode());
        }
    }

    /**
     * Get CSSResource_ID.
     *
     * @return int
     */
    public function getCSSResourceId() : ?int
    {
        return $this->CSSResourceId;
    }

    /**
     * Get Edit_CSSResource.
     *
     * @return string
     */
    public function getEditCSSResource() : ?string
    {
        return $this->editCSSResource;
    }

    /**
     * Get CSSResource_Code.
     *
     * @return string
     */
    public function getCSSResourceCode() : ?string
    {
        return $this->CSSResourceCode;
    }

    /**
     * Set CSSResource_ID.
     *
     * @param ?int $CSSResourceId
     * @return $this
     */
    public function setCSSResourceId(?int $CSSResourceId) : self
    {
        $this->CSSResourceId = $CSSResourceId;

        return $this;
    }

    /**
     * Set Edit_CSSResource.
     *
     * @param ?string $editCSSResource
     * @return $this
     */
    public function setEditCSSResource(?string $editCSSResource) : self
    {
        $this->editCSSResource = $editCSSResource;

        return $this;
    }

    /**
     * Set CSSResource_Code.
     *
     * @param ?string $CSSResourceCode
     * @return $this
     */
    public function setCSSResourceCode(?string $CSSResourceCode) : self
    {
        $this->CSSResourceCode = $CSSResourceCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getCSSResourceId()) {
            $data['CSSResource_ID'] = $this->getCSSResourceId();
        } else if ($this->getEditCSSResource()) {
            $data['Edit_CSSResource'] = $this->getEditCSSResource();
        } else if ($this->getCSSResourceCode()) {
            $data['CSSResource_Code'] = $this->getCSSResourceCode();
        }

        if (!is_null($this->getCSSResourceCode())) {
            $data['CSSResource_Code'] = $this->getCSSResourceCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CSSResourceDelete($this, $httpResponse, $data);
    }
}
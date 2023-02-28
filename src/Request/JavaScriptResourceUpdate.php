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
use MerchantAPI\Model\JavaScriptResourceAttribute;
use MerchantAPI\Model\JavaScriptResource;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request JavaScriptResource_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/javascriptresource_update
 */
class JavaScriptResourceUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'JavaScriptResource_Update';

    /** @var ?int */
    protected ?int $javaScriptResourceId = null;

    /** @var ?string */
    protected ?string $editJavaScriptResource = null;

    /** @var ?string */
    protected ?string $javaScriptResourceCode = null;

    /** @var ?string */
    protected ?string $javaScriptResourceType = null;

    /** @var ?bool */
    protected ?bool $javaScriptResourceGlobal = null;

    /** @var ?bool */
    protected ?bool $javaScriptResourceActive = null;

    /** @var ?string */
    protected ?string $javaScriptResourceFilePath = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $javaScriptResourceAttributes;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\JavaScriptResource $javaScriptResource
     */
    public function __construct(?BaseClient $client = null, ?JavaScriptResource $javaScriptResource = null)
    {
        parent::__construct($client);
        $this->javaScriptResourceAttributes = new Collection();

        if ($javaScriptResource) {
            if ($javaScriptResource->getId()) {
                $this->setJavaScriptResourceId($javaScriptResource->getId());
            } else if ($javaScriptResource->getCode()) {
                $this->setEditJavaScriptResource($javaScriptResource->getCode());
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
     * Get JavaScriptResource_Type.
     *
     * @return string
     */
    public function getJavaScriptResourceType() : ?string
    {
        return $this->javaScriptResourceType;
    }

    /**
     * Get JavaScriptResource_Global.
     *
     * @return bool
     */
    public function getJavaScriptResourceGlobal() : ?bool
    {
        return $this->javaScriptResourceGlobal;
    }

    /**
     * Get JavaScriptResource_Active.
     *
     * @return bool
     */
    public function getJavaScriptResourceActive() : ?bool
    {
        return $this->javaScriptResourceActive;
    }

    /**
     * Get JavaScriptResource_File_Path.
     *
     * @return string
     */
    public function getJavaScriptResourceFilePath() : ?string
    {
        return $this->javaScriptResourceFilePath;
    }

    /**
     * Get JavaScriptResource_Attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getJavaScriptResourceAttributes() : ?Collection
    {
        return $this->javaScriptResourceAttributes;
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
     * Set JavaScriptResource_Type.
     *
     * @param ?string $javaScriptResourceType
     * @return $this
     */
    public function setJavaScriptResourceType(?string $javaScriptResourceType) : self
    {
        $this->javaScriptResourceType = $javaScriptResourceType;

        return $this;
    }

    /**
     * Set JavaScriptResource_Global.
     *
     * @param ?bool $javaScriptResourceGlobal
     * @return $this
     */
    public function setJavaScriptResourceGlobal(?bool $javaScriptResourceGlobal) : self
    {
        $this->javaScriptResourceGlobal = $javaScriptResourceGlobal;

        return $this;
    }

    /**
     * Set JavaScriptResource_Active.
     *
     * @param ?bool $javaScriptResourceActive
     * @return $this
     */
    public function setJavaScriptResourceActive(?bool $javaScriptResourceActive) : self
    {
        $this->javaScriptResourceActive = $javaScriptResourceActive;

        return $this;
    }

    /**
     * Set JavaScriptResource_File_Path.
     *
     * @param ?string $javaScriptResourceFilePath
     * @return $this
     */
    public function setJavaScriptResourceFilePath(?string $javaScriptResourceFilePath) : self
    {
        $this->javaScriptResourceFilePath = $javaScriptResourceFilePath;

        return $this;
    }

    /**
     * Set JavaScriptResource_Attributes.
     *
     * @param \MerchantAPI\Collection|array $javaScriptResourceAttributes
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setJavaScriptResourceAttributes($javaScriptResourceAttributes) : self
    {
        if (!is_array($javaScriptResourceAttributes) && !$javaScriptResourceAttributes instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($javaScriptResourceAttributes) ? get_class($javaScriptResourceAttributes) : gettype($javaScriptResourceAttributes)));
        }

        foreach ($javaScriptResourceAttributes as &$model) {
            if (is_array($model)) {
                $model = new JavaScriptResourceAttribute($model);
            } else if (!$model instanceof JavaScriptResourceAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->javaScriptResourceAttributes = new Collection($javaScriptResourceAttributes);

        return $this;
    }

    /**
     * Add JavaScriptResource_Attributes.
     *
     * @param \MerchantAPI\Model\JavaScriptResourceAttribute
     * @return $this
     */
    public function addJavaScriptResourceAttribute(JavaScriptResourceAttribute $model) : self
    {
        $this->javaScriptResourceAttributes[] = $model;
        return $this;
    }

    /**
     * Add many JavaScriptResourceAttribute.
     *
     * @param (\MerchantAPI\Model\JavaScriptResourceAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addJavaScriptResourceAttributes(array $javaScriptResourceAttributes) : self
    {
        foreach ($javaScriptResourceAttributes as $e) {
            if (is_array($e)) {
                $this->javaScriptResourceAttributes[] = new JavaScriptResourceAttribute($e);
            } else if ($e instanceof JavaScriptResourceAttribute) {
                $this->javaScriptResourceAttributes[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceAttribute or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

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

        $data['JavaScriptResource_Type'] = $this->getJavaScriptResourceType();

        if (!is_null($this->getJavaScriptResourceGlobal())) {
            $data['JavaScriptResource_Global'] = $this->getJavaScriptResourceGlobal();
        }

        if (!is_null($this->getJavaScriptResourceActive())) {
            $data['JavaScriptResource_Active'] = $this->getJavaScriptResourceActive();
        }

        $data['JavaScriptResource_File_Path'] = $this->getJavaScriptResourceFilePath();

        if (count($this->getJavaScriptResourceAttributes())) {
            $data['JavaScriptResource_Attributes'] = [];

            foreach ($this->getJavaScriptResourceAttributes() as $i => $javaScriptResourceAttribute) {
                if ($javaScriptResourceAttribute->hasData()) {
                    $data['JavaScriptResource_Attributes'][] = $javaScriptResourceAttribute->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\JavaScriptResourceUpdate($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\CSSResourceAttribute;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request CSSResource_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/cssresource_insert
 */
class CSSResourceInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CSSResource_Insert';

    /** @var ?string */
    protected ?string $CSSResourceCode = null;

    /** @var ?string */
    protected ?string $CSSResourceType = null;

    /** @var ?bool */
    protected ?bool $CSSResourceGlobal = null;

    /** @var ?bool */
    protected ?bool $CSSResourceActive = null;

    /** @var ?string */
    protected ?string $CSSResourceFilePath = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $CSSResourceAttributes;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     */
    public function __construct(?BaseClient $client = null)
    {
        parent::__construct($client);
        $this->CSSResourceAttributes = new \MerchantAPI\Collection();
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
     * Get CSSResource_Type.
     *
     * @return string
     */
    public function getCSSResourceType() : ?string
    {
        return $this->CSSResourceType;
    }

    /**
     * Get CSSResource_Global.
     *
     * @return bool
     */
    public function getCSSResourceGlobal() : ?bool
    {
        return $this->CSSResourceGlobal;
    }

    /**
     * Get CSSResource_Active.
     *
     * @return bool
     */
    public function getCSSResourceActive() : ?bool
    {
        return $this->CSSResourceActive;
    }

    /**
     * Get CSSResource_File_Path.
     *
     * @return string
     */
    public function getCSSResourceFilePath() : ?string
    {
        return $this->CSSResourceFilePath;
    }

    /**
     * Get CSSResource_Attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCSSResourceAttributes() : ?Collection
    {
        return $this->CSSResourceAttributes;
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
     * Set CSSResource_Type.
     *
     * @param ?string $CSSResourceType
     * @return $this
     */
    public function setCSSResourceType(?string $CSSResourceType) : self
    {
        $this->CSSResourceType = $CSSResourceType;

        return $this;
    }

    /**
     * Set CSSResource_Global.
     *
     * @param ?bool $CSSResourceGlobal
     * @return $this
     */
    public function setCSSResourceGlobal(?bool $CSSResourceGlobal) : self
    {
        $this->CSSResourceGlobal = $CSSResourceGlobal;

        return $this;
    }

    /**
     * Set CSSResource_Active.
     *
     * @param ?bool $CSSResourceActive
     * @return $this
     */
    public function setCSSResourceActive(?bool $CSSResourceActive) : self
    {
        $this->CSSResourceActive = $CSSResourceActive;

        return $this;
    }

    /**
     * Set CSSResource_File_Path.
     *
     * @param ?string $CSSResourceFilePath
     * @return $this
     */
    public function setCSSResourceFilePath(?string $CSSResourceFilePath) : self
    {
        $this->CSSResourceFilePath = $CSSResourceFilePath;

        return $this;
    }

    /**
     * Set CSSResource_Attributes.
     *
     * @param \MerchantAPI\Collection|array $CSSResourceAttributes
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCSSResourceAttributes($CSSResourceAttributes) : self
    {
        if (!is_array($CSSResourceAttributes) && !$CSSResourceAttributes instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($CSSResourceAttributes) ? get_class($CSSResourceAttributes) : gettype($CSSResourceAttributes)));
        }

        foreach ($CSSResourceAttributes as &$model) {
            if (is_array($model)) {
                $model = new CSSResourceAttribute($model);
            } else if (!$model instanceof CSSResourceAttribute) {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceAttribute or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->CSSResourceAttributes = new Collection($CSSResourceAttributes);

        return $this;
    }

    /**
     * Add CSSResource_Attributes.
     *
     * @param \MerchantAPI\Model\CSSResourceAttribute
     * @return $this
     */
    public function addCSSResourceAttribute(CSSResourceAttribute $model) : self
    {
        $this->CSSResourceAttributes[] = $model;
        return $this;
    }

    /**
     * Add many CSSResourceAttribute.
     *
     * @param (\MerchantAPI\Model\CSSResourceAttribute|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addCSSResourceAttributes(array $CSSResourceAttributes) : self
    {
        foreach ($CSSResourceAttributes as $e) {
            if (is_array($e)) {
                $this->CSSResourceAttributes[] = new CSSResourceAttribute($e);
            } else if ($e instanceof CSSResourceAttribute) {
                $this->CSSResourceAttributes[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceAttribute or an array of arrays but got %s',
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

        $data['CSSResource_Code'] = $this->getCSSResourceCode();

        $data['CSSResource_Type'] = $this->getCSSResourceType();

        if (!is_null($this->getCSSResourceGlobal())) {
            $data['CSSResource_Global'] = $this->getCSSResourceGlobal();
        }

        if (!is_null($this->getCSSResourceActive())) {
            $data['CSSResource_Active'] = $this->getCSSResourceActive();
        }

        $data['CSSResource_File_Path'] = $this->getCSSResourceFilePath();

        if (count($this->getCSSResourceAttributes())) {
            $data['CSSResource_Attributes'] = [];

            foreach ($this->getCSSResourceAttributes() as $i => $CSSResourceAttribute) {
                if ($CSSResourceAttribute->hasData()) {
                    $data['CSSResource_Attributes'][] = $CSSResourceAttribute->getData();
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
        return new \MerchantAPI\Response\CSSResourceInsert($this, $httpResponse, $data);
    }
}
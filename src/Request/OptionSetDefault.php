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
use MerchantAPI\Model\ProductOption;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Option_Set_Default.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/option_set_default
 */
class OptionSetDefault extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Option_Set_Default';

    /** @var ?int */
    protected ?int $optionId = null;

    /** @var ?string */
    protected ?string $optionCode = null;

    /** @var ?int */
    protected ?int $attributeId = null;

    /** @var ?bool */
    protected ?bool $optionDefault = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\ProductOption $productOption
     */
    public function __construct(?BaseClient $client = null, ?ProductOption $productOption = null)
    {
        parent::__construct($client);
        if ($productOption) {
            if ($productOption->getId()) {
                $this->setOptionId($productOption->getId());
            } else if ($productOption->getCode()) {
                $this->setOptionCode($productOption->getCode());
            }

            if ($productOption->getAttributeId()) {
                $this->setAttributeId($productOption->getAttributeId());
            }

            $this->setOptionCode($productOption->getCode());
        }
    }

    /**
     * Get Option_ID.
     *
     * @return int
     */
    public function getOptionId() : ?int
    {
        return $this->optionId;
    }

    /**
     * Get Option_Code.
     *
     * @return string
     */
    public function getOptionCode() : ?string
    {
        return $this->optionCode;
    }

    /**
     * Get Attribute_ID.
     *
     * @return int
     */
    public function getAttributeId() : ?int
    {
        return $this->attributeId;
    }

    /**
     * Get Option_Default.
     *
     * @return bool
     */
    public function getOptionDefault() : ?bool
    {
        return $this->optionDefault;
    }

    /**
     * Set Option_ID.
     *
     * @param ?int $optionId
     * @return $this
     */
    public function setOptionId(?int $optionId) : self
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Set Option_Code.
     *
     * @param ?string $optionCode
     * @return $this
     */
    public function setOptionCode(?string $optionCode) : self
    {
        $this->optionCode = $optionCode;

        return $this;
    }

    /**
     * Set Attribute_ID.
     *
     * @param ?int $attributeId
     * @return $this
     */
    public function setAttributeId(?int $attributeId) : self
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    /**
     * Set Option_Default.
     *
     * @param ?bool $optionDefault
     * @return $this
     */
    public function setOptionDefault(?bool $optionDefault) : self
    {
        $this->optionDefault = $optionDefault;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getOptionId()) {
            $data['Option_ID'] = $this->getOptionId();
        } else if ($this->getOptionCode()) {
            $data['Option_Code'] = $this->getOptionCode();
        }

        if ($this->getAttributeId()) {
            $data['Attribute_ID'] = $this->getAttributeId();
        }

        if (!is_null($this->getOptionCode())) {
            $data['Option_Code'] = $this->getOptionCode();
        }

        if (!is_null($this->getOptionDefault())) {
            $data['Option_Default'] = $this->getOptionDefault();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OptionSetDefault($this, $httpResponse, $data);
    }
}
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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Option_Set_Default';

    /** @var int */
    protected $optionId;

    /** @var string */
    protected $optionCode;

    /** @var int */
    protected $attributeId;

    /** @var bool */
    protected $optionDefault;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\ProductOption
     */
    public function __construct(BaseClient $client = null, ProductOption $productOption = null)
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
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Get Option_Code.
     *
     * @return string
     */
    public function getOptionCode()
    {
        return $this->optionCode;
    }

    /**
     * Get Attribute_ID.
     *
     * @return int
     */
    public function getAttributeId()
    {
        return $this->attributeId;
    }

    /**
     * Get Option_Default.
     *
     * @return bool
     */
    public function getOptionDefault()
    {
        return $this->optionDefault;
    }

    /**
     * Set Option_ID.
     *
     * @param int
     * @return $this
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Set Option_Code.
     *
     * @param string
     * @return $this
     */
    public function setOptionCode($optionCode)
    {
        $this->optionCode = $optionCode;

        return $this;
    }

    /**
     * Set Attribute_ID.
     *
     * @param int
     * @return $this
     */
    public function setAttributeId($attributeId)
    {
        $this->attributeId = $attributeId;

        return $this;
    }

    /**
     * Set Option_Default.
     *
     * @param bool
     * @return $this
     */
    public function setOptionDefault($optionDefault)
    {
        $this->optionDefault = $optionDefault;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OptionSetDefault($this, $httpResponse, $data);
    }
}
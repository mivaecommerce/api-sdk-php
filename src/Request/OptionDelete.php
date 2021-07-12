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
 * Handles API Request Option_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/option_delete
 */
class OptionDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Option_Delete';

    /** @var int */
    protected $optionId;

    /** @var string */
    protected $optionCode;

    /** @var int */
    protected $attributeId;

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

            $this->setOptionId($productOption->getId());
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

        if (!is_null($this->getOptionId())) {
            $data['Option_ID'] = $this->getOptionId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OptionDelete($this, $httpResponse, $data);
    }
}
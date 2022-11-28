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

use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Product;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ProductVariant_Generate_Delimiter.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/productvariant_generate_delimiter
 */
class ProductVariantGenerateDelimiter extends ProductVariantGenerate
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ProductVariant_Generate_Delimiter';

    /** @var string */
    protected $delimiter;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Product
     */
    public function __construct(BaseClient $client = null, Product $product = null)
    {
        parent::__construct($client, $product);
    }

    /**
     * Get Delimiter.
     *
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * Set Delimiter.
     *
     * @param string
     * @return $this
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if (!is_null($this->getDelimiter())) {
            $data['Delimiter'] = $this->getDelimiter();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ProductVariantGenerateDelimiter($this, $httpResponse, $data);
    }
}
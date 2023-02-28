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
use MerchantAPI\Model\PriceGroup;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PriceGroupQualifyingProduct_Update_Assigned.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/pricegroupqualifyingproduct_update_assigned
 */
class PriceGroupQualifyingProductUpdateAssigned extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PriceGroupQualifyingProduct_Update_Assigned';

    /** @var ?int */
    protected ?int $productId = null;

    /** @var ?string */
    protected ?string $editProduct = null;

    /** @var ?string */
    protected ?string $productCode = null;

    /** @var ?int */
    protected ?int $priceGroupId = null;

    /** @var ?string */
    protected ?string $editPriceGroup = null;

    /** @var ?string */
    protected ?string $priceGroupName = null;

    /** @var ?bool */
    protected ?bool $assigned = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PriceGroup $priceGroup
     */
    public function __construct(?BaseClient $client = null, ?PriceGroup $priceGroup = null)
    {
        parent::__construct($client);
        if ($priceGroup) {
            if ($priceGroup->getId()) {
                $this->setProductId($priceGroup->getId());
            }
        }
    }

    /**
     * Get Product_ID.
     *
     * @return int
     */
    public function getProductId() : ?int
    {
        return $this->productId;
    }

    /**
     * Get Edit_Product.
     *
     * @return string
     */
    public function getEditProduct() : ?string
    {
        return $this->editProduct;
    }

    /**
     * Get Product_Code.
     *
     * @return string
     */
    public function getProductCode() : ?string
    {
        return $this->productCode;
    }

    /**
     * Get PriceGroup_ID.
     *
     * @return int
     */
    public function getPriceGroupId() : ?int
    {
        return $this->priceGroupId;
    }

    /**
     * Get Edit_PriceGroup.
     *
     * @return string
     */
    public function getEditPriceGroup() : ?string
    {
        return $this->editPriceGroup;
    }

    /**
     * Get PriceGroup_Name.
     *
     * @return string
     */
    public function getPriceGroupName() : ?string
    {
        return $this->priceGroupName;
    }

    /**
     * Get Assigned.
     *
     * @return bool
     */
    public function getAssigned() : ?bool
    {
        return $this->assigned;
    }

    /**
     * Set Product_ID.
     *
     * @param ?int $productId
     * @return $this
     */
    public function setProductId(?int $productId) : self
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Set Edit_Product.
     *
     * @param ?string $editProduct
     * @return $this
     */
    public function setEditProduct(?string $editProduct) : self
    {
        $this->editProduct = $editProduct;

        return $this;
    }

    /**
     * Set Product_Code.
     *
     * @param ?string $productCode
     * @return $this
     */
    public function setProductCode(?string $productCode) : self
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * Set PriceGroup_ID.
     *
     * @param ?int $priceGroupId
     * @return $this
     */
    public function setPriceGroupId(?int $priceGroupId) : self
    {
        $this->priceGroupId = $priceGroupId;

        return $this;
    }

    /**
     * Set Edit_PriceGroup.
     *
     * @param ?string $editPriceGroup
     * @return $this
     */
    public function setEditPriceGroup(?string $editPriceGroup) : self
    {
        $this->editPriceGroup = $editPriceGroup;

        return $this;
    }

    /**
     * Set PriceGroup_Name.
     *
     * @param ?string $priceGroupName
     * @return $this
     */
    public function setPriceGroupName(?string $priceGroupName) : self
    {
        $this->priceGroupName = $priceGroupName;

        return $this;
    }

    /**
     * Set Assigned.
     *
     * @param ?bool $assigned
     * @return $this
     */
    public function setAssigned(?bool $assigned) : self
    {
        $this->assigned = $assigned;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPriceGroupId()) {
            $data['PriceGroup_ID'] = $this->getPriceGroupId();
        } else if ($this->getEditPriceGroup()) {
            $data['Edit_PriceGroup'] = $this->getEditPriceGroup();
        } else if ($this->getPriceGroupName()) {
            $data['PriceGroup_Name'] = $this->getPriceGroupName();
        }

        if ($this->getProductId()) {
            $data['Product_ID'] = $this->getProductId();
        } else if ($this->getEditProduct()) {
            $data['Edit_Product'] = $this->getEditProduct();
        } else if ($this->getProductCode()) {
            $data['Product_Code'] = $this->getProductCode();
        }

        $data['PriceGroup_Name'] = $this->getPriceGroupName();

        if (!is_null($this->getAssigned())) {
            $data['Assigned'] = $this->getAssigned();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PriceGroupQualifyingProductUpdateAssigned($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\Model\Order;
use MerchantAPI\Model\OrderPaymentAuthorize;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request Order_Authorize.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/order_authorize
 */
class OrderAuthorize extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Order_Authorize';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var ?int */
    protected ?int $moduleId = null;

    /** @var ?string */
    protected ?string $moduleData = null;

    /** @var ?float */
    protected ?float $amount = null;

    /** @var array */
    protected array $moduleFields = [];

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
    {
        parent::__construct($client);
        if ($order) {
            if ($order->getId()) {
                $this->setOrderId($order->getId());
            }
        }
    }

    /**
     * Get Order_ID.
     *
     * @return int
     */
    public function getOrderId() : ?int
    {
        return $this->orderId;
    }

    /**
     * Get Module_ID.
     *
     * @return int
     */
    public function getModuleId() : ?int
    {
        return $this->moduleId;
    }

    /**
     * Get Module_Data.
     *
     * @return string
     */
    public function getModuleData() : ?string
    {
        return $this->moduleData;
    }

    /**
     * Get Amount.
     *
     * @return float
     */
    public function getAmount() : ?float
    {
        return $this->amount;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields() : ?array
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     *
     * @param string
     * @param mixed
     */
    public function getModuleField(string $field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
    }

    /**
     * Set Order_ID.
     *
     * @param ?int $orderId
     * @return $this
     */
    public function setOrderId(?int $orderId) : self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Module_ID.
     *
     * @param ?int $moduleId
     * @return $this
     */
    public function setModuleId(?int $moduleId) : self
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Set Module_Data.
     *
     * @param ?string $moduleData
     * @return $this
     */
    public function setModuleData(?string $moduleData) : self
    {
        $this->moduleData = $moduleData;

        return $this;
    }

    /**
     * Set Amount.
     *
     * @param ?float $amount
     * @return $this
     */
    public function setAmount(?float $amount) : self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array $moduleFields
     * @return $this
     */
    public function setModuleFields(array $moduleFields) : self
    {
        $this->moduleFields = $moduleFields;

        return $this;
    }

    /**
     * Add custom data to the request.
     *
     * @param string
     * @param mixed
     * @return $this
     */
    public function setModuleField(string $field, $value) : self
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = array_merge(parent::toArray(), $this->getModuleFields());

        if ($this->getOrderId()) {
            $data['Order_ID'] = $this->getOrderId();
        }

        if (!is_null($this->getModuleId())) {
            $data['Module_ID'] = $this->getModuleId();
        }

        if (!is_null($this->getModuleData())) {
            $data['Module_Data'] = $this->getModuleData();
        }

        $data['Amount'] = $this->getAmount();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderAuthorize($this, $httpResponse, $data);
    }
}
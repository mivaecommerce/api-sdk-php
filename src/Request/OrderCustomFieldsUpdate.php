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
use MerchantAPI\Model\CustomFieldValues;
use MerchantAPI\Model\Order;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request OrderCustomFields_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/ordercustomfields_update
 */
class OrderCustomFieldsUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderCustomFields_Update';

    /** @var ?int */
    protected ?int $orderId = null;

    /** @var \MerchantAPI\Model\CustomFieldValues|null */
    protected ?CustomFieldValues $customFieldValues = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Order $order
     */
    public function __construct(?BaseClient $client = null, ?Order $order = null)
    {
        parent::__construct($client);
        $this->customFieldValues = new CustomFieldValues();

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
     * Get CustomField_Values.
     *
     * @return ?CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->customFieldValues;
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
     * Set CustomField_Values.
     *
     * @param \MerchantAPI\Model\CustomFieldValues|array $customFieldValues
     * @return $this
     */
    public function setCustomFieldValues($customFieldValues) : self
    {
        if (is_array($customFieldValues)) {
            $customFieldValues = new CustomFieldValues($customFieldValues);
        } else if (!$customFieldValues instanceof CustomFieldValues) {
            throw new \InvalidArgumentException(sprintf('Expected instance of CustomFieldValues or an array but got %s',
                is_object($customFieldValues) ? get_class($customFieldValues) : gettype($customFieldValues)));
        }

        $this->customFieldValues = $customFieldValues;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getOrderId()) {
            $data['Order_ID'] = $this->getOrderId();
        }

        if ($this->getCustomFieldValues()) {
            $data['CustomField_Values'] = $this->getCustomFieldValues()->getData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderCustomFieldsUpdate($this, $httpResponse, $data);
    }
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Order;
use MerchantAPI\Model\OrderPaymentAuthorize;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Order_Authorize';

    /** @var int */
    protected $orderId;

    /** @var int */
    protected $moduleId;

    /** @var string */
    protected $moduleData;

    /** @var float */
    protected $amount;

    /** @var array */
    protected $moduleFields = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Order
     */
    public function __construct(Order $order = null)
    {
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
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get Module_ID.
     *
     * @return int
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * Get Module_Data.
     *
     * @return string
     */
    public function getModuleData()
    {
        return $this->moduleData;
    }

    /**
     * Get Amount.
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get Module_Fields.
     *
     * @return array
     */
    public function getModuleFields()
    {
        return $this->moduleFields;
    }

    /**
     * Get custom data from the request.
     * 
     * @param string
     * @param mixed
     */
    public function getModuleField($field, $defaultValue = null)
    {
        return isset($this->moduleFields[$field]) ?
            $this->moduleFields[$field] : $defaultValue;
    }

    /**
     * Set Order_ID.
     *
     * @param int
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Set Module_ID.
     *
     * @param int
     * @return $this
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Set Module_Data.
     *
     * @param string
     * @return $this
     */
    public function setModuleData($moduleData)
    {
        $this->moduleData = $moduleData;

        return $this;
    }

    /**
     * Set Amount.
     *
     * @param float
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Set Module_Fields.
     *
     * @param array
     * @return $this
     */
    public function setModuleFields(array $moduleFields)
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
    public function setModuleField($field, $value)
    {
        $this->moduleFields[$field] = $value;
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\OrderAuthorize($this, $httpResponse, $data);
    }
}
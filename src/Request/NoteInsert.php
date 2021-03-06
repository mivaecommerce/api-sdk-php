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
use MerchantAPI\BaseClient;

/**
 * Handles API Request Note_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/note_insert
 */
class NoteInsert extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Note_Insert';

    /** @var string */
    protected $noteText;

    /** @var int */
    protected $customerId;

    /** @var int */
    protected $accountId;

    /** @var int */
    protected $orderId;

    /**
     * Get NoteText.
     *
     * @return string
     */
    public function getNoteText()
    {
        return $this->noteText;
    }

    /**
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Get Account_ID.
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->accountId;
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
     * Set NoteText.
     *
     * @param string
     * @return $this
     */
    public function setNoteText($noteText)
    {
        $this->noteText = $noteText;

        return $this;
    }

    /**
     * Set Customer_ID.
     *
     * @param int
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Account_ID.
     *
     * @param int
     * @return $this
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
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
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['NoteText'] = $this->getNoteText();

        if (!is_null($this->getCustomerId())) {
            $data['Customer_ID'] = $this->getCustomerId();
        }

        if (!is_null($this->getAccountId())) {
            $data['Account_ID'] = $this->getAccountId();
        }

        if (!is_null($this->getOrderId())) {
            $data['Order_ID'] = $this->getOrderId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\NoteInsert($this, $httpResponse, $data);
    }
}
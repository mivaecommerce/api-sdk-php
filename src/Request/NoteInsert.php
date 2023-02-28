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
use MerchantAPI\Model\Note;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Note_Insert';

    /** @var ?string */
    protected ?string $noteText = null;

    /** @var ?int */
    protected ?int $customerId = null;

    /** @var ?int */
    protected ?int $accountId = null;

    /** @var ?int */
    protected ?int $orderId = null;

    /**
     * Get NoteText.
     *
     * @return string
     */
    public function getNoteText() : ?string
    {
        return $this->noteText;
    }

    /**
     * Get Customer_ID.
     *
     * @return int
     */
    public function getCustomerId() : ?int
    {
        return $this->customerId;
    }

    /**
     * Get Account_ID.
     *
     * @return int
     */
    public function getAccountId() : ?int
    {
        return $this->accountId;
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
     * Set NoteText.
     *
     * @param ?string $noteText
     * @return $this
     */
    public function setNoteText(?string $noteText) : self
    {
        $this->noteText = $noteText;

        return $this;
    }

    /**
     * Set Customer_ID.
     *
     * @param ?int $customerId
     * @return $this
     */
    public function setCustomerId(?int $customerId) : self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set Account_ID.
     *
     * @param ?int $accountId
     * @return $this
     */
    public function setAccountId(?int $accountId) : self
    {
        $this->accountId = $accountId;

        return $this;
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
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\NoteInsert($this, $httpResponse, $data);
    }
}
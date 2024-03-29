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
 * Handles API Request Note_Update.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/note_update
 */
class NoteUpdate extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Note_Update';

    /** @var ?int */
    protected ?int $noteId = null;

    /** @var ?string */
    protected ?string $noteText = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Note $note
     */
    public function __construct(?BaseClient $client = null, ?Note $note = null)
    {
        parent::__construct($client);
        if ($note) {
            $this->setNoteId($note->getId());
            $this->setNoteText($note->getNoteText());
        }
    }

    /**
     * Get Note_ID.
     *
     * @return int
     */
    public function getNoteId() : ?int
    {
        return $this->noteId;
    }

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
     * Set Note_ID.
     *
     * @param ?int $noteId
     * @return $this
     */
    public function setNoteId(?int $noteId) : self
    {
        $this->noteId = $noteId;

        return $this;
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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Note_ID'] = $this->getNoteId();

        $data['NoteText'] = $this->getNoteText();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\NoteUpdate($this, $httpResponse, $data);
    }
}
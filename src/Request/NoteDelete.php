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
 * Handles API Request Note_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/note_delete
 */
class NoteDelete extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Note_Delete';

    /** @var ?int */
    protected ?int $noteId = null;

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
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Note_ID'] = $this->getNoteId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\NoteDelete($this, $httpResponse, $data);
    }
}
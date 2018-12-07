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
use MerchantAPI\Model\Note;

/**
 * Handles API Request Note_Delete.
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/note_delete
 */
class NoteDelete extends Request
{
    /** @var string The API function name */
    protected $function = 'Note_Delete';

    /** @var int */
    protected $noteId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Note
     */
    public function __construct(Note $note = null)
    {
        if ($note) {
            $this->setNoteId($note->getId());
        }
    }

    /**
     * Get Note_ID.
     *
     * @return int
     */
    public function getNoteId()
    {
        return $this->noteId;
    }

    /**
     * Set Note_ID.
     *
     * @param int
     * @return $this
     */
    public function setNoteId($noteId)
    {
        $this->noteId = $noteId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = [];

        $data['Note_ID'] = $this->getNoteId();

        if (!is_null($this->getStoreCode())) {
            $data['Store_Code'] = $this->getStoreCode();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\NoteDelete($this, $httpResponse, $data);
    }
}
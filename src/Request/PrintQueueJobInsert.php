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
use MerchantAPI\Model\PrintQueue;
use MerchantAPI\Model\PrintQueueJob;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PrintQueueJob_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/printqueuejob_insert
 */
class PrintQueueJobInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PrintQueueJob_Insert';

    /** @var ?int */
    protected ?int $printQueueId = null;

    /** @var ?string */
    protected ?string $editPrintQueue = null;

    /** @var ?string */
    protected ?string $printQueueDescription = null;

    /** @var ?string */
    protected ?string $printQueueJobDescription = null;

    /** @var ?string */
    protected ?string $printQueueJobFormat = null;

    /** @var ?string */
    protected ?string $printQueueJobData = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PrintQueue $printQueue
     */
    public function __construct(?BaseClient $client = null, ?PrintQueue $printQueue = null)
    {
        parent::__construct($client);
        if ($printQueue) {
            if ($printQueue->getId()) {
                $this->setPrintQueueId($printQueue->getId());
            } else if ($printQueue->getDescription()) {
                $this->setEditPrintQueue($printQueue->getDescription());
            }
        }
    }

    /**
     * Get PrintQueue_ID.
     *
     * @return int
     */
    public function getPrintQueueId() : ?int
    {
        return $this->printQueueId;
    }

    /**
     * Get Edit_PrintQueue.
     *
     * @return string
     */
    public function getEditPrintQueue() : ?string
    {
        return $this->editPrintQueue;
    }

    /**
     * Get PrintQueue_Description.
     *
     * @return string
     */
    public function getPrintQueueDescription() : ?string
    {
        return $this->printQueueDescription;
    }

    /**
     * Get PrintQueueJob_Description.
     *
     * @return string
     */
    public function getPrintQueueJobDescription() : ?string
    {
        return $this->printQueueJobDescription;
    }

    /**
     * Get PrintQueueJob_Format.
     *
     * @return string
     */
    public function getPrintQueueJobFormat() : ?string
    {
        return $this->printQueueJobFormat;
    }

    /**
     * Get PrintQueueJob_Data.
     *
     * @return string
     */
    public function getPrintQueueJobData() : ?string
    {
        return $this->printQueueJobData;
    }

    /**
     * Set PrintQueue_ID.
     *
     * @param ?int $printQueueId
     * @return $this
     */
    public function setPrintQueueId(?int $printQueueId) : self
    {
        $this->printQueueId = $printQueueId;

        return $this;
    }

    /**
     * Set Edit_PrintQueue.
     *
     * @param ?string $editPrintQueue
     * @return $this
     */
    public function setEditPrintQueue(?string $editPrintQueue) : self
    {
        $this->editPrintQueue = $editPrintQueue;

        return $this;
    }

    /**
     * Set PrintQueue_Description.
     *
     * @param ?string $printQueueDescription
     * @return $this
     */
    public function setPrintQueueDescription(?string $printQueueDescription) : self
    {
        $this->printQueueDescription = $printQueueDescription;

        return $this;
    }

    /**
     * Set PrintQueueJob_Description.
     *
     * @param ?string $printQueueJobDescription
     * @return $this
     */
    public function setPrintQueueJobDescription(?string $printQueueJobDescription) : self
    {
        $this->printQueueJobDescription = $printQueueJobDescription;

        return $this;
    }

    /**
     * Set PrintQueueJob_Format.
     *
     * @param ?string $printQueueJobFormat
     * @return $this
     */
    public function setPrintQueueJobFormat(?string $printQueueJobFormat) : self
    {
        $this->printQueueJobFormat = $printQueueJobFormat;

        return $this;
    }

    /**
     * Set PrintQueueJob_Data.
     *
     * @param ?string $printQueueJobData
     * @return $this
     */
    public function setPrintQueueJobData(?string $printQueueJobData) : self
    {
        $this->printQueueJobData = $printQueueJobData;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if ($this->getPrintQueueId()) {
            $data['PrintQueue_ID'] = $this->getPrintQueueId();
        } else if ($this->getEditPrintQueue()) {
            $data['Edit_PrintQueue'] = $this->getEditPrintQueue();
        } else if ($this->getPrintQueueDescription()) {
            $data['PrintQueue_Description'] = $this->getPrintQueueDescription();
        }

        if (!is_null($this->getPrintQueueJobDescription())) {
            $data['PrintQueueJob_Description'] = $this->getPrintQueueJobDescription();
        }

        if (!is_null($this->getPrintQueueJobFormat())) {
            $data['PrintQueueJob_Format'] = $this->getPrintQueueJobFormat();
        }

        if (!is_null($this->getPrintQueueJobData())) {
            $data['PrintQueueJob_Data'] = $this->getPrintQueueJobData();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PrintQueueJobInsert($this, $httpResponse, $data);
    }
}
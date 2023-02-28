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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\PrintQueue;
use MerchantAPI\Model\PrintQueueJob;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PrintQueueJobList_Load_Query.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/printqueuejoblist_load_query
 */
class PrintQueueJobListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected string $function = 'PrintQueueJobList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'queue_id',
        'store_id',
        'user_id',
        'descrip',
        'job_fmt',
        'job_data',
        'dt_created',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'queue_id',
        'store_id',
        'user_id',
        'descrip',
        'job_fmt',
        'job_data',
        'dt_created',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'job_data',
    ];

    /** @var ?int */
    protected ?int $printQueueId = null;

    /** @var ?string */
    protected ?string $editPrintQueue = null;

    /** @var ?string */
    protected ?string $printQueueDescription = null;

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

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PrintQueueJobListLoadQuery($this, $httpResponse, $data);
    }
}
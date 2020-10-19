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
    protected $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected $function = 'PrintQueueJobList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
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
    protected $availableSortFields = [
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
    protected $availableOnDemandColumns = [
        'job_data',
    ];

    /** @var int */
    protected $printQueueId;

    /** @var string */
    protected $editPrintQueue;

    /** @var string */
    protected $printQueueDescription;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\PrintQueue
     */
    public function __construct(BaseClient $client = null, PrintQueue $printQueue = null)
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
    public function getPrintQueueId()
    {
        return $this->printQueueId;
    }

    /**
     * Get Edit_PrintQueue.
     *
     * @return string
     */
    public function getEditPrintQueue()
    {
        return $this->editPrintQueue;
    }

    /**
     * Get PrintQueue_Description.
     *
     * @return string
     */
    public function getPrintQueueDescription()
    {
        return $this->printQueueDescription;
    }

    /**
     * Set PrintQueue_ID.
     *
     * @param int
     * @return $this
     */
    public function setPrintQueueId($printQueueId)
    {
        $this->printQueueId = $printQueueId;

        return $this;
    }

    /**
     * Set Edit_PrintQueue.
     *
     * @param string
     * @return $this
     */
    public function setEditPrintQueue($editPrintQueue)
    {
        $this->editPrintQueue = $editPrintQueue;

        return $this;
    }

    /**
     * Set PrintQueue_Description.
     *
     * @param string
     * @return $this
     */
    public function setPrintQueueDescription($printQueueDescription)
    {
        $this->printQueueDescription = $printQueueDescription;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PrintQueueJobListLoadQuery($this, $httpResponse, $data);
    }
}
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
use MerchantAPI\BaseClient;

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
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PrintQueueJob_Insert';

    /** @var int */
    protected $printQueueId;

    /** @var string */
    protected $editPrintQueue;

    /** @var string */
    protected $printQueueDescription;

    /** @var string */
    protected $printQueueJobDescription;

    /** @var string */
    protected $printQueueJobFormat;

    /** @var string */
    protected $printQueueJobData;

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
     * Get PrintQueueJob_Description.
     *
     * @return string
     */
    public function getPrintQueueJobDescription()
    {
        return $this->printQueueJobDescription;
    }

    /**
     * Get PrintQueueJob_Format.
     *
     * @return string
     */
    public function getPrintQueueJobFormat()
    {
        return $this->printQueueJobFormat;
    }

    /**
     * Get PrintQueueJob_Data.
     *
     * @return string
     */
    public function getPrintQueueJobData()
    {
        return $this->printQueueJobData;
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
     * Set PrintQueueJob_Description.
     *
     * @param string
     * @return $this
     */
    public function setPrintQueueJobDescription($printQueueJobDescription)
    {
        $this->printQueueJobDescription = $printQueueJobDescription;

        return $this;
    }

    /**
     * Set PrintQueueJob_Format.
     *
     * @param string
     * @return $this
     */
    public function setPrintQueueJobFormat($printQueueJobFormat)
    {
        $this->printQueueJobFormat = $printQueueJobFormat;

        return $this;
    }

    /**
     * Set PrintQueueJob_Data.
     *
     * @param string
     * @return $this
     */
    public function setPrintQueueJobData($printQueueJobData)
    {
        $this->printQueueJobData = $printQueueJobData;

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
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PrintQueueJobInsert($this, $httpResponse, $data);
    }
}
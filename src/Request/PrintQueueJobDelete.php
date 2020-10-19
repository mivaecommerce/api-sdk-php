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
use MerchantAPI\Model\PrintQueueJob;
use MerchantAPI\BaseClient;

/**
 * Handles API Request PrintQueueJob_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/printqueuejob_delete
 */
class PrintQueueJobDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'PrintQueueJob_Delete';

    /** @var int */
    protected $printQueueJobId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\PrintQueueJob
     */
    public function __construct(BaseClient $client = null, PrintQueueJob $printQueueJob = null)
    {
        parent::__construct($client);
        if ($printQueueJob) {
            if ($printQueueJob->getId()) {
                $this->setPrintQueueJobId($printQueueJob->getId());
            }
        }
    }

    /**
     * Get PrintQueueJob_ID.
     *
     * @return int
     */
    public function getPrintQueueJobId()
    {
        return $this->printQueueJobId;
    }

    /**
     * Set PrintQueueJob_ID.
     *
     * @param int
     * @return $this
     */
    public function setPrintQueueJobId($printQueueJobId)
    {
        $this->printQueueJobId = $printQueueJobId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getPrintQueueJobId()) {
            $data['PrintQueueJob_ID'] = $this->getPrintQueueJobId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\PrintQueueJobDelete($this, $httpResponse, $data);
    }
}
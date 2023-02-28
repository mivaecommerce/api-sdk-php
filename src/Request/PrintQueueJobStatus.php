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
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request PrintQueueJob_Status.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/printqueuejob_status
 */
class PrintQueueJobStatus extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'PrintQueueJob_Status';

    /** @var ?int */
    protected ?int $printQueueJobId = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\PrintQueueJob $printQueueJob
     */
    public function __construct(?BaseClient $client = null, ?PrintQueueJob $printQueueJob = null)
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
    public function getPrintQueueJobId() : ?int
    {
        return $this->printQueueJobId;
    }

    /**
     * Set PrintQueueJob_ID.
     *
     * @param ?int $printQueueJobId
     * @return $this
     */
    public function setPrintQueueJobId(?int $printQueueJobId) : self
    {
        $this->printQueueJobId = $printQueueJobId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\PrintQueueJobStatus($this, $httpResponse, $data);
    }
}
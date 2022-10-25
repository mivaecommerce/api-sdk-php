<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\PrintQueueJob;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PrintQueueJob_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/printqueuejob_insert
 */
class PrintQueueJobInsert extends Response
{
    /** @var \MerchantAPI\Model\PrintQueueJob */
    protected $printQueueJob;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->printQueueJob = new PrintQueueJob($this->data['data']);
    }

    /**
     * Get printQueueJob.
     *
     * @return \MerchantAPI\Model\PrintQueueJob|null
     */
    public function getPrintQueueJob()
    {
        return $this->printQueueJob;
    }
}
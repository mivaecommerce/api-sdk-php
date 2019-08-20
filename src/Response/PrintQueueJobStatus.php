<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: PrintQueueJobStatus.php 77409 2019-08-16 17:35:47Z gidriss $
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;

/**
 * API Response for PrintQueueJob_Status.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/printqueuejob_status
 */
class PrintQueueJobStatus extends Response
{
    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        if (isset($this->data['data']['status'])) {
            return $this->data['data']['status'];
        }

        return null;
    }
}
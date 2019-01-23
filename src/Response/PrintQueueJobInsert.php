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

namespace MerchantAPI\Response;

use MerchantAPI\Response;

/**
 * API Response for PrintQueueJob_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/printqueuejob_insert
 */
class PrintQueueJobInsert extends Response
{

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        if (isset($this->data['data']['id'])) {
            return $this->data['data']['id'];
        }

        return null;
    }
}
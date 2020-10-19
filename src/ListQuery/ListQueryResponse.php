<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\ListQuery;

use MerchantAPI\Response;

/**
 * Class ListQueryResponse. Abstract.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview
 */
abstract class ListQueryResponse extends Response implements ListQueryResponseInterface
{
    /**
     * @return mixed
     */
    public function getTotalCount()
    {
        return isset($this->data['data']['total_count']) ?
            $this->data['data']['total_count'] : 0;
    }

    /**
     * @return mixed
     */
    public function getStartOffset()
    {
        return isset($this->data['data']['start_offset']) ?
            $this->data['data']['start_offset'] : 0;
    }
}
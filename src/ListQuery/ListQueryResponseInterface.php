<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: ListQueryResponseInterface.php 71531 2018-11-14 01:18:10Z gidriss $
 */

namespace MerchantAPI\ListQuery;

/**
 * Abstract response class for use with *List_Load_Query functions.
 *
 * @package MerchantAPI\ListQuery
 * @see https://docs.miva.com/json-api/list-load-query-overview
 */
interface ListQueryResponseInterface
{
    /**
     * Get the total count found for given search.
     *
     * @return int
     */
    public function getTotalCount();


    /**
     * Get the starting offset of the response results.
     *
     * @return int
     */
    public function getStartOffset();
}
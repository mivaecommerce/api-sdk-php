<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Model;

/**
 * Data model for ProductSubscriptionTermDate.
 *
 * @package MerchantAPI\Model
 */
class ProductSubscriptionTermDate extends \MerchantAPI\Model
{
    /**
     * Get subterm_id.
     *
     * @return ?int
     */
    public function getSubscriptionTermId() : ?int
    {
        return $this->getField('subterm_id');
    }

    /**
     * Get term_dom.
     *
     * @return ?int
     */
    public function getTermDayOfMonth() : ?int
    {
        return $this->getField('term_dom');
    }

    /**
     * Get term_mon.
     *
     * @return ?int
     */
    public function getTermMonth() : ?int
    {
        return $this->getField('term_mon');
    }
}
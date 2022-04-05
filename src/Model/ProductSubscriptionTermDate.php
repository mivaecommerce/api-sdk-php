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
     * @return int
     */
    public function getSubscriptionTermId()
    {
        return (int) $this->getField('subterm_id', 0);
    }

    /**
     * Get term_dom.
     *
     * @return int
     */
    public function getTermDayOfMonth()
    {
        return (int) $this->getField('term_dom', 0);
    }

    /**
     * Get term_mon.
     *
     * @return int
     */
    public function getTermMonth()
    {
        return (int) $this->getField('term_mon', 0);
    }
}
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
 * Data model for ProductAndSubscriptionTerm.
 *
 * @package MerchantAPI\Model
 */
class ProductAndSubscriptionTerm extends Product
{
    /**
     * Get term_id.
     *
     * @return int
     */
    public function getTermId()
    {
        return (int) $this->getField('term_id', 0);
    }

    /**
     * Get term_frequency.
     *
     * @return string
     */
    public function getTermFrequency()
    {
        return $this->getField('term_frequency');
    }

    /**
     * Get term_term.
     *
     * @return int
     */
    public function getTermTerm()
    {
        return (int) $this->getField('term_term', 0);
    }

    /**
     * Get term_descrip.
     *
     * @return string
     */
    public function getTermDescription()
    {
        return $this->getField('term_descrip');
    }

    /**
     * Get term_n.
     *
     * @return int
     */
    public function getTermN()
    {
        return (int) $this->getField('term_n', 0);
    }

    /**
     * Get term_fixed_dow.
     *
     * @return int
     */
    public function getTermFixedDayOfWeek()
    {
        return (int) $this->getField('term_fixed_dow', 0);
    }

    /**
     * Get term_fixed_dom.
     *
     * @return int
     */
    public function getTermFixedDayOfMonth()
    {
        return (int) $this->getField('term_fixed_dom', 0);
    }

    /**
     * Get term_sub_count.
     *
     * @return int
     */
    public function getTermSubscriptionCount()
    {
        return (int) $this->getField('term_sub_count', 0);
    }
}
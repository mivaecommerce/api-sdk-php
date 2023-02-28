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
     * @return ?int
     */
    public function getTermId() : ?int
    {
        return $this->getField('term_id');
    }

    /**
     * Get term_frequency.
     *
     * @return ?string
     */
    public function getTermFrequency() : ?string
    {
        return $this->getField('term_frequency');
    }

    /**
     * Get term_term.
     *
     * @return ?int
     */
    public function getTermTerm() : ?int
    {
        return $this->getField('term_term');
    }

    /**
     * Get term_descrip.
     *
     * @return ?string
     */
    public function getTermDescription() : ?string
    {
        return $this->getField('term_descrip');
    }

    /**
     * Get term_n.
     *
     * @return ?int
     */
    public function getTermN() : ?int
    {
        return $this->getField('term_n');
    }

    /**
     * Get term_fixed_dow.
     *
     * @return ?int
     */
    public function getTermFixedDayOfWeek() : ?int
    {
        return $this->getField('term_fixed_dow');
    }

    /**
     * Get term_fixed_dom.
     *
     * @return ?int
     */
    public function getTermFixedDayOfMonth() : ?int
    {
        return $this->getField('term_fixed_dom');
    }

    /**
     * Get term_sub_count.
     *
     * @return ?int
     */
    public function getTermSubscriptionCount() : ?int
    {
        return $this->getField('term_sub_count');
    }
}
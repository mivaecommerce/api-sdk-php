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

namespace MerchantAPI\Model;

/**
 * Data model for ProductSubscriptionTerm.
 *
 * @package MerchantAPI\Model
 */
class ProductSubscriptionTerm extends \MerchantAPI\Model
{
    /** @var string TERM_FREQUENCY_N_DAYS */
    const TERM_FREQUENCY_N_DAYS = 'n';

    /** @var string TERM_FREQUENCY_N_MONTHS */
    const TERM_FREQUENCY_N_MONTHS = 'n_months';

    /** @var string TERM_FREQUENCY_DAILY */
    const TERM_FREQUENCY_DAILY = 'daily';

    /** @var string TERM_FREQUENCY_WEEKLY */
    const TERM_FREQUENCY_WEEKLY = 'weekly';

    /** @var string TERM_FREQUENCY_BIWEEKLY */
    const TERM_FREQUENCY_BIWEEKLY = 'biweekly';

    /** @var string TERM_FREQUENCY_QUARTERLY */
    const TERM_FREQUENCY_QUARTERLY = 'quarterly';

    /** @var string TERM_FREQUENCY_SEMIANNUALLY */
    const TERM_FREQUENCY_SEMIANNUALLY = 'semiannually';

    /** @var string TERM_FREQUENCY_ANNUALLY */
    const TERM_FREQUENCY_ANNUALLY = 'annually';

    /** @var string TERM_FREQUENCY_FIXED_WEEKLY */
    const TERM_FREQUENCY_FIXED_WEEKLY = 'fixedweekly';

    /** @var string TERM_FREQUENCY_FIXED_MONTHLY */
    const TERM_FREQUENCY_FIXED_MONTHLY = 'fixedmonthly';

    /** @var string TERM_FREQUENCY_DATES */
    const TERM_FREQUENCY_DATES = 'dates';

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get frequency.
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->getField('frequency');
    }

    /**
     * Get term.
     *
     * @return int
     */
    public function getTerm()
    {
        return (int) $this->getField('term', 0);
    }

    /**
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get n.
     *
     * @return int
     */
    public function getN()
    {
        return (int) $this->getField('n', 0);
    }

    /**
     * Get fixed_dow.
     *
     * @return int
     */
    public function getFixedDayOfWeek()
    {
        return (int) $this->getField('fixed_dow', 0);
    }

    /**
     * Get fixed_dom.
     *
     * @return int
     */
    public function getFixedDayOfMonth()
    {
        return (int) $this->getField('fixed_dom', 0);
    }

    /**
     * Get sub_count.
     *
     * @return int
     */
    public function getSubscriptionCount()
    {
        return (int) $this->getField('sub_count', 0);
    }
}
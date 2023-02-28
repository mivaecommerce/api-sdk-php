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

use MerchantAPI\Collection;

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

    /** @var string TERM_FREQUENCY_MONTHLY */
    const TERM_FREQUENCY_MONTHLY = 'monthly';

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('dates', new Collection());

        if (isset($data['dates']) && is_array($data['dates'])) {
            $dates = new Collection();

            foreach($data['dates'] as $e) {
                if ($e instanceof ProductSubscriptionTermDate) {
                    $dates[] = $e;
                } else if (is_array($e)) {
                    $dates[] = new ProductSubscriptionTermDate($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductSubscriptionTermDate or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('dates', $dates);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['dates']) && is_array($this->data['dates'])) {
            if ($this->data['dates'] instanceof Collection) {
                $this->data['dates'] = clone $this->data['dates'];
            } else {
                foreach($this->data['dates'] as $i => $e) {
                    if ($e instanceof ProductSubscriptionTermDate) {
                        $this->data['dates'][$i] = clone $this->data['dates'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get frequency.
     *
     * @return ?string
     */
    public function getFrequency() : ?string
    {
        return $this->getField('frequency');
    }

    /**
     * Get term.
     *
     * @return ?int
     */
    public function getTerm() : ?int
    {
        return $this->getField('term');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get n.
     *
     * @return ?int
     */
    public function getN() : ?int
    {
        return $this->getField('n');
    }

    /**
     * Get fixed_dow.
     *
     * @return ?int
     */
    public function getFixedDayOfWeek() : ?int
    {
        return $this->getField('fixed_dow');
    }

    /**
     * Get fixed_dom.
     *
     * @return ?int
     */
    public function getFixedDayOfMonth() : ?int
    {
        return $this->getField('fixed_dom');
    }

    /**
     * Get sub_count.
     *
     * @return ?int
     */
    public function getSubscriptionCount() : ?int
    {
        return $this->getField('sub_count');
    }

    /**
     * Get dates.
     *
     * @return \MerchantAPI\Collection
     */
    public function getDates() : ?Collection
    {
        return $this->getField('dates');
    }

    /**
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        return $this->getField('disp_order');
    }
}
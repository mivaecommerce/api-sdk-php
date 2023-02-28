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
 * Data model for PriceGroup.
 *
 * @package MerchantAPI\Model
 */
class PriceGroup extends \MerchantAPI\Model
{
    /** @var string ELIGIBILITY_COUPON */
    const ELIGIBILITY_COUPON = 'C';

    /** @var string ELIGIBILITY_ALL */
    const ELIGIBILITY_ALL = 'A';

    /** @var string ELIGIBILITY_CUSTOMER */
    const ELIGIBILITY_CUSTOMER = 'X';

    /** @var string ELIGIBILITY_LOGGED_IN */
    const ELIGIBILITY_LOGGED_IN = 'L';

    /** @var string DISCOUNT_TYPE_RETAIL */
    const DISCOUNT_TYPE_RETAIL = 'R';

    /** @var string DISCOUNT_TYPE_COST */
    const DISCOUNT_TYPE_COST = 'C';

    /** @var string DISCOUNT_TYPE_DISCOUNT_RETAIL */
    const DISCOUNT_TYPE_DISCOUNT_RETAIL = 'D';

    /** @var string DISCOUNT_TYPE_MARKUP_COST */
    const DISCOUNT_TYPE_MARKUP_COST = 'M';

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['module'])) {
            if ($data['module'] instanceof Module) {
                $this->setField('module', $data['module']);
            } else if (is_array($data['module'])) {
                $this->setField('module', new Module($data['module']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Module or an array but got %s',
                    is_object($data['module']) ?
                        get_class($data['module']) : gettype($data['module'])));
            }
        }

        if (isset($data['capabilities'])) {
            if ($data['capabilities'] instanceof DiscountModuleCapabilities) {
                $this->setField('capabilities', $data['capabilities']);
            } else if (is_array($data['capabilities'])) {
                $this->setField('capabilities', new DiscountModuleCapabilities($data['capabilities']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected DiscountModuleCapabilities or an array but got %s',
                    is_object($data['capabilities']) ?
                        get_class($data['capabilities']) : gettype($data['capabilities'])));
            }
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['module'])) {
            if ($this->data['module'] instanceof Module) {
                $this->data['module'] = clone $this->data['module'];
            }
        }

        if (isset($data['capabilities'])) {
            if ($this->data['capabilities'] instanceof DiscountModuleCapabilities) {
                $this->data['capabilities'] = clone $this->data['capabilities'];
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
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get custscope.
     *
     * @return ?string
     */
    public function getCustomerScope() : ?string
    {
        return $this->getField('custscope');
    }

    /**
     * Get rate.
     *
     * @return ?string
     */
    public function getRate() : ?string
    {
        return $this->getField('rate');
    }

    /**
     * Get discount.
     *
     * @return ?float
     */
    public function getDiscount() : ?float
    {
        return $this->getField('discount');
    }

    /**
     * Get markup.
     *
     * @return ?float
     */
    public function getMarkup() : ?float
    {
        return $this->getField('markup');
    }

    /**
     * Get dt_start.
     *
     * @return ?int
     */
    public function getDateTimeStart() : ?int
    {
        return $this->getTimestampField('dt_start');
    }

    /**
     * Get dt_end.
     *
     * @return ?int
     */
    public function getDateTimeEnd() : ?int
    {
        return $this->getTimestampField('dt_end');
    }

    /**
     * Get qmn_subtot.
     *
     * @return ?float
     */
    public function getMinimumSubtotal() : ?float
    {
        return $this->getField('qmn_subtot');
    }

    /**
     * Get qmx_subtot.
     *
     * @return ?float
     */
    public function getMaximumSubtotal() : ?float
    {
        return $this->getField('qmx_subtot');
    }

    /**
     * Get qmn_quan.
     *
     * @return ?int
     */
    public function getMinimumQuantity() : ?int
    {
        return $this->getField('qmn_quan');
    }

    /**
     * Get qmx_quan.
     *
     * @return ?int
     */
    public function getMaximumQuantity() : ?int
    {
        return $this->getField('qmx_quan');
    }

    /**
     * Get qmn_weight.
     *
     * @return ?float
     */
    public function getMinimumWeight() : ?float
    {
        return $this->getField('qmn_weight');
    }

    /**
     * Get qmx_weight.
     *
     * @return ?float
     */
    public function getMaximumWeight() : ?float
    {
        return $this->getField('qmx_weight');
    }

    /**
     * Get bmn_subtot.
     *
     * @return ?float
     */
    public function getBasketMinimumSubtotal() : ?float
    {
        return $this->getField('bmn_subtot');
    }

    /**
     * Get bmx_subtot.
     *
     * @return ?float
     */
    public function getBasketMaximumSubtotal() : ?float
    {
        return $this->getField('bmx_subtot');
    }

    /**
     * Get bmn_quan.
     *
     * @return ?int
     */
    public function getBasketMinimumQuantity() : ?int
    {
        return $this->getField('bmn_quan');
    }

    /**
     * Get bmx_quan.
     *
     * @return ?int
     */
    public function getBasketMaximumQuantity() : ?int
    {
        return $this->getField('bmx_quan');
    }

    /**
     * Get bmn_weight.
     *
     * @return ?float
     */
    public function getBasketMinimumWeight() : ?float
    {
        return $this->getField('bmn_weight');
    }

    /**
     * Get bmx_weight.
     *
     * @return ?float
     */
    public function getBasketMaximumWeight() : ?float
    {
        return $this->getField('bmx_weight');
    }

    /**
     * Get priority.
     *
     * @return ?int
     */
    public function getPriority() : ?int
    {
        return $this->getField('priority');
    }

    /**
     * Get module.
     *
     * @return ?\MerchantAPI\Model\Module
     */
    public function getModule() : ?Module
    {
        return $this->getField('module');
    }

    /**
     * Get capabilities.
     *
     * @return ?\MerchantAPI\Model\DiscountModuleCapabilities
     */
    public function getCapabilities() : ?DiscountModuleCapabilities
    {
        return $this->getField('capabilities');
    }

    /**
     * Get exclusion.
     *
     * @return ?bool
     */
    public function getExclusion() : ?bool
    {
        return $this->getField('exclusion');
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
     * Get display.
     *
     * @return ?bool
     */
    public function getDisplay() : ?bool
    {
        return $this->getField('display');
    }
}
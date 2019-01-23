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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get custscope.
     *
     * @return string
     */
    public function getCustomerScope()
    {
        return $this->getField('custscope');
    }

    /**
     * Get discount.
     *
     * @return float
     */
    public function getDiscount()
    {
        return (float) $this->getField('discount', 0.00);
    }

    /**
     * Get markup.
     *
     * @return float
     */
    public function getMarkup()
    {
        return (float) $this->getField('markup', 0.00);
    }

    /**
     * Get dt_start.
     *
     * @return int
     */
    public function getDateTimeStart()
    {
        return (int) $this->getField('dt_start', 0);
    }

    /**
     * Get dt_end.
     *
     * @return int
     */
    public function getDateTimeEnd()
    {
        return (int) $this->getField('dt_end', 0);
    }

    /**
     * Get qmn_subtot.
     *
     * @return float
     */
    public function getMinimumSubtotal()
    {
        return (float) $this->getField('qmn_subtot', 0.00);
    }

    /**
     * Get qmx_subtot.
     *
     * @return float
     */
    public function getMaximumSubtotal()
    {
        return (float) $this->getField('qmx_subtot', 0.00);
    }

    /**
     * Get qmn_quan.
     *
     * @return int
     */
    public function getMinimumQuantity()
    {
        return (int) $this->getField('qmn_quan', 0);
    }

    /**
     * Get qmx_quan.
     *
     * @return int
     */
    public function getMaximumQuantity()
    {
        return (int) $this->getField('qmx_quan', 0);
    }

    /**
     * Get qmn_weight.
     *
     * @return float
     */
    public function getMinimumWeight()
    {
        return (float) $this->getField('qmn_weight', 0.00);
    }

    /**
     * Get qmx_weight.
     *
     * @return float
     */
    public function getMaximumWeight()
    {
        return (float) $this->getField('qmx_weight', 0.00);
    }

    /**
     * Get bmn_subtot.
     *
     * @return float
     */
    public function getBasketMinimumSubtotal()
    {
        return (float) $this->getField('bmn_subtot', 0.00);
    }

    /**
     * Get bmx_subtot.
     *
     * @return float
     */
    public function getBasketMaximumSubtotal()
    {
        return (float) $this->getField('bmx_subtot', 0.00);
    }

    /**
     * Get bmn_quan.
     *
     * @return int
     */
    public function getBasketMinimumQuantity()
    {
        return (int) $this->getField('bmn_quan', 0);
    }

    /**
     * Get bmx_quan.
     *
     * @return int
     */
    public function getBasketMaximumQuantity()
    {
        return (int) $this->getField('bmx_quan', 0);
    }

    /**
     * Get bmn_weight.
     *
     * @return float
     */
    public function getBasketMinimumWeight()
    {
        return (float) $this->getField('bmn_weight', 0.00);
    }

    /**
     * Get bmx_weight.
     *
     * @return float
     */
    public function getBasketMaximumWeight()
    {
        return (float) $this->getField('bmx_weight', 0.00);
    }

    /**
     * Get priority.
     *
     * @return int
     */
    public function getPriority()
    {
        return (int) $this->getField('priority', 0);
    }

    /**
     * Get module.
     *
     * @return \MerchantAPI\Model\Module|null
     */
    public function getModule()
    {
        return $this->getField('module', null);
    }

    /**
     * Get capabilities.
     *
     * @return \MerchantAPI\Model\DiscountModuleCapabilities|null
     */
    public function getCapabilities()
    {
        return $this->getField('capabilities', null);
    }

    /**
     * Get exclusion.
     *
     * @return bool
     */
    public function getExclusion()
    {
        return (bool) $this->getField('exclusion', false);
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
     * Get display.
     *
     * @return bool
     */
    public function getDisplay()
    {
        return (bool) $this->getField('display', false);
    }

    /**
     * Set custscope.
     *
     * @param string
     * @return $this
     */
    public function setCustomerScope($customerScope)
    {
        return $this->setField('custscope', $customerScope);
    }

    /**
     * Set discount.
     *
     * @param float
     * @return $this
     */
    public function setDiscount($discount)
    {
        return $this->setField('discount', $discount);
    }

    /**
     * Set dt_start.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeStart($dateTimeStart)
    {
        if ($dateTimeStart instanceof \DateTime) {
            return $this->setField('dt_start', $dateTimeStart->getTimestamp());
        }

        return $this->setField('dt_start', $dateTimeStart);
    }

    /**
     * Set dt_end.
     *
     * @param int|\DateTime
     * @return $this
     */
    public function setDateTimeEnd($dateTimeEnd)
    {
        if ($dateTimeEnd instanceof \DateTime) {
            return $this->setField('dt_end', $dateTimeEnd->getTimestamp());
        }

        return $this->setField('dt_end', $dateTimeEnd);
    }

    /**
     * Set qmn_subtot.
     *
     * @param float
     * @return $this
     */
    public function setMinimumSubtotal($minimumSubtotal)
    {
        return $this->setField('qmn_subtot', $minimumSubtotal);
    }

    /**
     * Set qmx_subtot.
     *
     * @param float
     * @return $this
     */
    public function setMaximumSubtotal($maximumSubtotal)
    {
        return $this->setField('qmx_subtot', $maximumSubtotal);
    }

    /**
     * Set qmn_quan.
     *
     * @param int
     * @return $this
     */
    public function setMinimumQuantity($minimumQuantity)
    {
        return $this->setField('qmn_quan', $minimumQuantity);
    }

    /**
     * Set qmx_quan.
     *
     * @param int
     * @return $this
     */
    public function setMaximumQuantity($maximumQuantity)
    {
        return $this->setField('qmx_quan', $maximumQuantity);
    }

    /**
     * Set qmn_weight.
     *
     * @param float
     * @return $this
     */
    public function setMinimumWeight($minimumWeight)
    {
        return $this->setField('qmn_weight', $minimumWeight);
    }

    /**
     * Set qmx_weight.
     *
     * @param float
     * @return $this
     */
    public function setMaximumWeight($maximumWeight)
    {
        return $this->setField('qmx_weight', $maximumWeight);
    }

    /**
     * Set bmn_subtot.
     *
     * @param float
     * @return $this
     */
    public function setBasketMinimumSubtotal($basketMinimumSubtotal)
    {
        return $this->setField('bmn_subtot', $basketMinimumSubtotal);
    }

    /**
     * Set bmx_subtot.
     *
     * @param float
     * @return $this
     */
    public function setBasketMaximumSubtotal($basketMaximumSubtotal)
    {
        return $this->setField('bmx_subtot', $basketMaximumSubtotal);
    }

    /**
     * Set bmn_quan.
     *
     * @param int
     * @return $this
     */
    public function setBasketMinimumQuantity($basketMinimumQuantity)
    {
        return $this->setField('bmn_quan', $basketMinimumQuantity);
    }

    /**
     * Set bmx_quan.
     *
     * @param int
     * @return $this
     */
    public function setBasketMaximumQuantity($basketMaximumQuantity)
    {
        return $this->setField('bmx_quan', $basketMaximumQuantity);
    }

    /**
     * Set bmn_weight.
     *
     * @param float
     * @return $this
     */
    public function setBasketMinimumWeight($basketMinimumWeight)
    {
        return $this->setField('bmn_weight', $basketMinimumWeight);
    }

    /**
     * Set bmx_weight.
     *
     * @param float
     * @return $this
     */
    public function setBasketMaximumWeight($basketMaximumWeight)
    {
        return $this->setField('bmx_weight', $basketMaximumWeight);
    }

    /**
     * Set priority.
     *
     * @param int
     * @return $this
     */
    public function setPriority($priority)
    {
        return $this->setField('priority', $priority);
    }

    /**
     * Set module.
     *
     * @param array|Module
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setModule($module)
    {
        if (is_array($module)) {
            return $this->setField('module', new Module($module));
        } else if ($module instanceof Module || is_null($module)) {
            return $this->setField('module', $module);
        } else {
            throw new \InvalidArgumentException(sprintf('Expected array, instance of Module, or null but got %s',
                is_object($module) ? get_class($module) : gettype($module)));
        }
    }

    /**
     * Set exclusion.
     *
     * @param bool
     * @return $this
     */
    public function setExclusion($exclusion)
    {
        return $this->setField('exclusion', $exclusion);
    }

    /**
     * Set descrip.
     *
     * @param string
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setField('descrip', $description);
    }

    /**
     * Set display.
     *
     * @param bool
     * @return $this
     */
    public function setDisplay($display)
    {
        return $this->setField('display', $display);
    }
}
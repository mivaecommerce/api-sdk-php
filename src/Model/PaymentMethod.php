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
 * Data model for PaymentMethod.
 *
 * @package MerchantAPI\Model
 */
class PaymentMethod extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['paymentcard'])) {
            if ($data['paymentcard'] instanceof CustomerPaymentCard) {
                $this->setField('paymentcard', $data['paymentcard']);
            } else if (is_array($data['paymentcard'])) {
                $this->setField('paymentcard', new CustomerPaymentCard($data['paymentcard']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected CustomerPaymentCard or an array but got %s',
                    is_object($data['paymentcard']) ?
                        get_class($data['paymentcard']) : gettype($data['paymentcard'])));
            }
        }

        if (isset($data['orderpaymentcard'])) {
            if ($data['orderpaymentcard'] instanceof OrderPaymentCard) {
                $this->setField('orderpaymentcard', $data['orderpaymentcard']);
            } else if (is_array($data['orderpaymentcard'])) {
                $this->setField('orderpaymentcard', new OrderPaymentCard($data['orderpaymentcard']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected OrderPaymentCard or an array but got %s',
                    is_object($data['orderpaymentcard']) ?
                        get_class($data['orderpaymentcard']) : gettype($data['orderpaymentcard'])));
            }
        }

        if (isset($data['paymentcardtype'])) {
            if ($data['paymentcardtype'] instanceof PaymentCardType) {
                $this->setField('paymentcardtype', $data['paymentcardtype']);
            } else if (is_array($data['paymentcardtype'])) {
                $this->setField('paymentcardtype', new PaymentCardType($data['paymentcardtype']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected PaymentCardType or an array but got %s',
                    is_object($data['paymentcardtype']) ?
                        get_class($data['paymentcardtype']) : gettype($data['paymentcardtype'])));
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
        if (isset($data['paymentcard'])) {
            if ($this->data['paymentcard'] instanceof CustomerPaymentCard) {
                $this->data['paymentcard'] = clone $this->data['paymentcard'];
            }
        }

        if (isset($data['orderpaymentcard'])) {
            if ($this->data['orderpaymentcard'] instanceof OrderPaymentCard) {
                $this->data['orderpaymentcard'] = clone $this->data['orderpaymentcard'];
            }
        }

        if (isset($data['paymentcardtype'])) {
            if ($this->data['paymentcardtype'] instanceof PaymentCardType) {
                $this->data['paymentcardtype'] = clone $this->data['paymentcardtype'];
            }
        }
    }

    /**
     * Get module_id.
     *
     * @return ?int
     */
    public function getModuleId() : ?int
    {
        return $this->getField('module_id');
    }

    /**
     * Get module_api.
     *
     * @return ?float
     */
    public function getModuleApi() : ?float
    {
        return $this->getField('module_api');
    }

    /**
     * Get method_code.
     *
     * @return ?string
     */
    public function getMethodCode() : ?string
    {
        return $this->getField('method_code');
    }

    /**
     * Get method_name.
     *
     * @return ?string
     */
    public function getMethodName() : ?string
    {
        return $this->getField('method_name');
    }

    /**
     * Get mivapay.
     *
     * @return ?bool
     */
    public function getMivapay() : ?bool
    {
        return $this->getField('mivapay');
    }

    /**
     * Get paymentcard.
     *
     * @return ?\MerchantAPI\Model\CustomerPaymentCard
     */
    public function getPaymentCard() : ?CustomerPaymentCard
    {
        return $this->getField('paymentcard');
    }

    /**
     * Get orderpaymentcard.
     *
     * @return ?\MerchantAPI\Model\OrderPaymentCard
     */
    public function getOrderPaymentCard() : ?OrderPaymentCard
    {
        return $this->getField('orderpaymentcard');
    }

    /**
     * Get paymentcardtype.
     *
     * @return ?\MerchantAPI\Model\PaymentCardType
     */
    public function getPaymentCardType() : ?PaymentCardType
    {
        return $this->getField('paymentcardtype');
    }
}
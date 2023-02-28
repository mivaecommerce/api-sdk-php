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
 * Data model for Order.
 *
 * @package MerchantAPI\Model
 */
class Order extends \MerchantAPI\Model
{
    /** @var int ORDER_STATUS_PENDING */
    const ORDER_STATUS_PENDING = 0;

    /** @var int ORDER_STATUS_PROCESSING */
    const ORDER_STATUS_PROCESSING = 100;

    /** @var int ORDER_STATUS_SHIPPED */
    const ORDER_STATUS_SHIPPED = 200;

    /** @var int ORDER_STATUS_PARTIALLY_SHIPPED */
    const ORDER_STATUS_PARTIALLY_SHIPPED = 201;

    /** @var int ORDER_STATUS_CANCELLED */
    const ORDER_STATUS_CANCELLED = 300;

    /** @var int ORDER_STATUS_BACKORDERED */
    const ORDER_STATUS_BACKORDERED = 400;

    /** @var int ORDER_STATUS_RMA_ISSUED */
    const ORDER_STATUS_RMA_ISSUED = 500;

    /** @var int ORDER_STATUS_RETURNED */
    const ORDER_STATUS_RETURNED = 600;

    /** @var int ORDER_PAYMENT_STATUS_PENDING */
    const ORDER_PAYMENT_STATUS_PENDING = 0;

    /** @var int ORDER_PAYMENT_STATUS_AUTHORIZED */
    const ORDER_PAYMENT_STATUS_AUTHORIZED = 100;

    /** @var int ORDER_PAYMENT_STATUS_CAPTURED */
    const ORDER_PAYMENT_STATUS_CAPTURED = 200;

    /** @var int ORDER_PAYMENT_STATUS_PARTIALLY_CAPTURED */
    const ORDER_PAYMENT_STATUS_PARTIALLY_CAPTURED = 201;

    /** @var int ORDER_STOCK_STATUS_AVAILABLE */
    const ORDER_STOCK_STATUS_AVAILABLE = 100;

    /** @var int ORDER_STOCK_STATUS_UNAVAILABLE */
    const ORDER_STOCK_STATUS_UNAVAILABLE = 200;

    /** @var int ORDER_STOCK_STATUS_PARTIAL */
    const ORDER_STOCK_STATUS_PARTIAL = 201;

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('items', new Collection());
        $this->setField('charges', new Collection());
        $this->setField('coupons', new Collection());
        $this->setField('discounts', new Collection());
        $this->setField('payments', new Collection());
        $this->setField('notes', new Collection());
        $this->setField('parts', new Collection());
        $this->setField('shipments', new Collection());
        $this->setField('returns', new Collection());

        if (isset($data['customer'])) {
            if ($data['customer'] instanceof Customer) {
                $this->setField('customer', $data['customer']);
            } else if (is_array($data['customer'])) {
                $this->setField('customer', new Customer($data['customer']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected Customer or an array but got %s',
                    is_object($data['customer']) ?
                        get_class($data['customer']) : gettype($data['customer'])));
            }
        }

        if (isset($data['items']) && is_array($data['items'])) {
            $items = new Collection();

            foreach($data['items'] as $e) {
                if ($e instanceof OrderItem) {
                    $items[] = $e;
                } else if (is_array($e)) {
                    $items[] = new OrderItem($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderItem or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('items', $items);
        }

        if (isset($data['charges']) && is_array($data['charges'])) {
            $charges = new Collection();

            foreach($data['charges'] as $e) {
                if ($e instanceof OrderCharge) {
                    $charges[] = $e;
                } else if (is_array($e)) {
                    $charges[] = new OrderCharge($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderCharge or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('charges', $charges);
        }

        if (isset($data['coupons']) && is_array($data['coupons'])) {
            $coupons = new Collection();

            foreach($data['coupons'] as $e) {
                if ($e instanceof OrderCoupon) {
                    $coupons[] = $e;
                } else if (is_array($e)) {
                    $coupons[] = new OrderCoupon($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderCoupon or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('coupons', $coupons);
        }

        if (isset($data['discounts']) && is_array($data['discounts'])) {
            $discounts = new Collection();

            foreach($data['discounts'] as $e) {
                if ($e instanceof OrderDiscountTotal) {
                    $discounts[] = $e;
                } else if (is_array($e)) {
                    $discounts[] = new OrderDiscountTotal($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderDiscountTotal or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('discounts', $discounts);
        }

        if (isset($data['payments']) && is_array($data['payments'])) {
            $payments = new Collection();

            foreach($data['payments'] as $e) {
                if ($e instanceof OrderPayment) {
                    $payments[] = $e;
                } else if (is_array($e)) {
                    $payments[] = new OrderPayment($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderPayment or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('payments', $payments);
        }

        if (isset($data['notes']) && is_array($data['notes'])) {
            $notes = new Collection();

            foreach($data['notes'] as $e) {
                if ($e instanceof OrderNote) {
                    $notes[] = $e;
                } else if (is_array($e)) {
                    $notes[] = new OrderNote($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderNote or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('notes', $notes);
        }

        if (isset($data['parts']) && is_array($data['parts'])) {
            $parts = new Collection();

            foreach($data['parts'] as $e) {
                if ($e instanceof OrderPart) {
                    $parts[] = $e;
                } else if (is_array($e)) {
                    $parts[] = new OrderPart($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderPart or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('parts', $parts);
        }

        if (isset($data['CustomField_Values'])) {
            if ($data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->setField('CustomField_Values', $data['CustomField_Values']);
            } else if (is_array($data['CustomField_Values'])) {
                $this->setField('CustomField_Values', new CustomFieldValues($data['CustomField_Values']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected CustomFieldValues or an array but got %s',
                    is_object($data['CustomField_Values']) ?
                        get_class($data['CustomField_Values']) : gettype($data['CustomField_Values'])));
            }
        }

        if (isset($data['shipments']) && is_array($data['shipments'])) {
            $shipments = new Collection();

            foreach($data['shipments'] as $e) {
                if ($e instanceof OrderShipment) {
                    $shipments[] = $e;
                } else if (is_array($e)) {
                    $shipments[] = new OrderShipment($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderShipment or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('shipments', $shipments);
        }

        if (isset($data['returns']) && is_array($data['returns'])) {
            $returns = new Collection();

            foreach($data['returns'] as $e) {
                if ($e instanceof OrderReturn) {
                    $returns[] = $e;
                } else if (is_array($e)) {
                    $returns[] = new OrderReturn($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of OrderReturn or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('returns', $returns);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['customer'])) {
            if ($this->data['customer'] instanceof Customer) {
                $this->data['customer'] = clone $this->data['customer'];
            }
        }

        if (isset($this->data['items']) && is_array($this->data['items'])) {
            if ($this->data['items'] instanceof Collection) {
                $this->data['items'] = clone $this->data['items'];
            } else {
                foreach($this->data['items'] as $i => $e) {
                    if ($e instanceof OrderItem) {
                        $this->data['items'][$i] = clone $this->data['items'][$i];
                    }
                }
            }
        }

        if (isset($this->data['charges']) && is_array($this->data['charges'])) {
            if ($this->data['charges'] instanceof Collection) {
                $this->data['charges'] = clone $this->data['charges'];
            } else {
                foreach($this->data['charges'] as $i => $e) {
                    if ($e instanceof OrderCharge) {
                        $this->data['charges'][$i] = clone $this->data['charges'][$i];
                    }
                }
            }
        }

        if (isset($this->data['coupons']) && is_array($this->data['coupons'])) {
            if ($this->data['coupons'] instanceof Collection) {
                $this->data['coupons'] = clone $this->data['coupons'];
            } else {
                foreach($this->data['coupons'] as $i => $e) {
                    if ($e instanceof OrderCoupon) {
                        $this->data['coupons'][$i] = clone $this->data['coupons'][$i];
                    }
                }
            }
        }

        if (isset($this->data['discounts']) && is_array($this->data['discounts'])) {
            if ($this->data['discounts'] instanceof Collection) {
                $this->data['discounts'] = clone $this->data['discounts'];
            } else {
                foreach($this->data['discounts'] as $i => $e) {
                    if ($e instanceof OrderDiscountTotal) {
                        $this->data['discounts'][$i] = clone $this->data['discounts'][$i];
                    }
                }
            }
        }

        if (isset($this->data['payments']) && is_array($this->data['payments'])) {
            if ($this->data['payments'] instanceof Collection) {
                $this->data['payments'] = clone $this->data['payments'];
            } else {
                foreach($this->data['payments'] as $i => $e) {
                    if ($e instanceof OrderPayment) {
                        $this->data['payments'][$i] = clone $this->data['payments'][$i];
                    }
                }
            }
        }

        if (isset($this->data['notes']) && is_array($this->data['notes'])) {
            if ($this->data['notes'] instanceof Collection) {
                $this->data['notes'] = clone $this->data['notes'];
            } else {
                foreach($this->data['notes'] as $i => $e) {
                    if ($e instanceof OrderNote) {
                        $this->data['notes'][$i] = clone $this->data['notes'][$i];
                    }
                }
            }
        }

        if (isset($this->data['parts']) && is_array($this->data['parts'])) {
            if ($this->data['parts'] instanceof Collection) {
                $this->data['parts'] = clone $this->data['parts'];
            } else {
                foreach($this->data['parts'] as $i => $e) {
                    if ($e instanceof OrderPart) {
                        $this->data['parts'][$i] = clone $this->data['parts'][$i];
                    }
                }
            }
        }

        if (isset($data['CustomField_Values'])) {
            if ($this->data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->data['CustomField_Values'] = clone $this->data['CustomField_Values'];
            }
        }

        if (isset($this->data['shipments']) && is_array($this->data['shipments'])) {
            if ($this->data['shipments'] instanceof Collection) {
                $this->data['shipments'] = clone $this->data['shipments'];
            } else {
                foreach($this->data['shipments'] as $i => $e) {
                    if ($e instanceof OrderShipment) {
                        $this->data['shipments'][$i] = clone $this->data['shipments'][$i];
                    }
                }
            }
        }

        if (isset($this->data['returns']) && is_array($this->data['returns'])) {
            if ($this->data['returns'] instanceof Collection) {
                $this->data['returns'] = clone $this->data['returns'];
            } else {
                foreach($this->data['returns'] as $i => $e) {
                    if ($e instanceof OrderReturn) {
                        $this->data['returns'][$i] = clone $this->data['returns'][$i];
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
     * Get pay_id.
     *
     * @return ?int
     */
    public function getPaymentId() : ?int
    {
        return $this->getField('pay_id');
    }

    /**
     * Get batch_id.
     *
     * @return ?int
     */
    public function getBatchId() : ?int
    {
        return $this->getField('batch_id');
    }

    /**
     * Get status.
     *
     * @return ?int
     */
    public function getStatus() : ?int
    {
        return $this->getField('status');
    }

    /**
     * Get pay_status.
     *
     * @return ?int
     */
    public function getPaymentStatus() : ?int
    {
        return $this->getField('pay_status');
    }

    /**
     * Get stk_status.
     *
     * @return ?int
     */
    public function getStockStatus() : ?int
    {
        return $this->getField('stk_status');
    }

    /**
     * Get dt_instock.
     *
     * @return ?int
     */
    public function getDateInStock() : ?int
    {
        return $this->getTimestampField('dt_instock');
    }

    /**
     * Get orderdate.
     *
     * @return ?int
     */
    public function getOrderDate() : ?int
    {
        return $this->getField('orderdate');
    }

    /**
     * Get cust_id.
     *
     * @return ?int
     */
    public function getCustomerId() : ?int
    {
        return $this->getField('cust_id');
    }

    /**
     * Get ship_res.
     *
     * @return ?bool
     */
    public function getShipResidential() : ?bool
    {
        return $this->getField('ship_res');
    }

    /**
     * Get ship_fname.
     *
     * @return ?string
     */
    public function getShipFirstName() : ?string
    {
        return $this->getField('ship_fname');
    }

    /**
     * Get ship_lname.
     *
     * @return ?string
     */
    public function getShipLastName() : ?string
    {
        return $this->getField('ship_lname');
    }

    /**
     * Get ship_email.
     *
     * @return ?string
     */
    public function getShipEmail() : ?string
    {
        return $this->getField('ship_email');
    }

    /**
     * Get ship_comp.
     *
     * @return ?string
     */
    public function getShipCompany() : ?string
    {
        return $this->getField('ship_comp');
    }

    /**
     * Get ship_phone.
     *
     * @return ?string
     */
    public function getShipPhone() : ?string
    {
        return $this->getField('ship_phone');
    }

    /**
     * Get ship_fax.
     *
     * @return ?string
     */
    public function getShipFax() : ?string
    {
        return $this->getField('ship_fax');
    }

    /**
     * Get ship_addr1.
     *
     * @return ?string
     */
    public function getShipAddress1() : ?string
    {
        return $this->getField('ship_addr1');
    }

    /**
     * Get ship_addr2.
     *
     * @return ?string
     */
    public function getShipAddress2() : ?string
    {
        return $this->getField('ship_addr2');
    }

    /**
     * Get ship_city.
     *
     * @return ?string
     */
    public function getShipCity() : ?string
    {
        return $this->getField('ship_city');
    }

    /**
     * Get ship_state.
     *
     * @return ?string
     */
    public function getShipState() : ?string
    {
        return $this->getField('ship_state');
    }

    /**
     * Get ship_zip.
     *
     * @return ?string
     */
    public function getShipZip() : ?string
    {
        return $this->getField('ship_zip');
    }

    /**
     * Get ship_cntry.
     *
     * @return ?string
     */
    public function getShipCountry() : ?string
    {
        return $this->getField('ship_cntry');
    }

    /**
     * Get bill_fname.
     *
     * @return ?string
     */
    public function getBillFirstName() : ?string
    {
        return $this->getField('bill_fname');
    }

    /**
     * Get bill_lname.
     *
     * @return ?string
     */
    public function getBillLastName() : ?string
    {
        return $this->getField('bill_lname');
    }

    /**
     * Get bill_email.
     *
     * @return ?string
     */
    public function getBillEmail() : ?string
    {
        return $this->getField('bill_email');
    }

    /**
     * Get bill_comp.
     *
     * @return ?string
     */
    public function getBillCompany() : ?string
    {
        return $this->getField('bill_comp');
    }

    /**
     * Get bill_phone.
     *
     * @return ?string
     */
    public function getBillPhone() : ?string
    {
        return $this->getField('bill_phone');
    }

    /**
     * Get bill_fax.
     *
     * @return ?string
     */
    public function getBillFax() : ?string
    {
        return $this->getField('bill_fax');
    }

    /**
     * Get bill_addr1.
     *
     * @return ?string
     */
    public function getBillAddress1() : ?string
    {
        return $this->getField('bill_addr1');
    }

    /**
     * Get bill_addr2.
     *
     * @return ?string
     */
    public function getBillAddress2() : ?string
    {
        return $this->getField('bill_addr2');
    }

    /**
     * Get bill_city.
     *
     * @return ?string
     */
    public function getBillCity() : ?string
    {
        return $this->getField('bill_city');
    }

    /**
     * Get bill_state.
     *
     * @return ?string
     */
    public function getBillState() : ?string
    {
        return $this->getField('bill_state');
    }

    /**
     * Get bill_zip.
     *
     * @return ?string
     */
    public function getBillZip() : ?string
    {
        return $this->getField('bill_zip');
    }

    /**
     * Get bill_cntry.
     *
     * @return ?string
     */
    public function getBillCountry() : ?string
    {
        return $this->getField('bill_cntry');
    }

    /**
     * Get ship_id.
     *
     * @return ?int
     */
    public function getShipmentId() : ?int
    {
        return $this->getField('ship_id');
    }

    /**
     * Get ship_data.
     *
     * @return ?string
     */
    public function getShipData() : ?string
    {
        return $this->getField('ship_data');
    }

    /**
     * Get ship_method.
     *
     * @return ?string
     */
    public function getShipMethod() : ?string
    {
        return $this->getField('ship_method');
    }

    /**
     * Get cust_login.
     *
     * @return ?string
     */
    public function getCustomerLogin() : ?string
    {
        return $this->getField('cust_login');
    }

    /**
     * Get cust_pw_email.
     *
     * @return ?string
     */
    public function getCustomerPasswordEmail() : ?string
    {
        return $this->getField('cust_pw_email');
    }

    /**
     * Get business_title.
     *
     * @return ?string
     */
    public function getBusinessTitle() : ?string
    {
        return $this->getField('business_title');
    }

    /**
     * Get payment_module.
     *
     * @return ?string
     */
    public function getPaymentModule() : ?string
    {
        return $this->getField('payment_module');
    }

    /**
     * Get source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('source');
    }

    /**
     * Get source_id.
     *
     * @return ?int
     */
    public function getSourceId() : ?int
    {
        return $this->getField('source_id');
    }

    /**
     * Get total.
     *
     * @return ?float
     */
    public function getTotal() : ?float
    {
        return $this->getField('total');
    }

    /**
     * Get formatted_total.
     *
     * @return ?string
     */
    public function getFormattedTotal() : ?string
    {
        return $this->getField('formatted_total');
    }

    /**
     * Get total_ship.
     *
     * @return ?float
     */
    public function getTotalShip() : ?float
    {
        return $this->getField('total_ship');
    }

    /**
     * Get formatted_total_ship.
     *
     * @return ?string
     */
    public function getFormattedTotalShip() : ?string
    {
        return $this->getField('formatted_total_ship');
    }

    /**
     * Get total_tax.
     *
     * @return ?float
     */
    public function getTotalTax() : ?float
    {
        return $this->getField('total_tax');
    }

    /**
     * Get formatted_total_tax.
     *
     * @return ?string
     */
    public function getFormattedTotalTax() : ?string
    {
        return $this->getField('formatted_total_tax');
    }

    /**
     * Get total_auth.
     *
     * @return ?float
     */
    public function getTotalAuthorized() : ?float
    {
        return $this->getField('total_auth');
    }

    /**
     * Get formatted_total_auth.
     *
     * @return ?string
     */
    public function getFormattedTotalAuthorized() : ?string
    {
        return $this->getField('formatted_total_auth');
    }

    /**
     * Get total_capt.
     *
     * @return ?float
     */
    public function getTotalCaptured() : ?float
    {
        return $this->getField('total_capt');
    }

    /**
     * Get formatted_total_capt.
     *
     * @return ?string
     */
    public function getFormattedTotalCaptured() : ?string
    {
        return $this->getField('formatted_total_capt');
    }

    /**
     * Get total_rfnd.
     *
     * @return ?float
     */
    public function getTotalRefunded() : ?float
    {
        return $this->getField('total_rfnd');
    }

    /**
     * Get formatted_total_rfnd.
     *
     * @return ?string
     */
    public function getFormattedTotalRefunded() : ?string
    {
        return $this->getField('formatted_total_rfnd');
    }

    /**
     * Get net_capt.
     *
     * @return ?float
     */
    public function getNetCaptured() : ?float
    {
        return $this->getField('net_capt');
    }

    /**
     * Get formatted_net_capt.
     *
     * @return ?string
     */
    public function getFormattedNetCaptured() : ?string
    {
        return $this->getField('formatted_net_capt');
    }

    /**
     * Get pend_count.
     *
     * @return ?int
     */
    public function getPendingCount() : ?int
    {
        return $this->getField('pend_count');
    }

    /**
     * Get bord_count.
     *
     * @return ?int
     */
    public function getBackorderCount() : ?int
    {
        return $this->getField('bord_count');
    }

    /**
     * Get note_count.
     *
     * @return ?int
     */
    public function getNoteCount() : ?int
    {
        return $this->getField('note_count');
    }

    /**
     * Get customer.
     *
     * @return ?\MerchantAPI\Model\Customer
     */
    public function getCustomer() : ?Customer
    {
        return $this->getField('customer');
    }

    /**
     * Get items.
     *
     * @return \MerchantAPI\Collection
     */
    public function getItems() : ?Collection
    {
        return $this->getField('items');
    }

    /**
     * Get charges.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCharges() : ?Collection
    {
        return $this->getField('charges');
    }

    /**
     * Get coupons.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCoupons() : ?Collection
    {
        return $this->getField('coupons');
    }

    /**
     * Get discounts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getDiscounts() : ?Collection
    {
        return $this->getField('discounts');
    }

    /**
     * Get payments.
     *
     * @return \MerchantAPI\Collection
     */
    public function getPayments() : ?Collection
    {
        return $this->getField('payments');
    }

    /**
     * Get notes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getNotes() : ?Collection
    {
        return $this->getField('notes');
    }

    /**
     * Get parts.
     *
     * @return \MerchantAPI\Collection
     */
    public function getParts() : ?Collection
    {
        return $this->getField('parts');
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?\MerchantAPI\Model\CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->getField('CustomField_Values');
    }

    /**
     * Get dt_updated.
     *
     * @return ?int
     */
    public function getDtUpdated() : ?int
    {
        return $this->getTimestampField('dt_updated');
    }

    /**
     * Get shipments.
     *
     * @return \MerchantAPI\Collection
     */
    public function getShipments() : ?Collection
    {
        return $this->getField('shipments');
    }

    /**
     * Get returns.
     *
     * @return \MerchantAPI\Collection
     */
    public function getReturns() : ?Collection
    {
        return $this->getField('returns');
    }
}
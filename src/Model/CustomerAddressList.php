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
 * Data model for CustomerAddressList.
 *
 * @package MerchantAPI\Model
 */
class CustomerAddressList extends \MerchantAPI\Model
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

        $this->setField('addresses', new Collection());

        if (isset($data['addresses']) && is_array($data['addresses'])) {
            $addresses = new Collection();

            foreach($data['addresses'] as $e) {
                if ($e instanceof CustomerAddress) {
                    $addresses[] = $e;
                } else if (is_array($e)) {
                    $addresses[] = new CustomerAddress($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of CustomerAddress or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('addresses', $addresses);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['addresses']) && is_array($this->data['addresses'])) {
            if ($this->data['addresses'] instanceof Collection) {
                $this->data['addresses'] = clone $this->data['addresses'];
            } else {
                foreach($this->data['addresses'] as $i => $e) {
                    if ($e instanceof CustomerAddress) {
                        $this->data['addresses'][$i] = clone $this->data['addresses'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get ship_id.
     *
     * @return ?int
     */
    public function getShipId() : ?int
    {
        return $this->getField('ship_id');
    }

    /**
     * Get bill_id.
     *
     * @return ?int
     */
    public function getBillId() : ?int
    {
        return $this->getField('bill_id');
    }

    /**
     * Get addresses.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAddresses() : ?Collection
    {
        return $this->getField('addresses');
    }
}
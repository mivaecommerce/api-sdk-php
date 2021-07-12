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
 * Data model for ProductKit.
 *
 * @package MerchantAPI\Model
 */
class ProductKit extends \MerchantAPI\Model
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

        $this->setField('parts', new Collection());

        if (isset($data['parts']) && is_array($data['parts'])) {
            $parts = new Collection();

            foreach($data['parts'] as $e) {
                if ($e instanceof ProductKitPart) {
                    $parts[] = $e;
                } else if (is_array($e)) {
                    $parts[] = new ProductKitPart($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of ProductKitPart or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('parts', $parts);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['parts']) && is_array($this->data['parts'])) {
            if ($this->data['parts'] instanceof Collection) {
                $this->data['parts'] = clone $this->data['parts'];
            } else {
                foreach($this->data['parts'] as $i => $e) {
                    if ($e instanceof ProductKitPart) {
                        $this->data['parts'][$i] = clone $this->data['parts'][$i];
                    }
                }
            }
        }
    }

    /**
     * Get attr_id.
     *
     * @return int
     */
    public function getAttrId()
    {
        return (int) $this->getField('attr_id', 0);
    }

    /**
     * Get attr_type.
     *
     * @return string
     */
    public function getAttrType()
    {
        return $this->getField('attr_type');
    }

    /**
     * Get attr_code.
     *
     * @return string
     */
    public function getAttrCode()
    {
        return $this->getField('attr_code');
    }

    /**
     * Get attr_prompt.
     *
     * @return string
     */
    public function getAttrPrompt()
    {
        return $this->getField('attr_prompt');
    }

    /**
     * Get attmpat_id.
     *
     * @return int
     */
    public function getAttmpatId()
    {
        return (int) $this->getField('attmpat_id', 0);
    }

    /**
     * Get option_id.
     *
     * @return int
     */
    public function getOptionId()
    {
        return (int) $this->getField('option_id', 0);
    }

    /**
     * Get option_code.
     *
     * @return string
     */
    public function getOptionCode()
    {
        return $this->getField('option_code');
    }

    /**
     * Get option_prompt.
     *
     * @return string
     */
    public function getOptionPrompt()
    {
        return $this->getField('option_prompt');
    }

    /**
     * Get parts.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProductKitPart[]
     */
    public function getParts()
    {
        return $this->getField('parts', []);
    }
}
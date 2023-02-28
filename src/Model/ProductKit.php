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
     * @return ?int
     */
    public function getAttributeId() : ?int
    {
        return $this->getField('attr_id');
    }

    /**
     * Get attr_type.
     *
     * @return ?string
     */
    public function getAttributeType() : ?string
    {
        return $this->getField('attr_type');
    }

    /**
     * Get attr_code.
     *
     * @return ?string
     */
    public function getAttributeCode() : ?string
    {
        return $this->getField('attr_code');
    }

    /**
     * Get attr_prompt.
     *
     * @return ?string
     */
    public function getAttributePrompt() : ?string
    {
        return $this->getField('attr_prompt');
    }

    /**
     * Get attmpat_id.
     *
     * @return ?int
     */
    public function getAttributeTemplateAttributeId() : ?int
    {
        return $this->getField('attmpat_id');
    }

    /**
     * Get option_id.
     *
     * @return ?int
     */
    public function getOptionId() : ?int
    {
        return $this->getField('option_id');
    }

    /**
     * Get option_code.
     *
     * @return ?string
     */
    public function getOptionCode() : ?string
    {
        return $this->getField('option_code');
    }

    /**
     * Get option_prompt.
     *
     * @return ?string
     */
    public function getOptionPrompt() : ?string
    {
        return $this->getField('option_prompt');
    }

    /**
     * Get option_disp_order.
     *
     * @return ?int
     */
    public function getOptionDisplayOrder() : ?int
    {
        return $this->getField('option_disp_order');
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
}
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
 * Data model for CSSResource.
 *
 * @package MerchantAPI\Model
 */
class CSSResource extends \MerchantAPI\Model
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

        $this->setField('attributes', new Collection());

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof CSSResourceAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new CSSResourceAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceAttribute or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('attributes', $attributes);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof CSSResourceAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
                    }
                }
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
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
    }

    /**
     * Get is_global.
     *
     * @return bool
     */
    public function getIsGlobal()
    {
        return (bool) $this->getField('is_global', false);
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('active', false);
    }

    /**
     * Get file.
     *
     * @return int
     */
    public function getFile()
    {
        return (int) $this->getField('file', 0);
    }

    /**
     * Get templ_id.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return (int) $this->getField('templ_id', 0);
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\CSSResourceAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('attributes', []);
    }
}
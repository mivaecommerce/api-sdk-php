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
 * Data model for JavaScriptResource.
 *
 * @package MerchantAPI\Model
 */
class JavaScriptResource extends \MerchantAPI\Model
{
    /** @var string RESOURCE_TYPE_COMBINED */
    const RESOURCE_TYPE_COMBINED = 'C';

    /** @var string RESOURCE_TYPE_INLINE */
    const RESOURCE_TYPE_INLINE = 'I';

    /** @var string RESOURCE_TYPE_EXTERNAL */
    const RESOURCE_TYPE_EXTERNAL = 'E';

    /** @var string RESOURCE_TYPE_LOCAL */
    const RESOURCE_TYPE_LOCAL = 'L';

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
                if ($e instanceof JavaScriptResourceAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new JavaScriptResourceAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceAttribute or an array of arrays but got %s',
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
                    if ($e instanceof JavaScriptResourceAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get type.
     *
     * @return ?string
     */
    public function getType() : ?string
    {
        return $this->getField('type');
    }

    /**
     * Get is_global.
     *
     * @return ?bool
     */
    public function getIsGlobal() : ?bool
    {
        return $this->getField('is_global');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }

    /**
     * Get file.
     *
     * @return ?string
     */
    public function getFile() : ?string
    {
        return $this->getField('file');
    }

    /**
     * Get templ_id.
     *
     * @return ?int
     */
    public function getTemplateId() : ?int
    {
        return $this->getField('templ_id');
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getAttributes() : ?Collection
    {
        return $this->getField('attributes');
    }
}
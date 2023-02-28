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
 * Data model for ResourceGroup.
 *
 * @package MerchantAPI\Model
 */
class ResourceGroup extends \MerchantAPI\Model
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

        $this->setField('linkedcssresources', new Collection());
        $this->setField('linkedjavascriptresources', new Collection());

        if (isset($data['linkedcssresources']) && is_array($data['linkedcssresources'])) {
            $linkedcssresources = new Collection();

            foreach($data['linkedcssresources'] as $e) {
                if ($e instanceof CSSResource) {
                    $linkedcssresources[] = $e;
                } else if (is_array($e)) {
                    $linkedcssresources[] = new CSSResource($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of CSSResource or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('linkedcssresources', $linkedcssresources);
        }

        if (isset($data['linkedjavascriptresources']) && is_array($data['linkedjavascriptresources'])) {
            $linkedjavascriptresources = new Collection();

            foreach($data['linkedjavascriptresources'] as $e) {
                if ($e instanceof JavaScriptResource) {
                    $linkedjavascriptresources[] = $e;
                } else if (is_array($e)) {
                    $linkedjavascriptresources[] = new JavaScriptResource($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResource or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('linkedjavascriptresources', $linkedjavascriptresources);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['linkedcssresources']) && is_array($this->data['linkedcssresources'])) {
            if ($this->data['linkedcssresources'] instanceof Collection) {
                $this->data['linkedcssresources'] = clone $this->data['linkedcssresources'];
            } else {
                foreach($this->data['linkedcssresources'] as $i => $e) {
                    if ($e instanceof CSSResource) {
                        $this->data['linkedcssresources'][$i] = clone $this->data['linkedcssresources'][$i];
                    }
                }
            }
        }

        if (isset($this->data['linkedjavascriptresources']) && is_array($this->data['linkedjavascriptresources'])) {
            if ($this->data['linkedjavascriptresources'] instanceof Collection) {
                $this->data['linkedjavascriptresources'] = clone $this->data['linkedjavascriptresources'];
            } else {
                foreach($this->data['linkedjavascriptresources'] as $i => $e) {
                    if ($e instanceof JavaScriptResource) {
                        $this->data['linkedjavascriptresources'][$i] = clone $this->data['linkedjavascriptresources'][$i];
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
     * Get linkedcssresources.
     *
     * @return \MerchantAPI\Collection
     */
    public function getLinkedCSSResources() : ?Collection
    {
        return $this->getField('linkedcssresources');
    }

    /**
     * Get linkedjavascriptresources.
     *
     * @return \MerchantAPI\Collection
     */
    public function getLinkedJavaScriptResources() : ?Collection
    {
        return $this->getField('linkedjavascriptresources');
    }
}
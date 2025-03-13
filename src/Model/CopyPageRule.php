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
 * Data model for CopyPageRule.
 *
 * @package MerchantAPI\Model
 */
class CopyPageRule extends \MerchantAPI\Model
{
    /** @var string PAGE_RULE_SETTINGS_ALL */
    const PAGE_RULE_SETTINGS_ALL = 'all';

    /** @var string PAGE_RULE_SETTINGS_NONE */
    const PAGE_RULE_SETTINGS_NONE = 'none';

    /** @var string PAGE_RULE_SETTINGS_SPECIFIC */
    const PAGE_RULE_SETTINGS_SPECIFIC = 'specific';

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
     * Get secure.
     *
     * @return ?bool
     */
    public function getSecure() : ?bool
    {
        return $this->getField('secure');
    }

    /**
     * Get title.
     *
     * @return ?bool
     */
    public function getTitle() : ?bool
    {
        return $this->getField('title');
    }

    /**
     * Get template.
     *
     * @return ?bool
     */
    public function getTemplate() : ?bool
    {
        return $this->getField('template');
    }

    /**
     * Get items.
     *
     * @return ?bool
     */
    public function getItems() : ?bool
    {
        return $this->getField('items');
    }

    /**
     * Get settings.
     *
     * @return ?string
     */
    public function getSettings() : ?string
    {
        return $this->getField('settings');
    }

    /**
     * Get jsres.
     *
     * @return ?bool
     */
    public function getJavascriptResourceAssignments() : ?bool
    {
        return $this->getField('jsres');
    }

    /**
     * Get cssres.
     *
     * @return ?bool
     */
    public function getCSSResourceAssignments() : ?bool
    {
        return $this->getField('cssres');
    }

    /**
     * Get cacheset.
     *
     * @return ?bool
     */
    public function getCacheSettings() : ?bool
    {
        return $this->getField('cacheset');
    }

    /**
     * Get public.
     *
     * @return ?bool
     */
    public function getPublic() : ?bool
    {
        return $this->getField('public');
    }
}
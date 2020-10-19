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
 * Data model for Page.
 *
 * @package MerchantAPI\Model
 */
class Page extends \MerchantAPI\Model
{
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
     * Get secure.
     *
     * @return bool
     */
    public function getSecure()
    {
        return (bool) $this->getField('secure', false);
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
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getField('title');
    }

    /**
     * Get ui_id.
     *
     * @return int
     */
    public function getUiId()
    {
        return (int) $this->getField('ui_id', 0);
    }
}
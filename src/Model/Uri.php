<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Model;

/**
 * Data model for Uri.
 *
 * @package MerchantAPI\Model
 */
class Uri extends \MerchantAPI\Model
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
     * Get uri.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->getField('uri');
    }

    /**
     * Get store_id.
     *
     * @return int
     */
    public function getStoreId()
    {
        return (int) $this->getField('store_id', 0);
    }

    /**
     * Get screen.
     *
     * @return string
     */
    public function getScreen()
    {
        return $this->getField('screen');
    }

    /**
     * Get page_id.
     *
     * @return int
     */
    public function getPageId()
    {
        return (int) $this->getField('page_id', 0);
    }

    /**
     * Get cat_id.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return (int) $this->getField('cat_id', 0);
    }

    /**
     * Get product_id.
     *
     * @return int
     */
    public function getProductId()
    {
        return (int) $this->getField('product_id', 0);
    }

    /**
     * Get feed_id.
     *
     * @return int
     */
    public function getFeedId()
    {
        return (int) $this->getField('feed_id', 0);
    }

    /**
     * Get canonical.
     *
     * @return bool
     */
    public function getCanonical()
    {
        return (bool) $this->getField('canonical', false);
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return (int) $this->getField('status', 0);
    }
}
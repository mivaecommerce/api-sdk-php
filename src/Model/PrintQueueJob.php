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
 * Data model for PrintQueueJob.
 *
 * @package MerchantAPI\Model
 */
class PrintQueueJob extends \MerchantAPI\Model
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
     * Get queue_id.
     *
     * @return int
     */
    public function getQueueId()
    {
        return (int) $this->getField('queue_id', 0);
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
     * Get user_id.
     *
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->getField('user_id', 0);
    }

    /**
     * Get descrip.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getField('descrip');
    }

    /**
     * Get job_fmt.
     *
     * @return string
     */
    public function getJobFormat()
    {
        return $this->getField('job_fmt');
    }

    /**
     * Get job_data.
     *
     * @return string
     */
    public function getJobData()
    {
        return $this->getField('job_data');
    }

    /**
     * Get dt_created.
     *
     * @return int
     */
    public function getDateTimeCreated()
    {
        return (int) $this->getField('dt_created', 0);
    }

    /**
     * Get printqueue_descrip.
     *
     * @return string
     */
    public function getPrintQueueDescription()
    {
        return $this->getField('printqueue_descrip');
    }

    /**
     * Get user_name.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->getField('user_name');
    }

    /**
     * Get store_code.
     *
     * @return string
     */
    public function getStoreCode()
    {
        return $this->getField('store_code');
    }

    /**
     * Get store_name.
     *
     * @return string
     */
    public function getStoreName()
    {
        return $this->getField('store_name');
    }
}
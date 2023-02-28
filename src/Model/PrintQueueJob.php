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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get queue_id.
     *
     * @return ?int
     */
    public function getQueueId() : ?int
    {
        return $this->getField('queue_id');
    }

    /**
     * Get store_id.
     *
     * @return ?int
     */
    public function getStoreId() : ?int
    {
        return $this->getField('store_id');
    }

    /**
     * Get user_id.
     *
     * @return ?int
     */
    public function getUserId() : ?int
    {
        return $this->getField('user_id');
    }

    /**
     * Get descrip.
     *
     * @return ?string
     */
    public function getDescription() : ?string
    {
        return $this->getField('descrip');
    }

    /**
     * Get job_fmt.
     *
     * @return ?string
     */
    public function getJobFormat() : ?string
    {
        return $this->getField('job_fmt');
    }

    /**
     * Get job_data.
     *
     * @return ?string
     */
    public function getJobData() : ?string
    {
        return $this->getField('job_data');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getDateTimeCreated() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get user_name.
     *
     * @return ?string
     */
    public function getUserName() : ?string
    {
        return $this->getField('user_name');
    }

    /**
     * Get store_code.
     *
     * @return ?string
     */
    public function getStoreCode() : ?string
    {
        return $this->getField('store_code');
    }

    /**
     * Get store_name.
     *
     * @return ?string
     */
    public function getStoreName() : ?string
    {
        return $this->getField('store_name');
    }
}
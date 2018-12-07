<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: Request.php 71080 2018-10-15 20:36:21Z gidriss $
 */

namespace MerchantAPI;

/**
 * Abstract class all Requests inherit from.
 *
 * @package MerchantAPI
 */
abstract class Request implements RequestInterface
{
    /** @var null|string */
    protected $storeCode = null;

    /**
     * @inheritDoc
     */
    public function getFunction()
    {
        if (isset($this->function)) {
            return $this->function;
        }

        $parts = explode('\\', get_class($this));
        return end($parts);
    }

    /**
     * @inheritDoc
     */
	public function getStoreCode()
    {
        return $this->storeCode;
    }
}
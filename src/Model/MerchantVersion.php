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
 * Data model for MerchantVersion.
 *
 * @package MerchantAPI\Model
 */
class MerchantVersion extends \MerchantAPI\Model
{
    /**
     * Get version.
     *
     * @return ?string
     */
    public function getVersion() : ?string
    {
        return $this->getField('version');
    }

    /**
     * Get major.
     *
     * @return ?int
     */
    public function getMajor() : ?int
    {
        return $this->getField('major');
    }

    /**
     * Get minor.
     *
     * @return ?int
     */
    public function getMinor() : ?int
    {
        return $this->getField('minor');
    }

    /**
     * Get bugfix.
     *
     * @return ?int
     */
    public function getBugfix() : ?int
    {
        return $this->getField('bugfix');
    }
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: Version.php 71080 2018-10-15 20:36:21Z gidriss $
 */

namespace MerchantAPI;

/**
 * Holds current version information.
 *
 * @package MerchantAPI
 */
class Version
{
    /** @var int Major Version */
    const MAJOR   = 1;

    /** @var int Minor Version */
    const MINOR   = 0;

    /** @var int Patch Version */
    const PATCH   = 0;

    /** @var string Version as string */
    const STRING = '1.0.0';
}
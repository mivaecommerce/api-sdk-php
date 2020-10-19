<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\SSHAgent;

/**
 * Class SSHAgentMessage.
 *
 * @package MerchantAPI
 */
abstract class SSHAgentMessage
{
    /**
     * @return string
     */
	public function Pack()
    {
	    return '';
    }

    /**
     * @param $data
     * @throws \Exception
     */
    public function Unpack($data)
	{
		$size = unpack('N', $data, 0);

		if (strlen($data) != $size - 4) {
			throw new \Exception('Invalid response size');
		}
	}
}
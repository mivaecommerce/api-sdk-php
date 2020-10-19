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
 * Class SSHAgentKey.
 *
 * @package MerchantAPI
 */
class SSHAgentKey
{
    /** @var buffer */
    protected $keyBlob;

    /** @var string */
    protected $comment;

    /**
     * SSHAgentKey constructor.
     * @param $keyBlob
     * @param $comment
     */
	public function __construct($keyBlob, $comment)
	{
		$this->keyBlob = $keyBlob;
		$this->comment = $comment;
	}
}
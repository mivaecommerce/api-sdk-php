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
    /** @var string */
    protected string $keyBlob;

    /** @var string */
    protected string $comment;

    /**
     * SSHAgentKey constructor.
     * @param string $keyBlob
     * @param string $comment
     */
	public function __construct(string $keyBlob, string $comment)
	{
		$this->keyBlob = $keyBlob;
		$this->comment = $comment;
	}
}
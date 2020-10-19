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
 * Class SSHAgentKeyListRequest.
 *
 * @package MerchantAPI
 */
class SSHAgentKeyListRequest extends SSHAgentMessage
{
    /** @var array */
	protected $keys = [];

    /**
     * @return string|void
     */
	public function Pack()
	{
		return pack('NC', 1, SSHAgentSignClient::SSH_AGENTC_REQUEST_IDENTITIES);
	}

    /**
     * @param $data
     * @throws \Exception
     */
	public function Unpack($data)
	{
		$header = unpack('C1response/N1key_count', $data, 1);

		if (!isset($header['response']) || $header['response'] != SSHAgentSignClient::SSH_AGENT_IDENTITIES_ANSWER) {
			var_dump($header);
			throw new \Exception('Invalid Response');
		}

		$offset = 5;
		if (isset($header['key_count']) && $header['key_count'] > 0) {
			for ($i = 0; $i < $header['key_count']; $i++) {
				$keyBlobLen = unpack('N', $data, $offset);
				$offset += 4;
				$keyBlobUnpacked = unpack(sprintf('C%dkey_blob/N1comment_length', $keyBlobLen[1]), $data, $offset);
				$offset += $keyBlobLen[1];
				$comment = unpack(sprintf('a%dcomment', $keyBlobUnpacked['comment_length']), $data, $offset);

				$this->keys[] = new SSHAgentKey($keyBlobUnpacked['key_blob'], $comment['comment']);
			}
		}
	}
}
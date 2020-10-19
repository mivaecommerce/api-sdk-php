<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Authenticator;

use MerchantAPI\SSHAgent\SSHAgentSignClient;
use MerchantAPI\SSHAgent\SSHAgentSignRequest;

/**
 * SSHAgentAuthenticator handles authentication via signing
 * with an SSH Private Key through your local ssh-agent.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class SSHAgentAuthenticator implements Authenticator 
{
    /** @var int SHA256 */
	const DIGEST_TYPE_SSH_RSA_SHA256 = SSHAgentSignClient::SSH_AGENT_RSA_SHA2_256;

    /** @var int SHA512 */
	const DIGEST_TYPE_SSH_RSA_SHA512 = SSHAgentSignClient::SSH_AGENT_RSA_SHA2_512;

	/** @var string */
	protected $username;

	/** @var array */
	protected $publicKey;

	/** @var int */
	protected $digestType;

    /**
     * SSHAgentAuthenticator constructor.
     * @param $username
     * @param $publicKeyPath
     * @param null $agentSockPath
     * @param int $digestType
     * @throws \Exception
     */
	public function __construct($username, $publicKeyPath, $agentSockPath = null, $digestType = self::DIGEST_TYPE_SSH_RSA_SHA256)
	{
		$this->username = $username;
		$this->agent = new SSHAgentSignClient($agentSockPath);
		$this->setPublicKey($publicKeyPath);
		$this->digestType = $digestType;
	}

    /**
     * @param $publicKeyPath
     * @return $this
     * @throws \Exception
     */
	public function setPublicKey($publicKeyPath) {
		if (strlen($publicKeyPath)) {
			if (!file_exists($publicKeyPath)) {
				throw new \Exception('Public key file does not exist');
			}

			$this->setPublicKeyString(file_get_contents($publicKeyPath));
		}

		return $this;
	}

    /**
     * @return array
     */
	public function getPublicKey()
	{
		return $this->publicKey;
	}

    /**
     * @return int
     */
    public function getDigestType()
    {
        return $this->digestType;
    }

    /**
     * @param $digestType
     * @return $this
     */
    public function setDigestType($digestType)
    {
        $this->digestType = $digestType;
        return $this;
    }

    /**
     * @return string
     */
	public function getUsername()
	{
		return $this->username;
	}

    /**
     * @param $username
     */
	public function setUsername($username)
	{
		$this->username = $username;
	}

    /**
     * @param $publicKey
     * @return $this
     */
	public function setPublicKeyString($publicKey) {
		if (strpos($publicKey, ' ') !== false) {
			$parts = explode(' ', $publicKey);

			if (count($parts) >= 2) {
				$this->publicKey = base64_decode($parts[1]);
			} else {
				$this->publicKey = base64_decode($parts[0]);
			}
		} else {
			$this->publicKey = base64_decode($publicKey);
		}

		return $this;
	}

    /**
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
	public function generateAuthenticationHeader($data)
	{
		if ($this->digestType == static::DIGEST_TYPE_SSH_RSA_SHA512) {
			return sprintf('SSH-RSA-SHA2-512 %s:%s', base64_encode($this->username), $this->signData($data));			
		}

		return sprintf('SSH-RSA-SHA2-256 %s:%s', base64_encode($this->username), $this->signData($data));
	}

    /**
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
	public function signData($data)
	{
		$this->agent->connect();

		$signRequest = new SSHAgentSignRequest();

		$signRequest->setPublicKey($this->publicKey)
			->setSignData($data)
			->setDigestType($this->digestType);

		$this->agent->sendMessage($signRequest);

		$this->agent->disconnect();

		return base64_encode($signRequest->getSignature());
	}
}
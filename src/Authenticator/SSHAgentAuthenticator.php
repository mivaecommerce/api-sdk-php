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
	protected string $username;

	/** @var string */
	protected string $publicKey;

	/** @var int */
	protected int $digestType;

    /** @var SSHAgentSignClient */
    protected SSHAgentSignClient $agent;

    /**
     * SSHAgentAuthenticator constructor.
     * @param string $username
     * @param string $publicKeyPath
     * @param ?string $agentSockPath
     * @param int $digestType
     * @throws \Exception
     */
	public function __construct(string $username, string $publicKeyPath, ?string $agentSockPath = null, int $digestType = self::DIGEST_TYPE_SSH_RSA_SHA256)
	{
		$this->username = $username;
		$this->agent = new SSHAgentSignClient($agentSockPath);
		$this->setPublicKey($publicKeyPath);
		$this->digestType = $digestType;
	}

    /**
     * @param string $publicKeyPath
     * @return $this
     * @throws \Exception
     */
	public function setPublicKey(string $publicKeyPath) {
		if (strlen($publicKeyPath)) {
			if (!file_exists($publicKeyPath)) {
				throw new \Exception('Public key file does not exist');
			}

			$this->setPublicKeyString(file_get_contents($publicKeyPath));
		}

		return $this;
	}

    /**
     * @return string
     */
	public function getPublicKey() : string
	{
		return $this->publicKey;
	}

    /**
     * @return int
     */
    public function getDigestType() : int
    {
        return $this->digestType;
    }

    /**
     * @param int $digestType
     * @return $this
     */
    public function setDigestType(int $digestType) : self
    {
        $this->digestType = $digestType;
        return $this;
    }

    /**
     * @return string
     */
	public function getUsername() : string
	{
		return $this->username;
	}

    /**
     * @param string $username
     * @return $this
     */
	public function setUsername(string $username) : self
	{
		$this->username = $username;
        return $this;
	}

    /**
     * @param string $publicKey
     * @return $this
     */
	public function setPublicKeyString(string $publicKey) : self
    {
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
     * @param string $data
     * @return string
     * @throws \Exception
     */
	public function generateAuthenticationHeader(string $data) : string
	{
		if ($this->digestType == static::DIGEST_TYPE_SSH_RSA_SHA512) {
			return sprintf('SSH-RSA-SHA2-512 %s:%s', base64_encode($this->username), $this->signData($data));			
		}

		return sprintf('SSH-RSA-SHA2-256 %s:%s', base64_encode($this->username), $this->signData($data));
	}

    /**
     * @param string $data
     * @return string
     * @throws \Exception
     */
	public function signData(string $data) : string
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
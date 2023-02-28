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
 * Class SSHAgentSignRequest.
 *
 * @package MerchantAPI
 */
class SSHAgentSignRequest extends SSHAgentMessage
{
    /** @var ?string */
	protected ?string $publicKey;

	/** @var ?string */
	protected ?string $signData;

	/** @var int */
	protected int $digestType;

	/** @var ?string */
	protected ?string $signatureType;

	/** @var ?string */
	protected ?string $signature;

    /**
     * SSHAgentSignRequest constructor.
     * @param ?string $publicKey
     * @param ?string $signData
     * @param int $digestType
     */
	public function __construct(?string $publicKey = null, ?string $signData = null, int $digestType = SSHAgentSignClient::SSH_AGENT_RSA_SHA2_256)
	{
		$this->publicKey = $publicKey;
		$this->signData = $signData;
		$this->digestType = $digestType;
	}

    /**
     * @param ?string $key
     * @return $this
     */
	public function setPublicKey(?string $key) : self
    {
		$this->publicKey = $key;
		return $this;
	}

    /**
     * @return ?string
     */
	public function getPublicKey() : ?string
    {
		return $this->publicKey;
	}

    /**
     * @param ?string $data
     * @return $this
     */
	public function setSignData(?string $data) : self
    {
		$this->signData = $data;
		return $this;
	}

    /**
     * @return string
     */
	public function getSignData() : ?string
    {
		return $this->signData;
	}

    /**
     * @param int $type
     * @return $this
     * @throws \Exception
     */
	public function setDigestType(int $type) : self
    {
		if (!in_array($type, [ SSHAgentSignClient::SSH_AGENT_RSA_SHA2_256, SSHAgentSignClient::SSH_AGENT_RSA_SHA2_512 ]))
		{
			throw new \Exception('Invalid digest type');
		}
		$this->digestType = $type;
		return $this;
	}

    /**
     * @return int
     */
	public function getDigestType() : int
    {
		return $this->digestType;
	}

    /**
     * @return ?string
     */
	public function getSignatureType() : ?string
    {
		return $this->signatureType;
	}

    /**
     * @return ?string
     */
	public function getSignature() : ?string
    {
		return $this->signature;
	}

    /**
     * @return string
     */
	public function Pack() : string
	{
		$keyLen = strlen($this->publicKey);
		$signDataLen = strlen($this->signData);
		$totalLen = $keyLen + $signDataLen + 13;

		return pack(sprintf('NCNa%dNa%dN', $keyLen, $signDataLen), 
			$totalLen,
			SSHAgentSignClient::SSH_AGENTC_SIGN_REQUEST,
			$keyLen,
			$this->publicKey,
			$signDataLen,
			$this->signData,
			$this->digestType
		);
	}

    /**
     * @param string $data
     * @return void
     * @throws \Exception
     */
	public function Unpack(string $data) : void
	{
		$header = unpack('C', $data, 0);

		if (!isset($header[1]) || $header[1] != SSHAgentSignClient::SSH_AGENT_SIGN_RESPONSE) {
			throw new \Exception('Invalid Response');
		}

		$offset = 1;

		$unpacked = unpack('N1total_signature_size/N1signature_type_length', $data, $offset);

		$offset += 8;

		$unpackedSignatureType = unpack(sprintf('a%dsignature_type/N1signature_length', $unpacked['signature_type_length']), $data, $offset);

		$this->signatureType = $unpackedSignatureType['signature_type'];

		$offset += $unpacked['signature_type_length'] + 4;

		$unpackedSignature = unpack(sprintf('a%dsignature', $unpackedSignatureType['signature_length']), $data, $offset);

		$this->signature = $unpackedSignature['signature'];
	}
}
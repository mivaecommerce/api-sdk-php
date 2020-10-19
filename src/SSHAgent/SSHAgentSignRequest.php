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
    /** @var null buffer */
	protected $publicKey;

	/** @var null string */
	protected $signData;

	/** @var int */
	protected $digestType;

	/** @var string */
	protected $signatureType;

	/** @var buffer */
	protected $signature;

    /**
     * SSHAgentSignRequest constructor.
     * @param null $publicKey
     * @param null $signData
     * @param int $digestType
     */
	public function __construct($publicKey = null, $signData = null, $digestType = SSHAgentSignClient::SSH_AGENT_RSA_SHA2_256)
	{
		$this->publicKey = $publicKey;
		$this->signData = $signData;
		$this->digestType = $digestType;
	}

    /**
     * @param $key
     * @return $this
     */
	public function setPublicKey($key) {
		$this->publicKey = $key;
		return $this;
	}

    /**
     * @return |null
     */
	public function getPublicKey() {
		return $this->publicKey;
	}

    /**
     * @param $data
     * @return $this
     */
	public function setSignData($data) {
		$this->signData = $data;
		return $this;
	}

    /**
     * @return string
     */
	public function getSignData() {
		return $this->signData;
	}

    /**
     * @param $type
     * @return $this
     * @throws \Exception
     */
	public function setDigestType($type) {
		if (!in_array((int)$type, [ SSHAgentSignClient::SSH_AGENT_RSA_SHA2_256, SSHAgentSignClient::SSH_AGENT_RSA_SHA2_512 ]))
		{
			throw new \Exception('Invalid digest type');
		}
		$this->digestType = $type;
		return $this;
	}

    /**
     * @return int
     */
	public function getDigestType() {
		return $this->digestType;
	}

    /**
     * @return string
     */
	public function getSignatureType() {
		return $this->signatureType;
	}

    /**
     * @return buffer
     */
	public function getSignature() {
		return $this->signature;
	}

    /**
     * @return string
     */
	public function Pack()
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
     * @param $data
     * @throws \Exception
     */
	public function Unpack($data)
	{
		$header = unpack('C', $data, 0);

		if (!isset($header[1]) || $header[1] != SSHAgentSignClient::SSH_AGENT_SIGN_RESPONSE) {
			var_dump($header);
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
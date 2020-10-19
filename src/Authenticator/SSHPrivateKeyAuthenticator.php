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


/**
 * SSHPrivateKeyAuthenticator handles authentication via signing
 * with an SSH Private Key.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class SSHPrivateKeyAuthenticator implements Authenticator 
{
    /** @var string SHA256 */
	const DIGEST_TYPE_SSH_RSA_SHA256 = 'sha256';

	/** @var string SHA512 */
	const DIGEST_TYPE_SSH_RSA_SHA512 = 'sha512';

	/** @var string */
	protected $username;

	/** @var resource */
	protected $privateKey;

	/** @var string */
	protected $digestType;

    /**
     * SSHPrivateKeyAuthenticator constructor.
     * @param $username
     * @param $privateKeyFilePath
     * @param null $privateKeyPassword
     * @param string $digestType
     * @throws \Exception
     */
	public function __construct($username, $privateKeyFilePath, $privateKeyPassword = null, $digestType = self::DIGEST_TYPE_SSH_RSA_SHA256)
	{
		$this->username = $username;
		$this->digestType = $digestType;

		if (is_string($privateKeyFilePath) && strlen($privateKeyFilePath)) {
			$this->setPrivateKey($privateKeyFilePath, $privateKeyPassword);
		}
	}

    /**
     * Destructor
     */
	public function __destruct()
	{
		if (is_resource($this->privateKey)) {
			openssl_pkey_free($this->privateKey);
		}
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
     * @return $this
     */
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}

    /**
     * @param $filePath
     * @param $password
     * @throws \Exception
     */
	public function setPrivateKey($filePath, $password)
	{
		if (!file_exists($filePath)) {
			throw new \Exception(sprintf('File %s does not eixst', $filePath));
		}

		$fileContent = file_get_contents($filePath);

		if ($fileContent === false) {
			throw new \Exception('');
		}

		return $this->setPrivateKey_String($fileContent, $password);
	}

    /**
     * @return resource
     */
	public function getPrivateKey()
	{
		return $this->privateKey;
	}

    /**
     * @param $data
     * @param $password
     * @throws \Exception
     */
	public function setPrivateKey_String($data, $password)
	{
		if (is_resource($this->privateKey)) {
			openssl_pkey_free($this->privateKey);
		}

		$this->privateKey = openssl_pkey_get_private($data, $password);

		if (!is_resource($this->privateKey))
		{
			throw new \Exception(sprintf('Error Reading Private Key: %s', openssl_error_string()));
		}
	}

    /**
     * @return string
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
		if (!in_array($this->digestType, [static::DIGEST_TYPE_SSH_RSA_SHA256, static::DIGEST_TYPE_SSH_RSA_SHA512])) {
			throw new \Exception('Invalid Digest Type');
		}

		$signature = null;
		if (!openssl_sign($data, $signature, $this->privateKey, $this->digestType)) {
			throw new \Exception(sprintf('Error signing data: %s', openssl_error_string()));
		}

		return base64_encode($signature);
	}
}
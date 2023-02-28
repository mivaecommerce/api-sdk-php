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
	protected string $username;

	/** @var resource|\OpenSSLAsymmetricKey */
	protected $privateKey;

	/** @var string */
	protected string $digestType;

    /**
     * SSHPrivateKeyAuthenticator constructor.
     * @param string $username
     * @param string $privateKeyFilePath
     * @param ?string $privateKeyPassword
     * @param string $digestType
     * @throws \Exception
     */
	public function __construct(string $username, string $privateKeyFilePath, ?string $privateKeyPassword = null, string $digestType = self::DIGEST_TYPE_SSH_RSA_SHA256)
	{
		$this->username = $username;
		$this->digestType = $digestType;

		if ($privateKeyFilePath && strlen($privateKeyFilePath)) {
			$this->setPrivateKey($privateKeyFilePath, $privateKeyPassword);
		}
	}

    /**
     * Destructor
     */
	public function __destruct()
	{
		if ($this->isValidPrivateKey()) {
			openssl_pkey_free($this->privateKey);
		}
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
     * @param string $filePath
     * @param ?string $password
     * @return $this
     * @throws \Exception
     */
	public function setPrivateKey(string $filePath, ?string $password)
	{
		if (!file_exists($filePath)) {
			throw new \Exception(sprintf('File %s does not exist', $filePath));
		}

		$fileContent = file_get_contents($filePath);

		if ($fileContent === false) {
			throw new \Exception('Error reading private key file contents');
		}

		return $this->setPrivateKey_String($fileContent, $password);
	}

    /**
     * @return resource|\OpenSSLAsymmetricKey
     */
	public function getPrivateKey()
	{
		return $this->privateKey;
	}

    /**
     * @param string $data
     * @param ?string $password
     * @throws \Exception
     */
	public function setPrivateKey_String(string $data, ?string $password) : self
	{
		if ($this->isValidPrivateKey()) {
			openssl_pkey_free($this->privateKey);
		}

		$this->privateKey = openssl_pkey_get_private($data, $password);

		if (!$this->isValidPrivateKey())
		{
			throw new \Exception(sprintf('Error Reading Private Key: %s', openssl_error_string()));
		}

        return $this;
	}

    public function isValidPrivateKey() : bool
    {
        if (PHP_MAJOR_VERSION >= 8) {
            return $this->privateKey instanceof \OpenSSLAsymmetricKey;
        }

        return is_resource($this->privateKey);
    }

    /**
     * @return string
     */
    public function getDigestType() : string
    {
        return $this->digestType;
    }

    /**
     * @param string $digestType
     * @return $this
     */
    public function setDigestType(string $digestType) : self
    {
        $this->digestType = $digestType;
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
     * @return mixed|string
     * @throws \Exception
     */
	public function signData(string $data) : string
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
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
 * TokenAuthenticator handles authentication via API Token with
 * an optional (but default) HMAC signature.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class TokenAuthenticator implements Authenticator 
{
    /** @var string SHA1 Digest */
    const SIGN_DIGEST_SHA1      = 'sha1';

    /** @var string SHA256 Digest */
    const SIGN_DIGEST_SHA256    = 'sha256';

    /** @var string No Request Signing */
    const SIGN_DIGEST_NONE      = false;

    /** @var string */
	protected $apiToken;

	/** @var string */
	protected $signingKey;

	/** @var string */
	protected $digestType;

    /** @var array Valid Digests */
    protected $digests = [
        self::SIGN_DIGEST_SHA1,
        self::SIGN_DIGEST_SHA256
    ];

    public function __construct($apiToken, $signingKey, $digestType = self::SIGN_DIGEST_SHA256)
    {
    	$this->apiToken = $apiToken;
    	$this->signingKey = $signingKey;
    	$this->digestType = $digestType;
    }

    /**
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
    public function generateAuthenticationHeader($data)
	{
        $digest = strtolower(trim($this->digestType));

        if (!in_array($digest, $this->digests)) {
            return sprintf('MIVA %s', $this->getApiToken());
        }

        return sprintf('MIVA-HMAC-%s %s:%s', strtoupper($digest), $this->getApiToken(), $this->signData($data));
	}

    /**
     * @param $data
     * @return mixed|string
     * @throws \Exception
     */
	public function signData($data)
	{
		if (!is_string($data)) {
            throw new \Exception(sprintf('Invalid signing data type. Expecting string but got %s',
                is_object($data) ? get_class($data) : gettype($data)));
        }

        $digest = strtolower(trim($this->digestType));

        if (!in_array($digest, $this->digests)) {
            throw new \Exception('Invalid Sign Type');
        }

        if (!$this->signingKey) {
            throw new \Exception('No signing key to sign request');
        }

        $signature = hash_hmac($digest, $data, base64_decode($this->signingKey), true);

        if ($signature === false) {
            throw new \Exception('Error generating signature');
        }

        return base64_encode($signature);
	}

    /**
     * Get the authentication API token.
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * Set the authentication API token.
     *
     * @param string $apiToken
     * @return \MerchantAPI\TokenAuthenticator
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
        return $this;
    }

    /**
     * Get the request signing key, base64 encoded.
     *
     * @return string
     */
    public function getSigningKey()
    {
        return $this->signingKey;
    }

    /**
     * Set the base64 encoded request signing key.
     *
     * @param string $signingKey
     * @return TokenAuthenticator
     */
    public function setSigningKey($signingKey)
    {
        $this->signingKey = $signingKey;
        return $this;
    }

    /**
     * Get the digest type
     *
     * @return string
     */
    public function getDigestType()
    {
        return $this->digestType;
    }

    /**
     * Set the digest type
     *
     * @param string $digestType
     * @return TokenAuthenticator
     */
    public function setDigestType($digestType)
    {
        $this->digestType = $digestType;
        return $this;
    }
}
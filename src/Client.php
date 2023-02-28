<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI;

use MerchantAPI\Authenticator\TokenAuthenticator;

/**
 * Handles sending API Requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class Client extends BaseClient
{
    /** @var string SHA1 Digest */
    const SIGN_DIGEST_SHA1      = 'sha1';

    /** @var string SHA256 Digest */
    const SIGN_DIGEST_SHA256    = 'sha256';

    /** @var string No Request Signing */
    const SIGN_DIGEST_NONE      = false;

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param string $apiToken
     * @param ?string $signingKey
     * @param array $options
     */
    public function __construct(string $endpoint, string $apiToken, ?string $signingKey = null, array $options = [])
    {
        parent::__construct($endpoint, new TokenAuthenticator($apiToken, $signingKey), $options);
    }

    /**
     * Get the authentication API token.
     *
     * @return string
     */
    public function getApiToken() : ?string
    {
        if ($this->authenticator instanceof TokenAuthenticator) {
            return $this->authenticator->getApiToken();
        }

        return null;
    }

    /**
     * Set the authentication API token.
     *
     * @param string $apiToken
     * @return $this
     */
    public function setApiToken(string $apiToken) : self
    {
        if ($this->authenticator instanceof TokenAuthenticator) {
            $this->authenticator->setApiToken($apiToken);
        }

        return $this;
    }

    /**
     * Set a client option.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     * @throws \MerchantAPI\ClientException
     */
    public function setOption(string $key, $value) : self
    {
        if ($key == 'signing_key_digest') {
            if ($this->authenticator instanceof TokenAuthenticator) {
                $this->authenticator->setDigestType($value);
            }

            return $this;
        }

        return parent::setOption($key, $value);
    }

    /**
     * Get a client option.
     *
     * @param string $key
     * @return mixed
     * @throws \MerchantAPI\ClientException
     */
    public function getOption(string $key)
    {
        if ($key == 'signing_key_digest') {
            if ($this->authenticator instanceof TokenAuthenticator) {
                return $this->authenticator->getDigestType();
            }

            return null;
        }

        return parent::getOption($key);
    }

    /**
     * Get the request signing key, base64 encoded.
     *
     * @return string
     */
    public function getSigningKey() : ?string
    {
        if ($this->authenticator instanceof TokenAuthenticator) {
            return $this->authenticator->getSigningKey();
        }

        return null;
    }

    /**
     * Set the base64 encoded request signing key.
     *
     * @param ?string $signingKey
     * @return $this
     */
    public function setSigningKey(?string $signingKey) : self
    {
        if ($this->authenticator instanceof TokenAuthenticator) {
            $this->authenticator->setSigningKey($signingKey);
        }

        return $this;
    }
}
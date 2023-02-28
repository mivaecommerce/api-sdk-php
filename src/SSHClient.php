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

use MerchantAPI\Authenticator\SSHPrivateKeyAuthenticator;

/**
 * Handles sending API Requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class SSHClient extends BaseClient
{
    /**
     * SSHClient constructor.
     * @param string $endpoint
     * @param string $username
     * @param string $privateKeyFilePath
     * @param ?string $privateKeyPassword
     * @param string $digestType
     * @param array $options
     * @throws \Exception
     */
    public function __construct(string $endpoint, string $username, string $privateKeyFilePath, ?string $privateKeyPassword = null, string $digestType = SSHPrivateKeyAuthenticator::DIGEST_TYPE_SSH_RSA_SHA256, array $options = [])
    {
        parent::__construct($endpoint, new SSHPrivateKeyAuthenticator($username, $privateKeyFilePath, $privateKeyPassword, $digestType), $options);
    }

    /**
     * @return resource
     */
    public function getPrivateKey()
    {
        return $this->authenticator->getPrivateKey();
    }

    /**
     * @param string $privateKeyPath
     * @param ?string $password
     * @return $this
     */
    public function setPrivateKey(string $privateKeyPath, ?string $password) : self
    {
        $this->authenticator->setPrivateKey($privateKeyPath, $password);
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->authenticator->getUsername();
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username) : self
    {
        $this->authenticator->setUsername($username);
        return $this;
    }

    /**
     * @return string
     */
    public function getDigestType() : string
    {
        return $this->authenticator->getDigestType();
    }

    /**
     * @param string $digestType
     * @return $this
     */
    public function setDigestType(string $digestType) : self
    {
        $this->authenticator->setDigestType($digestType);
        return $this;
    }
}
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

use MerchantAPI\Authenticator\SSHAgentAuthenticator;

/**
 * Handles sending API Requests.
 *
 * @package MerchantAPI
 * @see https://docs.miva.com/json-api/#authentication
 */
class SSHAgentClient extends BaseClient
{
    /**
     * SSHAgentClient constructor.
     * @param string $endpoint
     * @param string $username
     * @param string $publicKeyPath
     * @param ?string $agentSocketPath
     * @param int $digestType
     * @param array $options
     * @throws \Exception
     */
    public function __construct(string $endpoint, string $username, string $publicKeyPath, ?string $agentSocketPath = null, int $digestType = SSHAgentAuthenticator::DIGEST_TYPE_SSH_RSA_SHA256, array $options = [])
    {
        parent::__construct($endpoint, new SSHAgentAuthenticator($username, $publicKeyPath, $agentSocketPath, $digestType), $options);
    }

    /**
     * @return string
     */
    public function getPublicKey() : string
    {
        return $this->authenticator->getPrivateKey();
    }

    /**
     * @param string $publicKeyPath
     * @return $this
     */
    public function setPublicKey(string $publicKeyPath) : self
    {
        $this->authenticator->setPublicKey($publicKeyPath);
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
     * @param int $digestType
     * @return $this
     */
    public function setDigestType(int $digestType) : self
    {
        $this->authenticator->setDigestType($digestType);
        return $this;
    }
}
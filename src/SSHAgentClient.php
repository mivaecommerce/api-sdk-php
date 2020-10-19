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
     * @param $endpoint
     * @param $username
     * @param $publicKeyPath
     * @param null $agentSocketPath
     * @param int $digestType
     * @param array $options
     * @throws \Exception
     */
    public function __construct($endpoint, $username, $publicKeyPath, $agentSocketPath = null, $digestType = SSHAgentAuthenticator::DIGEST_TYPE_SSH_RSA_SHA256, array $options = [])
    {
        parent::__construct($endpoint, new SSHAgentAuthenticator($username, $publicKeyPath, $agentSocketPath, $digestType), $options);
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->authenticator->getPrivateKey();
    }

    /**
     * @param $publicKeyPath
     * @return $this
     */
    public function setPublicKey($publicKeyPath)
    {
        $this->authenticator->setPublicKey($publicKeyPath);
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->authenticator->getUsername();
    }

    /**
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->authenticator->setUsername($username);
        return $this;
    }

    /**
     * @return string
     */
    public function getDigestType()
    {
        return $this->authenticator->getDigestType();
    }

    /**
     * @param $digestType
     * @return $this
     */
    public function setDigestType($digestType)
    {
        $this->authenticator->setDigestType($digestType);
        return $this;
    }
}
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
     * @param $endpoint
     * @param $username
     * @param $privateKeyFilePath
     * @param null $privateKeyPassword
     * @param string $digestType
     * @param array $options
     * @throws \Exception
     */
    public function __construct($endpoint, $username, $privateKeyFilePath, $privateKeyPassword = null, $digestType = SSHPrivateKeyAuthenticator::DIGEST_TYPE_SSH_RSA_SHA256, array $options = [])
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
     * @param $privateKeyPath
     * @param $password
     * @return $this
     */
    public function setPrivateKey($privateKeyPath, $password)
    {
        $this->authenticator->setPrivateKey($privateKeyPath, $password);
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
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once( dirname( __FILE__ ).'/../vendor/autoload.php');

use MerchantAPI\SSHAgentClient;
use MerchantAPI\Authenticator\SSHAgentAuthenticator;

$api_endpoint       = 'https://www.mystore.com/mm5/json.mvc';
$store_username     = 'Username';
$public_key_file    = '/path/to/openssh/public/key.pem';  // See README.md for compatible formats
$digest_type        = SSHAgentAuthenticator::DIGEST_TYPE_SSH_RSA_SHA256;
$agent_socket_path  = ''; // Optionally set this, defaults to environment variable SSH_AUTH_SOCK

$client_options = [
    /*
        Boolean value designating if each request should include a
        timestamp or not. Default is true.
    */
    'require_timestamp'         => true,

    /*
        The default store code that will be added to each request that
        did not have one specified. Default is null.
    */
    'default_store_code'        => 'MYSTORE',

    /* Multi call operation timeout, in seconds. Defaults to 60 */
    'operation_timeout'         => 60,

    /*
        You can specify/override cURL options as an array
        of CURPOT_* constans as key/value pairs.

        The default options set are:
            [
                CURLOPT_USERAGENT       => 'MerchantAPI-' . Version::STRING . '/php',
                CURLOPT_SSL_VERIFYPEER  => true,
                CURLOPT_SSL_VERIFYHOST  => 2
            ]
    */
    'curl_options'              => []
];

$client = new SSHAgentClient($api_endpoint, $store_username, $public_key_file, $digest_type, $agent_socket_path, $client_options);
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

use MerchantAPI\Client;

$api_endpoint       = 'https://www.mystore.com/mm5/json.mvc';
$api_token          = 'TOKEN_CREATED_IN_ADMIN';
$api_signing_key    = 'SIGNING_KEY_GENERATED_FOR_TOKEN';

$client_options = [
    /*
        Boolean value designating if each request should include a
        timestamp or not. Default is true.
    */
    'require_timestamp'         => true,

    /*
        The signing digest type used for request signatures. Available
        options:
            Client::SIGN_DIGEST_SHA1
            Client::SIGN_DIGEST_SHA256
            Client::SIGN_DIGEST_NONE

        Defaults to Client::SIGN_DIGEST_SHA256
    */
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,

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

$client = new Client($api_endpoint, $api_token, $api_signing_key, $client_options);


/// Request Logging can be enabled by assigning a Logger instance to the client

/// Currently, we provide two logger types:
//       FileLogger - logs to a local file
//       ConsoleLogger - logs to std out/err

// Setting up a FileLogger
$client->setLogger(new \MerchantAPI\Logger\FileLogger("/path/to/my/logfile.log"));

// Setting up a ConsoleLogger to log to stdout
$client->setLogger(new \MerchantAPI\Logger\ConsoleLogger(\MerchantAPI\Logger\ConsoleLogger::DESTINATION_STDOUT));

// Setting up a ConsoleLogger to log to stderr
$client->setLogger(new \MerchantAPI\Logger\ConsoleLogger(\MerchantAPI\Logger\ConsoleLogger::DESTINATION_STDERR));
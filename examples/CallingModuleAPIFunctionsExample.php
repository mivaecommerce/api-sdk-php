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
use MerchantAPI\ClientException;
use MerchantAPI\Request\Module;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/*
 * If you create a custom module or want to hook into an existing modules API functionality it exposes you can
 * use the Module request class to call into the module.
 */

$request = new Module($client);

$request->setModuleCode('MyModuleCode')
    ->setModuleFunction('MyModuleFunction');

/* Add custom parameters to the request using the setModuleField method */

$request->setModuleField('MyModuleField', 'Foo')
    ->setModuleField('MyModuleField_Array', [
        'foo' => 'bar'
    ]);

/*
 * It is best practice to create a custom class for your Module
 * by extending the Module or the Request class.
 */

/* send the request for the response */
try
{
    $response = $request->send(); // MerchantAPI\Response\Module
    // Alternately: $response = $client->send($request); // MerchantAPI\Response\Module
} catch(ClientException $e) {
    printf("Error Executing Module Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$response->isSuccess()) {
    printf("Module Error: %s - %s\r\n", $response->getErrorCode(), $response->getErrorMessage());
    exit;
}
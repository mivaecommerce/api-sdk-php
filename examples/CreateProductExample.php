<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: CreateProductExample.php 71516 2018-11-13 21:17:45Z gidriss $
 */

require_once( dirname( __FILE__ ).'/../vendor/autoload.php');

use MerchantAPI\Client;
use MerchantAPI\ClientException;
use MerchantAPI\Request\ProductInsert;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/* Create a new ProductInsert object */
$productInsertRequest = new ProductInsert();

/* or
 * $client->createRequest('ProductInsert');
 */

$productInsertRequest->setProductCode('NEW_PRODUCT')
    ->setProductName('My New Product')
    ->setProductPrice(29.99)
    ->setProductWeight(1.5);

/* send the request for the response */
try
{
    $productInsertResponse = $client->send($productInsertRequest); // MerchantAPI\Response\ProductInsert
} catch(ClientException $e) {
    printf("Error Executing ProductInsert Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$productInsertResponse->isSuccess()) {
    printf("ProductInsert Error: %s - %s\r\n", $productInsertResponse->getErrorCode(), $productInsertResponse->getErrorMessage());
    exit;
}
<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: UpdateProductInventoryExample.php 71528 2018-11-14 01:11:15Z gidriss $
 */

require_once( dirname( __FILE__ ).'/../vendor/autoload.php');

use MerchantAPI\Client;
use MerchantAPI\ClientException;
use MerchantAPI\Request\ProductListAdjustInventory;
use MerchantAPI\Model\ProductInventoryAdjustment;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/* Create a new ProductListAdjustInventory model object */
$productInventoryAdjustRequest = new ProductListAdjustInventory();

/* or
 * $client->createRequest('ProductListAdjustInventory');
 */

/* Create instances of ProductInventoryAdjustment for each adjustment we want to make */

/* Add 100 to inventory count by product code */
$adjustment1 = new ProductInventoryAdjustment();
$adjustment1->setProductCode('PRODUCT_1')
    ->setAdjustment(100);

/* Subtract 25 from inventory count by product code */
$adjustment2 = new ProductInventoryAdjustment();
$adjustment2->setProductCode('PRODUCT_2')
    ->setAdjustment(-25);

/* Add 10 to inventory count by product id */
$adjustment3 = new ProductInventoryAdjustment();
$adjustment3->setProductId(10248)
    ->setAdjustment(10);

/* Add 30 to inventory count by product sku */
$adjustment4 = new ProductInventoryAdjustment();
$adjustment4->setProductSku('ProductSku1')
    ->setAdjustment(30);

/* Add the ProductInventoryAdjustment object to the Request */
$productInventoryAdjustRequest->addInventoryAdjustment($adjustment1);

/* You can also add an array of ProductInventoryAdjustment */
$productInventoryAdjustRequest->addInventoryAdjustments([
    $adjustment2,
    $adjustment3,
    $adjustment4
]);

/* send the request for the response */
try
{
    $productInventoryAdjustResponse= $client->send($productInventoryAdjustRequest); // MerchantAPI\Response\ProductListAdjustInventory
} catch(ClientException $e) {
    printf("Error Executing ProductListAdjustInventory Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$productInventoryAdjustResponse->isSuccess()) {
    printf("ProductListAdjustInventory Error: %s - %s\r\n", $productInventoryAdjustResponse->getErrorCode(), $productInventoryAdjustResponse->getErrorMessage());
    exit;
}
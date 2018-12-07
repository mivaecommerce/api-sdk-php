<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id: LoadAndEditProductExample.php 71516 2018-11-13 21:17:45Z gidriss $
 */

require_once( dirname( __FILE__ ).'/../vendor/autoload.php');

use MerchantAPI\Client;
use MerchantAPI\ClientException;
use MerchantAPI\Request\ProductListLoadQuery;
use MerchantAPI\Request\ProductUpdate;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/* Create a new ProductListLoadQuery Request object */
$productListRequest = new ProductListLoadQuery();

/* or
 * $client->createRequest('ProductListLoadQuery');
 */

/*
 * apply filtering to match a specific product
 *
 * @see ListQueryExample.php
 */
$productListRequest->setFilters(
    $productListRequest
        ->filterExpression()
        ->equal('code', 'MY_PRODUCT')
);

/* send the request for the response */
try
{
    $productListResponse = $client->send($productListRequest); // MerchantAPI\Response\ProductListLoadQuery
} catch(ClientException $e) {
    printf("Error Executing ProductListLoadQuery Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$productListResponse->isSuccess()) {
    printf("ProductListLoadQuery Error: %s - %s\r\n", $productListResponse->getErrorCode(), $loadProductResponse->getErrorMessage());
    exit;
}

/*
 * get the first product form the result list
 *
 * @see MerchantAPI\Collection
 */
$product = $productListResponse->getProducts()->first();

printf("Loaded Product %s Code %s Name %s\r\n", $product->getId(), $product->getCode(), $product->getName());

/*
 * Some requests accept a Model object in their constructor
 * which will allow the Request object to inherit data from.
 * ProductUpdate accepts a Product model.
 */
$updateProductRequest = new ProductUpdate($product);

/*
 * or
 * $updateProductRequest = $client->createRequest('ProductUpdate', [ $product ] );
 */

$updateProductRequest->setProductName('The New Product Name')
    ->setProductDescription('New Product Description')
    ->setProductPrice(39.99)
    ->setProductCost(29.99)
    ->setProductWeight(2.5);


try {
    $updateProductResponse = $client->send($updateProductRequest); // MerchantAPI\Response\ProductUpdate
} catch(ClientException $e) {
    printf("Error Executing ProductUpdate Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$updateProductResponse->isSuccess()) {
    printf("ProductUpdate Error: %s - %s\r\n", $updateProductResponse->getErrorCode(), $updateProductResponse->getErrorMessage());
    exit;
}

printf("Product ID: %d Code: %s Updated\r\n", $product->getId(), $product->getCode());
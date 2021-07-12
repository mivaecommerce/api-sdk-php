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
use MerchantAPI\MultiCall\MultiCallRequest;
use MerchantAPI\Request\ProductListLoadQuery;
use MerchantAPI\Request\CategoryListLoadQuery;
use MerchantAPI\Request\PriceGroupListLoadQuery;
use MerchantAPI\Request\ProductUpdate;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/*
 * Create a MultiCallRequest and add Request objects to it
 */

$request = new MultiCallRequest($client);

$request->addRequest(new ProductListLoadQuery())
    ->addRequest(new CategoryListLoadQuery())
    ->addRequest(new PriceGroupListLoadQuery());

try
{
    $responses = $request->send(); // MerchantAPI\MultiCall\MultiCallResponse
    // Alternately: $responses = $client->send($request); // MerchantAPI\MultiCall\MultiCallResponse
} catch(ClientException $e) {
    printf("Error Executing MultiCallRequest: %s\r\n", $e->getMessage());
    exit;
}

foreach ($responses->getResponses() as $response) {
    printf("Response for %s\r\n", $response->getRequest()->getFunction());
    print_r($response->getData());
    printf("\n\n");
}

/*
 * Utilizing the Iterations feature allows you to compact request
 * data by grouping multiple iterations to the same API function
 * in sequence.
 *
 * @see MerchantAPI\MultiCall\MultiCallOperation
 */

$request = new MultiCallRequest($client);

/* Create a new MultiCallOperation and adds it to the Request. */
$operation = $request->operation();

/*
    Alternately:
        $operation = new \MerchantAPI\MultiCall\MultiCallOperation();
        $request->addOperation($operation);
*/

# If needed, we can adjust the timeout for the multi call operation within the client. The default is 60 seconds.

$client->setOption('operation_timeout', 60);

# If you wish to automatically fetch the remaining data in the event of a timeout, you can specify the auto timeout completion flag within the request. 
# By default it is not enabled.

$request->setAutoTimeoutContinue(true);


/*  Set shared data between the iterations, for example we can set a shared
    value for Product_Price and update many products without specifying the same
    data for each of the iterations.
 */

$operation->setSharedData('Product_Price', 29.99);

/* We now add all the same request types to the operation to make use of iterations */

$operation->addRequest(
    (new ProductUpdate())
        ->setEditProduct('PROD_1')
);

$operation->addRequest(
    (new ProductUpdate())
        ->setEditProduct('PROD_2')
);

$operation->addRequest(
    (new ProductUpdate())
        ->setEditProduct('PROD_3')
);

$operation->addRequest(
    (new ProductUpdate())
        ->setProductCode('PROD_4')
        ->setProductName('Product 4')
);

// We can add more requests as well. Add a Product List Load to get the updated products at the end
$checkProducts = new ProductListLoadQuery();

$checkProducts->setFilters(
    $checkProducts->filterExpression()
        ->in('code', ['PROD_1', 'PROD_2', 'PROD_3', 'PROD_4'])
);

$request->addRequest($checkProducts);

try
{
    $responses = $request->send(); // MerchantAPI\MultiCall\MultiCallResponse
    // Alternately: $responses = $client->send($request);
} catch(ClientException $e) {
    printf("Error Executing MultiCallRequest: %s\r\n", $e->getMessage());
    exit;
}

foreach ($responses->getResponses() as $response) {
    printf("Response for %s\r\n", $response->getRequest()->getFunction());
    print_r($response->getData());
    printf("\n\n");
}
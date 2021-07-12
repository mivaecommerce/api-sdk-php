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
use MerchantAPI\Request\OrderListLoadQuery;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/* Create a new Request object */
$orderListRequest = new OrderListLoadQuery($client);

/* include additional order information by including ondemandcolumns */
$orderListRequest->setOnDemandColumns([
    'ship_method',              // include the shipping method
    'cust_login',               // include the customers login
    'cust_pw_email',            // include the customers email address
    'business_title',           // include the customers business account title
    'payment_module',           // include the payment module information
    'customer',                 // include the customer information
    'items',                    // include the orders items
    'charges',                  // include the orders charges
    'coupons',                  // include the orders coupons
    'discounts',                // include the orders discounts
    'payments'                  // include the orders payments
]);

$orderListRequest->addOnDemandColumn('notes'); // include the orders notes

/* Include all custom fields */
$orderListRequest->addOnDemandColumn('CustomField_Values:*');

/* Set the list sorting */
$orderListRequest->setSort('id', OrderListLoadQuery::SORT_DESCENDING);

/* If you wish to decrypt payment data, you must provide the passphrase used by your encryption key */
$orderListRequest->setPassphrase('MY_ENCRYPTION_KEYS_PASSPHRASE');

/* Send the request for a response */
try {
    $orderListResponse = $orderListRequest->send();
    // Alternately: $orderListResponse = $client->send($orderListRequest);
} catch(ClientException $e) {
    printf("Error Executing OrderListLoadQuery Request: %s\r\n", $e->getMessage());
    exit;
}

if (!$orderListResponse->isSuccess()) {
    printf("OrderListLoadQuery Error: %s - %s\r\n", $orderListResponse->getErrorCode(), $orderListResponse->getErrorMessage());
    exit;
}

foreach ($orderListResponse->getOrders() as $order) {
    printf("Order ID %d With %d Items, %d Charges Total %s\r\n",
        $order->getId(), $order->getItems()->count(), $order->getCharges()->count(),
        $order->getFormattedTotal());
}
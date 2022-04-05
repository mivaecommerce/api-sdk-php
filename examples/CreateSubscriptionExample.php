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
use MerchantAPI\Request\CustomerAddressListLoadQuery;
use MerchantAPI\Request\CustomerPaymentCardRegister;
use MerchantAPI\Request\SubscriptionShippingMethodListLoadQuery;
use MerchantAPI\Request\SubscriptionInsert;
use MerchantAPI\Model\SubscriptionAttribute;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

$productCode = 'MySubscriptionProduct';
$productSubscriptionTerm = 'MySubscriptionTermDescription';
$customerLogin = 'CustomerLogin';

//
// Load our subscribing customers addresses
//

$addressRequest = new CustomerAddressListLoadQueryRequest($client);

$addressRequest->setCustomerLogin($customerLogin);

try
{
    $addressResponse = $addressRequest->send();
} catch(ClientException $e) {
    printf("Error loading customer addresses: %s\r\n", $e->getMessage());
    exit;
}

if ($addressResponse->getTotalCount() == 0)
{
    print("Address not found\r\n");
    exit;
}

//
// Register a payment card with CustmerPaymentCardRegisterRequest
// Or load an existing card with CustomerPaymentCardListLoadQueryRequest
// In this example we are going to register a payment card
//

$paymentCardRequest = new CustomerPaymentCardRegister($client);

$paymentCardRequest->setCustomerLogin($customerLogin);
$paymentCardRequest->setFirstName($address->getFirstName());
$paymentCardRequest->setLastName($address->getLastName());
$paymentCardRequest->setCardType("Visa");
$paymentCardRequest->setCardNumber("4111111111111111");
$paymentCardRequest->setExpirationMonth(08);
$paymentCardRequest->setExpirationYear(2025);
$paymentCardRequest->setAddress1($address->getAddress1());
$paymentCardRequest->setAddress2($address->getAddress2());
$paymentCardRequest->setCity($address->getCity());
$paymentCardRequest->setState($address->getState());
$paymentCardRequest->setZip($address->getZip());
$paymentCardRequest->setCountry($address->getCountry());

try
{
    $paymentCardResponse = $paymentCardRequest->send();
} catch(ClientException $e) {
    printf("Error Registering Payment Card: %s\r\n", $e->getMessage());
    exit;
}

$paymentCard = $paymentCardResponse->getCustomerPaymentCard();

//
// Find a valid shipping method
//

$methodRequest = new SubscriptionShippingMethodListLoadQuery($client);

$methodRequest->setProductCode($productCode);
$methodRequest->setCustomerLogin($customerLogin);
$methodRequest->setAddressId($address->getId());
$methodRequest->setPaymentCardId($paymentCard->getId());
$methodRequest->setQuantity(1);
$methodRequest->setProductSubscriptionTermDescription($productSubscriptionTerm);

try
{
    $methodResponse = $methodRequest->send();
} catch(ClientException $e) {
    printf("Error Loading Shipping Methods: %s\r\n", $e->getMessage());
    exit;
}

if ($methodResponse->getTotalCount() == 0)
{
    print("Shipping method not found\r\n");
    exit;
}

$method = $methodResponse->getSubscriptionShippingMethods()->first();

//
// Create the subscription
//

$request = new SubscriptionInsert($client);

$request->setProductCode($productCode);
$request->setProductSubscriptionTermDescription($productSubscriptionTerm);
$request->setCustomerLogin($customerLogin);
$request->setCustomerAddressId($address->getId());
$request->setPaymentCardId($paymentCard->getId());
$request->setQuantity(1);
$request->setShipId($method->getModule()->getId());       // Supply the shipping module id
$request->setShipData('MyShippingMethodData');            // Supply any required shipping data for this method
$request->setNextDate(new \DateTime('now'));              // Set the next charge date, in this case we are using today

// If you have attributes, you can specify them here

$attr1 = new SubscriptionAttribute();
$attr2 = new SubscriptionAttribute();

$attr1->setCode('attr1');
$attr1->setValue('attr1val');

$attr2->setCode('attr2');
$attr2->setValue('attr2val');

$request->addAttribute($attr1);
$request->addAttribute($attr2);


/* send the request for the response */
try
{
    $response = $request->send();
} catch(ClientException $e) {
    printf("Error Creating Subscription: %s\r\n", $e->getMessage());
    exit;
}

if (!$response->isSuccess()) {
    printf("Error Creating Subscription: %s - %s\r\n", $response->getErrorCode(), $response->getErrorMessage());
    exit;
}

printf("Created Subscription %d for Customer %s Product %s Term %s", $response->getSubscription()->getId(), $customerLogin, $productCode, $productSubscriptionTerm);
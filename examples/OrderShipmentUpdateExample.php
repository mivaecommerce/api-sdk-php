<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This example will load an order by its ID from the first argument passed to it when run 
 * then proceed to create a shipment for all items in the order and then finally update the shipment
 * with tracking information and mark it as shipped.
 */

require_once( dirname( __FILE__ ).'/../vendor/autoload.php');

use MerchantAPI\Client;
use MerchantAPI\ClientException;
use MerchantAPI\Request\OrderListLoadQuery;
use MerchantAPI\Request\OrderShipmentListUpdate;
use MerchantAPI\Request\OrderItemListCreateShipment;
use MerchantAPI\Model\OrderShipmentUpdate;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

$orderRequest = new OrderListLoadQuery($client);

$orderRequest->getFilters()->equal('id', $argv[1]);

$orderResponse = $orderRequest->send();

if ($orderResponse->isSuccess()) {
    printf("Error Loading Order: %s\r\n", $orderResponse->getErrorMessage());
    exit;
}

foreach($orderResponse->getOrders() as $order) {
    if (!$order->getItems()->count()) {
        printf("Order %d Has Not Items\n\n", $order->getId());
        continue;
    }

    // Create a shipment for all items in the order

    $createShipmentRequest = new OrderItemListCreateShipment($client);

    foreach($order->getItems() as $item) {
        if ($item->getShipmentId() > 0) {
            continue; // skip items already in a shipment
        }

        $createShipmentRequest->addOrderItem($item);
    }

    $createShipmentResponse = $createShipmentRequest->send();

    if ($createShipmentRequest->isSuccess()) {
        printf("Error Creating Shipment: %s\r\n", $createShipmentRequest->getErrorMessage());
        exit;
    }

    $shipment = $createShipmentResponse->getShipment();

    // Now that we have created a shipment for the items in the order we can
    // assign a tracking number and mark it shipped
    
    $shipmentUpdateRequest = new OrderShipmentListUpdate($client);

    $shipmentUpdate = new OrderShipmentUpdate();

    $trackingNumber = sprintf('Z%s', time());

    $shipmentUpdate->setCost(1.00)
        ->setMarkedShipped(true)
        ->setShipmentId($shipment->getId())
        ->setTrackingNumber($trackingNumber)
        ->setTrackingType('UPS');

    $shipmentUpdateRequest->addShipmentUpdate($shipmentUpdate);

    $shipmentUpdateResponse = $shipmentUpdateRequest->send();

    if ($createShipmentRequest->isSuccess()) {
        printf("Error Updating Shipment: %s\r\n", $createShipmentRequest->getErrorMessage());
        exit;
    }

    printf("Order %d Shipment %d Updated With Tracking %s\r\n", $order->getId(), $shipment->getId(), $trackingNumber);
}

# Upgrade Guide from 2.1.0 to 2.2.0

Issue **MMAPI-62** added the inserted object into the response. ProductVariantInsertResponse has had its original response data moved and all calling code should be updated to reflect this change.

***Example usage from 2.1.x***

	$response->getProductId();
	$response->getVariantId();

***Should be updated to for 2.2.x***
	
	$response->getProductVariant()->getProductId();
	$response->getProductVariant()->getVariantId();

Issue **MMAPI-67** renamed some model getter functions and all calling code should be updated. Use the following list to rename all usage in your applications:

	CustomerSubscription->getAddressDescrip() 		-> CustomerSubscription->getAddressDescription()
	CustomerSubscription->getAddressAdress() 		-> CustomerSubscription->getAddressAddress()
	CustomerSubscription->getAddressAddress_1()		-> CustomerSubscription->getAddressAddress1()
	CustomerSubscription->getAddressAddress_2()		-> CustomerSubscription->getAddressAddress2()
	ProductAndSubscriptionTerm->getTermDescrip()	-> ProductAndSubscriptionTerm->getTermDescription()

# Upgrade Guide from 2.0.X to 2.1.0+

The class `TemplateVersionSettings` has been renamed to `VersionSettings`.

If you are utilizing this class within your code then you will need to be renamed in their type declarations. Usage has stayed the same.

# Upgrade Guide from 1.x to 2.x

## All Request constructor arguments

All Request objects now accept a Client instance as its first constructor argument. When upgrading from 1.x to 2.x, if your code utilizes passing Model instances in Request constructors, you will need to update all code paths that do.

For example, if your current code looks something like this:

	$product; // Some Product model instance loaded from a ListLoad
	$request = new \MerchantAPI\Request\ProductUpdate($product);
	$response = $client->send($request);

You would need to update your usage to pass either null or a Client instance as the first argument:

	$client; // Your client instance
	$product; // Some Product model instance loaded from a ListLoad
	$request = new \MerchantAPI\Request\ProductUpdate($client, $product);

You can now send the Request from the object itself instead of passing it to the client. However you can still execute the request from the client as well.

	$response = $request->send();
	
## Usage of OrderItemOption

Usage of OrderItemOption will need to be updated to support the change to the member `attribute` to `attributeCode`.

Replace all usage of `OrderItemOption` models that call either `getAttribute()` or `setAttribute(str)` with `getAttributeCode()` and `setAttributeCode(str)`.

**Example usage from 1.x:**

    $itemOption = new \MerchantAPI\Model\OrderItemOption();
    $itemOption.set_attribute('code');

**Should be updated for 2.x:**

    $itemOption = new \MerchantAPI\Model\OrderItemOption();
    $itemOption.setAttributeCode('code');

**Example usage from 1.x:**

	$itemOption; // A OrderItemOption model loaded from an OrderListLoadQuery, for example
	$itemOption.getAttribute();

**Should be updated for 2.x:**

	$itemOption; // A OrderItemOption model loaded from an OrderListLoadQuery, for example
	$itemOption.getAttributeCode();

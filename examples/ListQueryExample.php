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
use MerchantAPI\Request\ProductListLoadQuery;

/* Initialize our Client */
$client = new Client('https://www.mystore.com/mm5/json.mvc', 'TOKEN_CREATED_IN_ADMIN', 'SIGNING_KEY_GENERATED_FOR_TOKEN', [
    'require_timestamp'         => true,
    'signing_key_digest'        => Client::SIGN_DIGEST_SHA256,
    'default_store_code'        => 'MYSTORE',
    'curl_options'              => []
]);

/*
 * All Request objects which inherit from ListQueryRequest
 * can utilize the FilterExpression class to fluently add
 * search filters to the *List_Load_Query requests.
 *
 * @see MerchantAPI\ListQuery\ListQueryRequest
 * @see MerchantAPI\ListQuery\FilterExpression
 */

$request = new ProductListLoadQuery($client);

/*
 * Create a FilterExpression object for the request.
 * This will enforce only adding search filters to
 * defined fields in ProductListLoadQuery. Trying to
 * filter against undefined fields throws an exception.
 *
 * @see ProductListLoadQuery::$availableSearchFields
 * @see ProductListLoadQuery::getAvailableSearchFields()
 * @see MerchantAPI\ListQuery\FilterExpression
 */

$filters = $request->filterExpression();

/*
 * Alternately, you can just create a FilterExpression object
 * directly.
 *
 * $filters = new \MerchantAPI\ListQuery\FilterExpression()
 *
 * This will not enforce a requests available search fields.
 *
 * $filters = new \MerchantAPI\ListQuery\FilterExpression($request)
 *
 * This will enforce a requests available search fields.
 */

$filters->equal('code', 'foo')
    ->orEqual('code', 'bar');

/*
 * You can nest additional expressions to create
 * more complex search queries:
 */

$filters->orX(
    $filters->expr()
        ->like('BAZ%')
        ->andGreaterThan('price', 9.99)
);

$request->setFilters($filters);

/*
 * This would result in a query along the lines of:
 *
 * [...] WHERE code = 'foo' OR code = 'bar' OR ( code LIKE 'BAZ%' AND price > 9.99 )
 */

/* You can get an array of available search fields for a ListQueryRequest */
$availableSearchFields = $request->getAvailableSearchFields();

/* You can also just supply a custom array of list filters you wish to apply */
$request->setFilters([
   [
       'name'  => 'search',
       'value' => [
           'field'    => 'code',
           'operator' => 'EQ',
           'value'    => 'Foo'
       ]
   ],
   [
       'name'  => 'search_AND',
       'value' => [
           'field'    => 'price',
           'operator' => 'GT',
           'value'    => 9.99
       ]
   ]
]);

/*
 * Some *List_Load_Query functions allow you to include additional data in the response
 * by specifying additional on demand columns
 */

/* You can add a single column */
$request->addOnDemandColumn('column');

/* You can set (and replace) an array of columns */
$request->setOnDemandColumns(['column','column2','column3']);

/* You can get an array of supported columns from the Request */
$availableColumns = $request->getAvailableOnDemandColumns();

/* You can set all supported on demand columns the request supports like this */
$request->setOnDemandColumns($request->getAvailableOnDemandColumns());

/*
 * Lists which include Custom Fields (Product,Category,Order) you must explicitly specify
 * the custom field module and code as an on demand column or using wildcards
 */

$request->addOnDemandColumn('CustomField_Values:*'); // Includes ALL custom fields
$request->addOnDemandColumn('CustomField_Values:customfields:*'); // Includes all fields provided by the customfields module
$request->addOnDemandColumn('CustomField_Values:customfields:MyFieldCode'); // includes only the MyFieldCode provided by the customfields module

/* You can sort the result list by using  the setSort method on the Request */
$request->setSort('field', $request::SORT_DESCENDING);

/* Get an array of available sort fields */
$availableSortFields = $request->getAvailableSortFields();

/*
 * Some *List_Load_Query functions support custom filters specific to the request.
 * You can add custom filters using the setCustomFilter method. The value type will
 * vary for each custom filter.
 */
$request->setCustomFilter('Custom_Filter_Name', 'Custom_Filter_Value');

/* Send the request */
try {
    $response = $request->send(); // MerchantAPI\Response\ProductListLoadQuery
    // Alternately: $response = $client->send($request);
} catch(ClientException $e) {
    printf("Error Executing ProductListLoadQuery Request: %s\r\n", $e->getMessage());
    exit;
}

foreach ($response->getProducts() as $product) {
    printf("Product ID: %d Code: %s Name: %s\r\n",
        $product->getId(),
        $product->getCode(),
        $product->getName());

    /*
     * Custom Field Values can be accessed via the CustomFieldValues model object 
     * @see CustomFieldValues
     */

    $myCustomField       = $product->getCustomFieldValues()->getValue('MyFieldCode');

    $myModuleCustomField = $product->getCustomFieldValues()->getValue('MyModuleFieldCode', 'MyModule');
}
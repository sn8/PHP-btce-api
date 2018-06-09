<?php
/**
 * Example Usage of the WEXnzAPI API PHP Class
 *
 * @author marinu666
 * @author sn8
 * @license MIT License - https://github.com/sn8/PHP-wexnz-api
 */

use sn8\WEXnzAPI;

$api = new WEXnzAPI(
                    /*API KEY:    */    '', 
                    /*API SECRET: */    ''
                      );

// Example getInfo
try {
    // Perform the API Call
    $getInfo = $api->apiQuery('getInfo');
    // Print so we can see the output
    print_r($getInfo);
} catch(WEXnzAPIException $e) {
    echo $e->getMessage();
}
// Example Custom query
try {
    // Input Parameters as an array (see: https://btc-e.com/api/documentation for list of parameters per call)
    $params = ['pair' => 'btc_usd']; // Show info for the btc_usd pair
    // Perform the API Query
    print_r($api->apiQuery('ActiveOrders', $params));
} catch(WEXnzAPIException $e) {
    echo $e->getMessage();
}

// Making and canceling an order
try {
    /*
     * CAUTION: THIS IS COMMENTED OUT SO YOU CAN READ HOW TO DO IT!
     */
    // $api->makeOrder(---AMOUNT---, ---PAIR---, WEXnzAPI::DIRECTION_BUY/WEXnzAPI::DIRECTION_SELL, ---PRICE---);
    // $api->cancelOrder(---ORDER IR---);

    // Example: to buy a bitcoin for $100
    // $result = $api->makeOrder(1, 'btc_usd', WEXnzAPI::DIRECTION_BUY, 100);

    // Example: to cancel the order
    // $api->cancelOrder($result['return']['order_id']);
} catch(WEXnzAPIInvalidParameterException $e) {
    echo $e->getMessage();
} catch(WEXnzAPIException $e) {
    echo $e->getMessage();
}

// Example Public API JSON Request (Such as Fee / BTC_USD Tickers etc) - The result you get back is JSON RESTed to PHP
// Fee Call
$btc_usd = array();
$btc_usd['fee'] = $api->getPairFee('btc_usd');
// Ticker Call
$btc_usd['ticker'] = $api->getPairTicker('btc_usd');
// Trades Call
$btc_usd['trades'] = $api->getPairTrades('btc_usd');
// Depth Call
$btc_usd['depth'] = $api->getPairDepth('btc_usd');
// Show all information
print_r($btc_usd);

?>

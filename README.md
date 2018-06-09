WEX.nz API Class


Allows for the use of the Private and Public APIs from WEX.nz.

Built in Support For:
	Public API:
		Currency Pair Fees
		Currency Pair Tickers
		Currency Pair Trades
		Currency Pair Depths
		
	Private API:
		Trade (Buy/Sell) Orders
		Checking on Past Orders
		API Query Method
			- Auto-recovery from bad noonces
			- Allows any method with any parameters to be called on btc-e
			
			
	Example Usage provided in Example.php
	
	
	How to integrate:
	
	use sn8\WEXnzAPI;
	$api = new WEXnzAPI({APIKEY},{APISECRET}[,Optional:{START_NOONCE}]);
	
	
	Private API Quick Example:
	$api->makeOrder($amount, $pair, $direction, $price);
	
	Public API Quick Example:
	$api->getPairDepth('btc_usd');

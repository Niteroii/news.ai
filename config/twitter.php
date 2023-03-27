<?php

// You can find the keys here : https://dev.twitter.com/

return array(
	'API_URL'             => 'api.twitter.com',
	'API_VERSION'         => '2',
	'USE_SSL'             => true,

	'CONSUMER_KEY'        => env('TWITTER_CONSUMER_KEY'),
	'CONSUMER_SECRET'     => env('TWITTER_CONSUMER_SECRET'),
	'ACCESS_TOKEN'        => env('TWITTER_ACCESS_TOKEN'),
	'ACCESS_TOKEN_SECRET' => env('TWITTER_ACCESS_TOKEN_SECRET'),
);

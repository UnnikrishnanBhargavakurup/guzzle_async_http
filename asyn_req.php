<?php

include('./vendor/autoload.php');

use GuzzleHttp\Client;

$promises = [];
$client = new Client();
$start = time();
for($i = 1; $i <= 10; $i++) {
    $url = 'http://localhost/?id=' . $i;
    print("request :  ". $i . PHP_EOL);
    $promises[] = $client->requestAsync('GET', $url)->then(function ($response) use ($i) {
       print("response :  ". $i . " : ". $response->getBody()->getContents() . PHP_EOL);
    });
}


\GuzzleHttp\Promise\all($promises)->wait();

print "Total time take to complete 10 HTTP requests with a total delay of 55 seconds is : ";
print  (time() - $start) . " seconds". PHP_EOL;
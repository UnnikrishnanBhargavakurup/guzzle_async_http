<?php

include('./vendor/autoload.php');

use GuzzleHttp\Client;

$promises = [];
$client = new Client();
for($i = 1; $i <= 10; $i++) {
    $url = 'http://localhost/?id=' . $i;
    print("request :  ". $i . PHP_EOL);
    $promises[] = $client->requestAsync('GET', $url)->then(function ($response) use ($i) {
       print("response :  ". $i . " : ". $response->getBody()->getContents() . PHP_EOL);
    });
}


\GuzzleHttp\Promise\all($promises)->wait();
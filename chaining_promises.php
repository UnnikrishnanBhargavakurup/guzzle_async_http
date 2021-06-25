<?php

include('./vendor/autoload.php');

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$client = new Client();
$start = time();
print("request :  1".PHP_EOL);
$promise = $client->requestAsync('GET', 'http://localhost/?id=1')->then(function ($response) use ($client) {
    print("response : 1 : ". $response->getBody()->getContents() . PHP_EOL);
    print("request :  2".PHP_EOL);
    return $client->requestAsync('GET', 'http://localhost/?id=2')->then(function ($response) use ($client) {
        print("response : 2 : ". $response->getBody()->getContents() . PHP_EOL);
        print("request :  3".PHP_EOL);
        return $client->requestAsync('GET', 'http://localhost/?id=3')->then(function ($response) use ($client) {
            print("response : 3 : ". $response->getBody()->getContents() . PHP_EOL);
            print("request :  4".PHP_EOL);
            return $client->requestAsync('GET', 'http://localhost/?id=4')->then(function ($response) {
                print("response : 4 : ". $response->getBody()->getContents() . PHP_EOL);
            });
        });
    });
});


$promise->wait();

print "Total time take to complete 4 chained request with a total delay of 34 seconds is : ";
print  (time() - $start) . " seconds". PHP_EOL;
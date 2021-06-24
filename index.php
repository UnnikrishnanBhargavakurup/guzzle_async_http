<?php

include('./vendor/autoload.php');

use GuzzleHttp\Client;

$promises = [];
$client = new Client();
for($i = 1; $i <= 10; $i++) {
    $url = 'http://host.docker.internal:8000/api/v1/ping';
    $requestTime = time();
    $promises[] = $client->requestAsync('GET', $url)->then(function ($response) use ($i,$requestTime) {
        echo sprintf ("Request number %s started at %s AND ended at %s request duration is %s  with External API  delay = %s ",$i,$requestTime,time(),time() - $requestTime,$response->getBody());
        echo "<br>";
    });
}


\GuzzleHttp\Promise\all($promises)->wait();

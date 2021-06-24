# guzzle_async_http
PHP Guzzle async request example
```php
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
```
# Installaction
* ``` cd docker ```
* ``` docker compose up ```
* ```composer install```
# Running the script
```php asyn_req.php```
# Result
```
request :  1
request :  2
request :  3
request :  4
request :  5
request :  6
request :  7
request :  8
request :  9
request :  10
response :  10 : {"sleep":"1 seconds"}
response :  9 : {"sleep":"2 seconds"}
response :  8 : {"sleep":"3 seconds"}
response :  7 : {"sleep":"4 seconds"}
response :  6 : {"sleep":"5 seconds"}
response :  5 : {"sleep":"6 seconds"}
response :  4 : {"sleep":"7 seconds"}
response :  3 : {"sleep":"8 seconds"}
response :  2 : {"sleep":"9 seconds"}
response :  1 : {"sleep":"10 seconds"}
```

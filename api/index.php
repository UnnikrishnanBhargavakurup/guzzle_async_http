<?php

if(!empty($_GET) && isset($_GET['id'])) {
  $requestId = intval($_GET['id']);
  $start = time();
  $delay = 11 - $requestId;
  sleep($delay);
  header('Content-Type: application/json');
  print json_encode(["sleep" => $delay . " seconds"]);
  exit();

}

print "Please provide a request id";

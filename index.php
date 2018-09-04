<?php
include('httpful.phar');

$data = file_get_contents("data.json");
$decodedData = json_decode($data, true);
$apikey = $decodedData['apikey'];

$uri = "https://webapi.teamviewer.com/api/v1/meetings";
$response = \Httpful\Request::get($uri)
    ->addHeader('Authorization', "Bearer $apikey")
    ->send();
echo $response;

// $uri = "https://webapi.teamviewer.com/api/v1/meetings";
// $response = \Httpful\Request::get($uri)
//     ->addHeader('Authorization', "Bearer $apikey")
//     ->send();
// echo $response;


?>

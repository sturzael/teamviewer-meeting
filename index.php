<?php
include('httpful.phar');

$data = file_get_contents("data.json");
$decodedData = json_decode($data, true);
$apikey = $decodedData['apikey'];

$uri = "https://webapi.teamviewer.com/api/v1/meetings/blizz";
$response = \Httpful\Request::post($uri)
    ->addHeader('Authorization', "Bearer $apikey")
    ->sendsType(\Httpful\Mime::FORM)
    ->withoutStrictSsl()
    ->expectsJson()
    ->body('subject=test&start=2018-09-08T14:00:00Z&end=2018-09-08T15:00:00Z')
    ->send();
echo $response;

// $uri = "https://webapi.teamviewer.com/api/v1/meetings";
// $response = \Httpful\Request::get($uri)
//     ->addHeader('Authorization', "Bearer $apikey")
//     ->send();
// echo $response;


?>

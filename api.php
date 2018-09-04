<?php
$context = stream_context_create(array(
    'http' => array(
        'header' => "Authorization: Basic 4229226-mRwhF5vDqrV4kvkBdllZ",
    ),
));

$response = file_get_contents('https://webapi.teamviewer.com/api/v1/ping');
// $response = json_decode($response);

die($response);

 ?>

<?php
include('httpful.phar');

$data = file_get_contents("data.json");
$decodedData = json_decode($data, true);
$apikey = $decodedData['apikey'];

$uri = "https://webapi.teamviewer.com/api/v1/account";
$response = \Httpful\Request::get($uri)
    ->addHeader('Authorization', "Bearer $apikey")
    ->send();
echo $response;

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?= 'Only used for local tests - You need to change your locations inside script / php files as well.'?>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- <script type="text/javascript" src="master.js"></script> -->
  </body>
</html>

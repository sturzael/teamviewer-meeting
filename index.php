<?php
include('httpful.phar');

$data = file_get_contents("data.json");
$decodedData = json_decode($data, true);
$apikey = $decodedData['apikey'];

$startTime = "2018-09-08T14:00:00Z";
$endTime = "2018-09-08T15:00:00Z";
$subject = "subjectTest";


//view meetings
$uri = "https://webapi.teamviewer.com/api/v1/meetings/blizz";
$response = \Httpful\Request::get($uri)
    ->addHeader('Authorization', "Bearer $apikey")
    ->send();
$decodedResponse = json_decode($response, true);

foreach ($decodedResponse['blizzMeetings'] as $item) {
  $meetingTime = $item['start'];
  $meetingEndTime = $item['end'];

  if ($meetingTime == $startTime && $meetingEndTime == $endTime) {
    echo "both the same";
  }else {
    echo "not the same";
  }
}

// print_r($decodedResponse[0]['start']);

//create a meeting
// $uri = "https://webapi.teamviewer.com/api/v1/meetings/blizz";
// $response = \Httpful\Request::post($uri)
//     ->addHeader('Authorization', "Bearer $apikey")
//     ->sendsType(\Httpful\Mime::FORM)
//     ->withoutStrictSsl()
//     ->expectsJson()
//     ->body("subject=$subject&start=$startTime&end=$endTime")
//     ->send();
// echo $response;




?>

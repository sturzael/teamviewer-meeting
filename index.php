<?php

define('SHORTINIT', true);

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');

global $wpdb

include('httpful.phar');

$data = file_get_contents("data.json");
$decodedData = json_decode($data, true);
$apikey = $decodedData['apikey'];

//fetch date times from wordpress and set times below
$bookings = $wpdb->get_results("SELECT * FROM `wp_amelia_appointments`", ARRAY_A);
print_r($bookings);

$startTime = "2018-09-08T14:00:00Z";
$endTime = "2018-09-08T15:00:00Z";
$subject = "subjectTest";

//fetch all meetings

function checkMeeting(){
$uri = "https://webapi.teamviewer.com/api/v1/meetings/blizz";
$response = \Httpful\Request::get($uri)
    ->addHeader('Authorization', "Bearer $apikey")
    ->send();
$decodedResponse = json_decode($response, true);

foreach ($decodedResponse['blizzMeetings'] as $item) {
  $meetingTime[] = $item['start'];
  $meetingEndTime[] = $item['end'];
}

(in_array($startTime, $meetingTime) && in_array($endTime, $meetingEndTime)) ? 'in array' : createMeeting();
}


function createMeeting(){
  $uri = "https://webapi.teamviewer.com/api/v1/meetings/blizz";
  $response = \Httpful\Request::post($uri)
      ->addHeader('Authorization', "Bearer ".$GLOBALS['apikey'])
      ->sendsType(\Httpful\Mime::FORM)
      ->withoutStrictSsl()
      ->expectsJson()
      ->body("subject=".$GLOBALS['subject']."&start=".$GLOBALS['startTime']."&end=".$GLOBALS['endTime'])
      ->send();
}



?>

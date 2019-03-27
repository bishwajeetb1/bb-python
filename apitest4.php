<?php
//post
$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode("Testing now way2sms");// urlencode your message
$apikey = urlencode("KDZXLTMYOU3UYBCAFRT9N4GDUNGJP20W");
$secretKey = urlencode("GDTSJNFDCZY20EOD");
$useType = urlencode("stage");
$phone = urlencode("7987142236");
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=$apikey&secret=$secretKey&usetype=$useType&phone=$phone&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;
?>
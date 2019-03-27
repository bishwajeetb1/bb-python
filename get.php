<?php 
//  // create curl resource
  $curl = curl_init();
  $message = urlencode("message-text");// urlencode your message
  // set url 
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_URL, "www.way2sms.com/api/v1/sendCampaign/?apikey=[provided-api-key]&secret=[provided-secret-key]&usetype=[prod or stage]&senderid=[your-sender-id]&phone=[to-mobile]&message=[$message]");
  // query parameter values must be given without square brackets
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl); 
  curl_close($curl); 
  echo $result;
?>
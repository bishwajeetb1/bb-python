<?php
	// Account details
	$apiKey = urlencode('ccHMlfjq09k-mLd4R9HqCt3JQOprDkyOKxbnw2U4rC');
	
	// Message details
	$numbers = array(917987142236);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('Test Successful2');
 
	//$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	$payload = json_encode($data);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>
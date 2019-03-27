<?php
//API URL
$url = 'http://reqres.in/api/users';

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = array(
    'name' => 'morpheus',
    'job' => 'leader'
);
$payload = json_encode($data);

curl_setopt($ch, CURLOPT_POST, true);
//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);
$err = curl_error($ch);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $result;
}

echo "<pre>";
echo var_dump($result);
echo var_dump(json_decode($result));
echo "</pre>";

//close cURL resource
curl_close($ch);

?>
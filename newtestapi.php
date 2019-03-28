
<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
if (isset($_POST['bloodgroupe'])) {
    $bloodgroupe = $_POST['bloodgroupe'];
  }
if (isset($_POST['phno'])) {
    $phno = $_POST['phno'];
  }
if (isset($_POST['location'])) {
    $location = $_POST['location'];
  } 


// database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "register";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
          $query = "SELECT PHNO FROM REGISTERDETAILS";
          $data = mysqli_query($conn, $query);
          //$total = mysqli_num_rows($data);
          $result = mysqli_fetch_assoc($data);

	   } 

 // post
$url="www.way2sms.com/api/v1/sendCampaign";
$apikey = urlencode("71GLN8NP6AHQAD1LY7K61ATFIS9SHLR2");
$secretKey = urlencode("L7EYNOALXDTUR6UA");
$useType = urlencode("stage");
$phone = urlencode($result['PHNO']);
$message = urlencode("'$name'requires blood immediately please help him, his bloodgroupe is'$bloodgroupe',his phone no is'$phone' and his location is '$location'");// urlencode your message
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=$apikey&secret=$secretKey&usetype=stage&phone=$phone&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result2 = curl_exec($curl);
curl_close($curl);
echo $result2;
$conn->close();



?>



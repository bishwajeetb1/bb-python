<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }
if (isset($_POST['bloodgroupe'])) {
    $bloodgroupe = $_POST['bloodgroupe'];
  }
if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
if (isset($_POST['messages'])) {
    $messages = $_POST['messages'];
  }
if (!empty($name) || !empty($bloodgroupe) || !empty($email) || !empty($messages)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "register";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From registerdetails Where email = ? Limit 1";
     $INSERT = "INSERT Into registerdetails (name, bloodgroup, email, address) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $name, $bloodgroupe, $email, $messages);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
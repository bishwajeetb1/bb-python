
 <?php
$name = filter_input(INPUT_POST, 'name');
 $bloodgroup = filter_input(INPUT_POST, 'bloodgroup');
 $email = filter_input(INPUT_POST, 'email');
 $address = filter_input(INPUT_POST, 'address');
$conn = mysqli_connect("localhost", "root", "simba4488", "register");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
 # $sql = "SELECT ID, FirstName, LastName FROM students";
  
$stmt = $conn->prepare("insert into registerdetails (name, bloodgroup,email,message) values (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $bloodgroup, $email, $address);
$result = $stmt->execute();
  if($result) {
    echo "successful INSERT";
  }
//   if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//     echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["FirstName"] . "</td><td>"
// . $row["LastName"]. "</td></tr>";
// }
// echo "</table>";
// } else { echo "0 results"; }
$conn->close();
?>



 <?php
$conn = mysqli_connect("localhost", "root", "simba4488", "hello");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
 # $sql = "SELECT ID, FirstName, LastName FROM students";
  
$stmt = $conn->prepare("insert into students (FirstName, LastName, Grade, Address) values (?, ?, ?, ?)");
$stmt->bind_param("siis", $fn, $ln, $grd, $adr);
$fn = "testing" ;
$ln = 18 ; 
$grd = 33 ;
$adr = "space";
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


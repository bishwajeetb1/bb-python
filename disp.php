<!DOCTYPE html>
<html>
<head>
	<title>Registerd users</title>
</head>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "youtube");
		if ($conn-> connect_error) {
			die("Connection failed:".$conn-> connect_error);

		}
		$sql ="SELECT id, Username, Password from account";
		$result = $conn-> query($sql);
		if ($result->num_rows >0) {
			while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>" . $row["id"] ."</td><td>" . $row["Username"] . "</td><td>" . $row["Password"] ."</td></tr>";
			
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		$conn-> close();
		?>
	</table>

</body>
</html>
<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		$servername = "fdb4.agilityhoster.com";
		$username = "1823734_1023";
		$password = "ForceForG00d!";

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";

		$sql = "SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_names`, `address`, `contact_numbers`, `email`, `fax_numbers`, `website`, `contact_persons`, `pitching_status`, `remarks` FROM `1823734_1023`.`schools`";
		$result=$conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["region_id"]. "</td><td>".$row["organization_type"]. "</td><td>" .$row["primary_name"]. "</td><td>" .$row["alternative_names"]. "</td><td>" .$row["address"]. "</td><td>" .$row["contact_numbers"]. "</td><td>" .$row["email"]. "</td><td>" .$row["fax_numbers"]. "</td><td>".$row["fax_numbers"]. "</td><td>" .$row["website"]. "</td><td>" .$row["contact_persons"]. "</td><td>" .$row["pitching_status"]. "</td><td>" .$row["remarks"]. "</td><td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();

		?> 
	</table>
</body>
</html>
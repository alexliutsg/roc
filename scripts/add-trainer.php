<!DOCTYPE html>
<html>
<body>
	<?php
	if (isset($_POST["submitform"])) {
		global $wpdb;
		$wpdb->query(
			$wpdb->prepare(
				"
					INSERT INTO trainers
					(first_name, last_name)
					VALUES(%s, %s)
				",
					$_POST["first_name"],
					$_POST["last_name"]
			)
		);
		echo "<h2>Trainer inserted successfully</h2>";
	}
	?>
</body>
</html>
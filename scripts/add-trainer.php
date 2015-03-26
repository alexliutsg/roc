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
					(first_name, last_name, title, payment_rate, club_represented, qualification, email, mobile, home_district, work_district, status, note, created_at, updated_at)
					VALUES(%s, %s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, now(), now())
				",
					$_POST["first_name"],
					$_POST["last_name"],
					$_POST["title"],
					$_POST["payment_rate"],
					$_POST["club_represented"],
					$_POST["qualification"],
					$_POST["email"],
					$_POST["mobile"],
					$_POST["home_district"],
					$_POST["work_district"],
					$_POST["status"],
					$_POST["note"]
			)
		);
		echo "<h2>Trainer inserted successfully</h2>";
	}
	?>
</body>
</html>
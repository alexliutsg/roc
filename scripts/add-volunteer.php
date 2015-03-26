<!DOCTYPE html>
<html>
<body>
	<?php
	if (isset($_POST["submitform"])) {
		global $wpdb;
		$wpdb->query(
			$wpdb->prepare(
				"
					INSERT INTO volunteers
					(first_name, last_name, title, employment_status, education_background, years_of_experience_in_volunteering, email, mobile, home_district, work_district, status, note, created_at, updated_at)
					VALUES(%s, %s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, now(), now())
				",
					$_POST["first_name"],
					$_POST["last_name"],
					$_POST["title"],
					$_POST["employment_status"],
					$_POST["education_background"],
					$_POST["years_of_experience_in_volunteering"],
					$_POST["email"],
					$_POST["mobile"],
					$_POST["home_district"],
					$_POST["work_district"],
					$_POST["status"],
					$_POST["note"]
			)
		);
		echo "<h2>Volunteer inserted successfully</h2>";
	}
	?>
</body>
</html>

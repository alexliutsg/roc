<!DOCTYPE html>
<html>
<body>
<?php
if (isset($_POST["submitform"])) {

    global $wpdb;

    $volunteer_user_id = 0;
    $user_ID = get_current_user_id();
    $trainer_user_id = $wpdb->get_var("SELECT `id` FROM `volunteer_user_id_list` WHERE id_user=$user_ID");
    //echo "User id is ".$volunteer_user_id."\n";

    if (!empty($volunteer_user_id)) {

        $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO volunteers
					(user_id, first_name, last_name, title, employment_status, education_background, years_of_experience_in_volunteering, email, mobile, home_district, work_district, status, note, created_at, updated_at)
					VALUES(%d,%s, %s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, now(), now())
				",
                $volunteer_user_id,
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
    } else {

        $wpdb->query(
            $wpdb->prepare(
                "
					INSERT INTO volunteers
					(user_id, first_name, last_name, title, employment_status, education_background, years_of_experience_in_volunteering, email, mobile, home_district, work_district, status, note, created_at, updated_at)
					VALUES( %d, %s, %s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, now(), now())
				",
                0,
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
    }

    echo "<h2>Volunteer inserted successfully</h2>";
}
?>
</body>
</html>

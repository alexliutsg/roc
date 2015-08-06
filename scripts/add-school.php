<!DOCTYPE html>
<html>
<body>
<?php

if (isset($_POST["submitform"])) {

    global $wpdb;

    //print_r($_POST);

    $wpdb->query($wpdb->prepare(
        "INSERT INTO schools
         ( organization_type, primary_name, alternative_name, address, contact_number, email, fax_number, website, contact_person, title, remarks, pitching_cycle, pitching_status )
         VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
        'school',
        $_POST["primary_name"],
        $_POST["alternative_name"],
        $_POST["address"],
        $_POST["contact_number"],
        $_POST["email"],
        $_POST["fax"],
        $_POST["website"],
        $_POST["contact_person"],
        $_POST["title"],
        $_POST["remarks"],
		$_POST["pitching_cycle"],
		$_POST["pitching_status"]
		
    ));

    echo "<h2>Record inserted successfully</h2>";
}


?>
</body>
</html>

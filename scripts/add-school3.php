<!DOCTYPE html>
<html>
<body>
		 <?php
                
                if (isset($_POST["submitform"])) {
                
                        global $wpdb;
                        
                        print_r($_POST);
                
                        $wpdb->query( $wpdb->prepare( 
                        "
                                INSERT INTO schools
                                ( organization_type, primary_name, alternative_name, address, contact_numbers, email, fax_numbers, website, contact_person, title, pitching_status, remarks )
                                VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )
                        ", 
                                'school', 
                                $_POST["primary_name"], 
                                $_POST["alternative_name"],
                                $_POST["address"],
                                $_POST["contact_numbers"],
                                $_POST["email"],
                                $_POST["fax_numbers"],
                                $_POST["website"],
                                $_POST["contact_person"],
                                $_POST["title"],
                                'UNPITCHED',
                                $_POST["remarks"]
                        ) );
                        
                        echo "<h2>Record inserted successfully</h2>";
                }
		

		?> 
</body>
</html>
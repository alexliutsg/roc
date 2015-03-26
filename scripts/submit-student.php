<!DOCTYPE html>
<html>
<body>
		 <?php
		 
			if (isset($_POST["submitstudent"])) {
							
					global $wpdb;
					
					print_r($_POST);

					$wpdb->query( $wpdb->prepare( 
					"
							INSERT INTO participants
							( school_id, name, gender, age, remarks )
							VALUES ( %d, %s, %s, %d, %s )
					", 
							1,
							$_POST["studentname"],
							$_POST["gender"],
							$_POST["age"],
							$_POST["remarks"]
					) );
					
					echo "<h2>Record inserted successfully</h2>";
			}

		?> 
</body>
</html>
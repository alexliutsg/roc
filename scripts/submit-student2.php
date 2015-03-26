<!DOCTYPE html>
<html>
<body>
		 <?php
		 
			if (isset($_POST["submitstudent"])) {
                                $count=1;
                                while (isset($_POST["studentname$count"]))
                                {
							
					global $wpdb;
					
					//print_r($_POST);

					$wpdb->query( $wpdb->prepare( 
					"
							INSERT INTO participants
							( school_id, name, gender, age, remarks )
							VALUES ( %d, %s, %s, %d, %s )
					", 
							1,
							$_POST["studentname$count"],
							$_POST["sex$count"],
							$_POST["age$count"],
							$_POST["remarks$count"]
					) );
                                        $count++;
                                 }
					
					echo "<h2>Record inserted successfully</h2>";
                                    
			}

		?> 
</body>
</html>
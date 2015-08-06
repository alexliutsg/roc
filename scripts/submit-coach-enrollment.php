<!DOCTYPE html>
<html>
<body>
                <?php
                global $wpdb;
                
                if (isset($_POST["submitchoice"])) {
                        
                        $userRole = get_user_role();
                        if (strcmp($userRole,"trainer") == 0) 
			{
                        	$userID = get_current_user_id();
			}
			else
			{
			        $userID = $_POST["user-onbehalf"];
			}

                        
                                        
					//print_r($_POST);
					
					$wpdb->query( $wpdb->prepare( 
					"
							INSERT INTO trainer_choice
							( trainer_id, choice1, choice2, choice3 )
							VALUES ( %d, %d, %d, %d )
					", 
							$userID,
							$_POST["choice1"],
							$_POST["choice2"],
							$_POST["choice3"]
					) );
                        
                        
                        echo "<h2>Record inserted successfully</h2>";
                    
                }

		?> 
</body>
</html>

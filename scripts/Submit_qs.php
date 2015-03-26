<!DOCTYPE html>
<html>
<body>
		 <?php
                
                if (isset($_POST["submitform"])) {
                
                        global $wpdb;
                        
                        print_r($_POST);
                
                        $wpdb->query( $wpdb->prepare( 
                        "
                                INSERT INTO questionnaires
                                ( id, course, age, qns_1, qns_2, qns_3, qns_4, qns_5, qns_6, qns_7,qns_8,qns_9)
                                VALUES ( %d, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )
                        ", 
                                '1', 
                                $_POST["course"], 
                                $_POST["age"],
                                $_POST["q1"],
                                $_POST["q2"],
                                $_POST["q3"],
                                $_POST["q4"],
                                $_POST["q5"],
                                $_POST["q6"],
                                $_POST["q7"],
                                $_POST["q8"],
                                $_POST["q9"]                           
                                
                        ) );
                        
                        echo "<h2>Question submitted successfully</h2>";
                }
		

		?> 
</body>
</html>

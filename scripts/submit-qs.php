<!DOCTYPE html>
<html>
<body>
		 <?php
                
                if (isset($_POST["submitform"])) {
                
                        global $wpdb;
                        
                        $user_ID = get_current_user_id();
                        $school = $wpdb->get_results( 'SELECT `school_id` FROM `user_school` WHERE `user_id`='.$user_ID, OBJECT );
                        foreach ( $school as $row ) 
                                $school_ID=$row->school_id;
                
                        $wpdb->query( $wpdb->prepare( 
                        "
                                INSERT INTO questionnaires
                                ( school_id, student_id,q_id, qns_1, qns_2, qns_3, qns_4, qns_5, qns_6, qns_7,qns_8,qns_9,qns_10,qns_11, qns_12, qns_13, qns_14, qns_15, qns_16, qns_17,qns_18,qns_19)
                                VALUES ( %d, %d,%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s , %s, %s, %s, %s, %s, %s, %s, %s )
                        ", 
                                1, 
                                $_POST["student_id"],
                                $_POST["qid"],
                                $_POST["q1"],
                                $_POST["q2"],
                                $_POST["q3"],
                                $_POST["q4"],
                                $_POST["q5"],
                                $_POST["q6"],
                                $_POST["q7"],
                                $_POST["q8"],
                                $_POST["q9"],
                                $_POST["q10"],
                                $_POST["q11"],
                                $_POST["q12"],
                                $_POST["q13"],
                                $_POST["q14"],
                                $_POST["q15"],
                                $_POST["q16"],
                                $_POST["q17"],
                                $_POST["q18"],
                                $_POST["q19"]
                                
                        ) );
                        
                        echo "<h2>Question submitted successfully</h2>";
                }
		

		?> 
</body>
</html>


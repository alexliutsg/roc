<!DOCTYPE html>
<html>
<body>
        <?php
        
	global $wpdb;
	$user_ID = get_current_user_id();
        $school = $wpdb->get_results( 'SELECT `school_id` FROM `user_school` WHERE `user_id`='.$user_ID, OBJECT );
        foreach ( $school as $row ) 
                $school_ID=$row->school_id;
        
        $course = $wpdb->get_results( 'SELECT `id` FROM `courses` WHERE `school_id`='.$school_ID, OBJECT );
        foreach ( $course as $row ) 
                $course_ID=$row->id;
        
        $lessons = $wpdb->get_results( 'SELECT `id`,`course_id`,`date` FROM `course_time_slots` WHERE `course_id`='.$course_ID, OBJECT );
        
        $students = $wpdb->get_results( 'SELECT `id`,`name`, `gender` FROM `participants` WHERE `school_id`='.$school_ID, OBJECT );
        
	?>
	<form action="" method="POST">
                <table>
                    <tr>
                            <th>Name</th><th>Gender</th>
                    <?php
                            foreach ( $lessons as $column )
                                    echo "<th>".$column->date."</th>"
                    ?>
                    </tr>
                    
                <?php
                        
                
                        foreach ( $students as $row )  {
                                echo "<tr><td>".$row->name."</td><td>".$row->gender."</td>";
                        foreach ( $lessons as $column ) {
                                echo "<td><input type=\"checkbox\" name=\"".$row->id."-".$column->id."\" value=\"Present\"></td>";
                        }
                        echo "</tr>\n";
                        }
                       
                ?>
                        
                </table>
	</form>
	
</body>
</html>
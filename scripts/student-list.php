<!DOCTYPE html>
<html>
<body>
	
		 <?php
		global $wpdb;	
        
        $user_ID = get_current_user_id();
        $school = $wpdb->get_results( 'SELECT `school_id` FROM `user_school` WHERE `user_id`='.$user_ID, OBJECT );
        foreach ( $school as $row ) 
                $school_ID=$row->school_id;
        
        $students = $wpdb->get_results( 'SELECT `id`,`name`, `gender` FROM `participants` WHERE `school_id`='.$school_ID, OBJECT );
               
        
		?>
	
	<select name="student_id" >
		<?php
		foreach ( $students as $row ) 
		{
				echo "<option value=\"".$row->id."\">".$row->name." (".$row->gender.")"."</option>\n";
		}
               
		?>
		
	</select>
	
	
	
</body>
</html>
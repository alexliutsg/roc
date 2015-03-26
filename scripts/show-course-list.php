<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
		
                $names = $wpdb->get_results( 'SELECT courses.id,courses.school_id,courses.course_code,schools.primary_name FROM `courses` join `schools` on courses.school_id=schools.id', OBJECT );
                ?>
                <form action="" method="POST"><select name="course_id" onchange="">
                <?php
                foreach ( $names as $row ) 
                {
                        echo "<option value=\"".$row->id."\">".$row->primary_name.": ".$row->course_code."</option>\n";
                }
                ?>
                </select>
                </form>


	</table>
</body>
</html>
